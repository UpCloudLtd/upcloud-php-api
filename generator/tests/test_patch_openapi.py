import importlib.util
import json
import subprocess
import sys
import tempfile
import unittest
from pathlib import Path


REPOSITORY_ROOT = Path(__file__).parents[2]
PATCH_SCRIPT = REPOSITORY_ROOT / "generator" / "scripts" / "patch_openapi.py"


def load_patch_module():
    module_spec = importlib.util.spec_from_file_location("patch_openapi", PATCH_SCRIPT)
    if module_spec is None or module_spec.loader is None:
        raise RuntimeError(f"Unable to load {PATCH_SCRIPT}")
    module = importlib.util.module_from_spec(module_spec)
    module_spec.loader.exec_module(module)
    return module


class PatchOpenApiTest(unittest.TestCase):
    @classmethod
    def setUpClass(cls):
        cls.patch_openapi = load_patch_module()

    def test_removes_descending_values_from_all_target_schemas(self):
        spec = {
            "components": {
                "schemas": {
                    schema_name: {
                        "type": "string",
                        "enum": ["created_at", "-created_at", "name", "-name"],
                    }
                    for schema_name in self.patch_openapi.SORT_ENUM_SCHEMAS
                }
            }
        }

        removed = self.patch_openapi.patch_sort_enums(spec)

        self.assertEqual(removed, len(self.patch_openapi.SORT_ENUM_SCHEMAS) * 2)
        for schema in spec["components"]["schemas"].values():
            self.assertEqual(schema["enum"], ["created_at", "name"])

    def test_preserves_non_target_enums_and_non_sort_values(self):
        spec = {
            "components": {
                "schemas": {
                    "fileStorageQueryParamSort": {
                        "enum": ["ascending", "-ascending", "other"]
                    },
                    "unrelated": {"enum": ["yes", "-no"]},
                }
            }
        }

        removed = self.patch_openapi.patch_sort_enums(spec)

        self.assertEqual(removed, 1)
        self.assertEqual(
            spec["components"]["schemas"]["fileStorageQueryParamSort"]["enum"],
            ["ascending", "other"],
        )
        self.assertEqual(spec["components"]["schemas"]["unrelated"]["enum"], ["yes", "-no"])

    def test_tolerates_missing_target_schemas(self):
        spec = {"components": {"schemas": {}}}

        self.assertEqual(self.patch_openapi.patch_sort_enums(spec), 0)
        self.assertEqual(spec, {"components": {"schemas": {}}})

    def test_patches_numeric_firewall_rule_position(self):
        spec = {
            "components": {
                "schemas": {
                    "firewallRulesetServerFirewallRulePosition": {
                        "type": "string",
                        "examples": ["1", "678"],
                        "pattern": "^[1-9]$",
                    }
                }
            }
        }

        self.assertTrue(self.patch_openapi.patch_firewall_rule_position(spec))
        self.assertEqual(
            spec["components"]["schemas"]["firewallRulesetServerFirewallRulePosition"],
            {"type": "integer", "examples": [1, 678]},
        )

    def test_removes_content_from_inline_and_referenced_204_responses(self):
        spec = {
            "paths": {
                "/inline": {
                    "delete": {
                        "responses": {
                            "204": {
                                "description": "No content",
                                "content": {"application/json": {"schema": {"type": "object"}}},
                            }
                        }
                    }
                },
                "/referenced": {
                    "delete": {
                        "responses": {
                            "204": {"$ref": "#/components/responses/delete204"}
                        }
                    }
                },
            },
            "components": {
                "responses": {
                    "delete204": {
                        "description": "No content",
                        "content": {"application/json": {"schema": {"type": "object"}}},
                    }
                }
            },
        }

        self.assertEqual(self.patch_openapi.patch_no_content_responses(spec), 2)
        self.assertNotIn("content", spec["paths"]["/inline"]["delete"]["responses"]["204"])
        self.assertNotIn("content", spec["components"]["responses"]["delete204"])

    def test_preserves_content_for_non_204_responses(self):
        response = {
            "description": "OK",
            "content": {"application/json": {"schema": {"type": "object"}}},
        }
        spec = {"paths": {"/resource": {"get": {"responses": {"200": response}}}}}

        self.assertEqual(self.patch_openapi.patch_no_content_responses(spec), 0)
        self.assertIn("content", response)

    def test_cli_writes_patched_copy_without_changing_input(self):
        source_spec = {
            "info": {"version": "test"},
            "components": {
                "schemas": {
                    "fileStorageQueryParamSort": {
                        "type": "string",
                        "enum": ["created_at", "-created_at"],
                    }
                }
            },
        }

        with tempfile.TemporaryDirectory() as directory:
            directory_path = Path(directory)
            input_path = directory_path / "input.json"
            output_path = directory_path / "nested" / "output.json"
            input_path.write_text(json.dumps(source_spec), encoding="utf-8")

            result = subprocess.run(
                [sys.executable, str(PATCH_SCRIPT), str(input_path), str(output_path)],
                check=False,
                capture_output=True,
                text=True,
            )

            self.assertEqual(result.returncode, 0, result.stderr)
            self.assertIn("Removed 1 descending sort enum values", result.stdout)
            self.assertEqual(json.loads(input_path.read_text(encoding="utf-8")), source_spec)
            self.assertEqual(
                json.loads(output_path.read_text(encoding="utf-8"))["components"]["schemas"][
                    "fileStorageQueryParamSort"
                ]["enum"],
                ["created_at"],
            )


if __name__ == "__main__":
    unittest.main()
