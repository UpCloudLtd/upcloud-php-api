import importlib.util
import tempfile
import unittest
from pathlib import Path


REPOSITORY_ROOT = Path(__file__).parents[2]
PATCH_SCRIPT = REPOSITORY_ROOT / "generator" / "scripts" / "patch_generated_user_agent.py"

CLIENT_SOURCE = """<?php
        $defaultHeaders = [
            'Authorization' => "******",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Upcloud',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );
"""


def load_patch_module():
    module_spec = importlib.util.spec_from_file_location("patch_generated_user_agent", PATCH_SCRIPT)
    if module_spec is None or module_spec.loader is None:
        raise RuntimeError(f"Unable to load {PATCH_SCRIPT}")
    module = importlib.util.module_from_spec(module_spec)
    module_spec.loader.exec_module(module)
    return module


class PatchGeneratedUserAgentTest(unittest.TestCase):
    @classmethod
    def setUpClass(cls):
        cls.patch = load_patch_module()

    def test_adds_user_agent_header_after_sdk_name_header(self):
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            client.write_text(CLIENT_SOURCE, encoding="utf-8")

            self.assertTrue(self.patch.patch_user_agent(client))

            source = client.read_text(encoding="utf-8")
            self.assertIn("'User-Agent' => 'upcloud-php-api/' . $version", source)
            self.assertIn("InstalledVersions::getPrettyVersion('upcloudltd/upcloud-php-api')", source)
            self.assertIn("class_exists(\\Composer\\InstalledVersions::class)", source)
            self.assertIn("InstalledVersions::isInstalled('upcloudltd/upcloud-php-api')", source)
            self.assertIn("preg_match('/^[A-Za-z0-9][A-Za-z0-9.+_-]*$/D', $version)", source)
            self.assertIn("strcasecmp($name, 'User-Agent') === 0", source)
            self.assertEqual(self.patch.verify_user_agent(client), [])

    def test_is_idempotent(self):
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            client.write_text(CLIENT_SOURCE, encoding="utf-8")

            self.patch.patch_user_agent(client)
            once = client.read_text(encoding="utf-8")

            self.assertFalse(self.patch.patch_user_agent(client))
            self.assertEqual(client.read_text(encoding="utf-8"), once)

    def test_fails_when_anchor_is_missing(self):
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            client.write_text("<?php\n", encoding="utf-8")

            with self.assertRaises(ValueError):
                self.patch.patch_user_agent(client)


if __name__ == "__main__":
    unittest.main()
