import importlib.util
import tempfile
import unittest
from pathlib import Path


REPOSITORY_ROOT = Path(__file__).parents[2]
PATCH_SCRIPT = REPOSITORY_ROOT / "generator" / "scripts" / "patch_generated_php.py"


def load_patch_module():
    module_spec = importlib.util.spec_from_file_location("patch_generated_php", PATCH_SCRIPT)
    if module_spec is None or module_spec.loader is None:
        raise RuntimeError(f"Unable to load {PATCH_SCRIPT}")
    module = importlib.util.module_from_spec(module_spec)
    module_spec.loader.exec_module(module)
    return module


class PatchGeneratedPhpTest(unittest.TestCase):
    @classmethod
    def setUpClass(cls):
        cls.patch_generated_php = load_patch_module()

    def test_finds_loose_null_checks_across_all_php_files(self):
        with tempfile.TemporaryDirectory() as directory:
            source_directory = Path(directory)
            client = source_directory / "ServiceClient.php"
            core = source_directory / "Core" / "Multipart" / "MultipartFormData.php"
            core.parent.mkdir(parents=True)
            client.write_text("if ($request->offset != null) {}\n", encoding="utf-8")
            core.write_text("$headers = $contentType != null ? [] : null;\n", encoding="utf-8")

            found = self.patch_generated_php.find_loose_null_checks(source_directory)

            self.assertEqual(found, {client: [1], core: [1]})

    def test_ignores_already_strict_comparisons(self):
        with tempfile.TemporaryDirectory() as directory:
            source_directory = Path(directory)
            client = source_directory / "ServiceClient.php"
            client.write_text("if ($response === null) {}\nif ($value !== null) {}\n", encoding="utf-8")

            found = self.patch_generated_php.find_loose_null_checks(source_directory)

            self.assertEqual(found, {})

    def test_patches_and_verifies_every_flagged_location(self):
        with tempfile.TemporaryDirectory() as directory:
            source_directory = Path(directory)
            client = source_directory / "ServiceClient.php"
            model = source_directory / "Model.php"
            client.write_text("if ($request->offset != null) {}\n", encoding="utf-8")
            model.write_text("if (null != $value) {}\n", encoding="utf-8")

            before = self.patch_generated_php.patch_strict_null_checks(source_directory)

            self.assertEqual(before, {client: [1], model: [1]})
            self.assertEqual(client.read_text(encoding="utf-8"), "if ($request->offset !== null) {}\n")
            self.assertEqual(model.read_text(encoding="utf-8"), "if (null !== $value) {}\n")

            errors = self.patch_generated_php.verify_patch(source_directory, before)
            self.assertEqual(errors, [])

    def test_verify_patch_reports_unconverted_locations(self):
        with tempfile.TemporaryDirectory() as directory:
            source_directory = Path(directory)
            client = source_directory / "ServiceClient.php"
            client.write_text("if ($request->offset != null) {}\n", encoding="utf-8")
            expected = {client: [1]}

            errors = self.patch_generated_php.verify_patch(source_directory, expected)

            self.assertEqual(len(errors), 2)


if __name__ == "__main__":
    unittest.main()