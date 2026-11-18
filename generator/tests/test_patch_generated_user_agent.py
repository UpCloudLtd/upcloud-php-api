import importlib.util
import json
import subprocess
import tempfile
import unittest
from pathlib import Path


REPOSITORY_ROOT = Path(__file__).parents[2]
PATCH_SCRIPT = REPOSITORY_ROOT / "generator" / "scripts" / "patch_generated_user_agent.py"

CLIENT_SOURCE = """<?php
class UpcloudClient
{
    public array $options;

    public function __construct(string $token, ?array $options = null)
    {
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
    }
}
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

    def test_freshly_patched_client_is_valid_php(self):
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            client.write_text(CLIENT_SOURCE, encoding="utf-8")

            self.patch.patch_user_agent(client)

            result = subprocess.run(["php", "-l", str(client)], capture_output=True, text=True)
            self.assertEqual(result.returncode, 0, result.stdout + result.stderr)

    def test_freshly_patched_client_runs_with_appended_application_agent(self):
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            client.write_text(CLIENT_SOURCE, encoding="utf-8")
            self.patch.patch_user_agent(client)

            for value, expected in [
                ("myapp/1.0", "upcloud-php-api/unknown myapp/1.0"),
                (" \tmyapp/1.0\t ", "upcloud-php-api/unknown myapp/1.0"),
                ("", "upcloud-php-api/unknown"),
                (" \t ", "upcloud-php-api/unknown"),
            ]:
                with self.subTest(value=value):
                    result = subprocess.run(
                        [
                            "php", "-r",
                            "require $argv[1];"
                            "$client = new UpcloudClient('token', "
                            "['headers' => ['user-agent' => $argv[2]]]);"
                            "echo json_encode($client->options['headers']);",
                            str(client), value,
                        ],
                        capture_output=True,
                        text=True,
                    )
                    self.assertEqual(result.returncode, 0, result.stdout + result.stderr)
                    self.assertEqual(json.loads(result.stdout)["User-Agent"], expected)

    def test_patch_reproduces_checked_in_client(self):
        checked_in = (REPOSITORY_ROOT / "fern/sdk/src/UpcloudClient.php").read_text(encoding="utf-8")
        for block in [
            self.patch.VERSION_LINES + "\n",
            self.patch.USER_AGENT_LINE,
            self.patch.HEADER_NORMALIZATION,
        ]:
            self.assertEqual(checked_in.count(block), 1)
        unpatched = (
            checked_in.replace(self.patch.VERSION_LINES + "\n", "", 1)
            .replace(self.patch.USER_AGENT_LINE, "", 1)
            .replace(self.patch.HEADER_NORMALIZATION, self.patch.HEADER_MERGE_BLOCK, 1)
        )
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            client.write_text(unpatched, encoding="utf-8")

            self.patch.patch_user_agent(client)

            self.assertEqual(client.read_text(encoding="utf-8"), checked_in)
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

    def test_fails_without_writing_when_header_merge_is_missing(self):
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            source = CLIENT_SOURCE.replace(self.patch.HEADER_MERGE_BLOCK, "")
            client.write_text(source, encoding="utf-8")

            with self.assertRaisesRegex(ValueError, "default header merge"):
                self.patch.patch_user_agent(client)

            self.assertEqual(client.read_text(encoding="utf-8"), source)

    def test_verification_rejects_version_lookup_inside_header_array(self):
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            client.write_text(CLIENT_SOURCE, encoding="utf-8")
            self.patch.patch_user_agent(client)
            source = client.read_text(encoding="utf-8")
            source = source.replace(self.patch.VERSION_LINES + "\n", "", 1)
            source = source.replace(
                self.patch.ANCHOR, self.patch.ANCHOR + self.patch.VERSION_LINES, 1
            )
            client.write_text(source, encoding="utf-8")

            self.assertTrue(self.patch.verify_user_agent(client))

    def test_verification_rejects_replacement_instead_of_append(self):
        with tempfile.TemporaryDirectory() as directory:
            client = Path(directory) / "UpcloudClient.php"
            client.write_text(CLIENT_SOURCE, encoding="utf-8")
            self.patch.patch_user_agent(client)
            source = client.read_text(encoding="utf-8").replace(
                "$defaultHeaders['User-Agent'] .= ' ' . $userAgent;",
                "$defaultHeaders['User-Agent'] = $userAgent;",
            )
            client.write_text(source, encoding="utf-8")

            self.assertTrue(self.patch.verify_user_agent(client))


if __name__ == "__main__":
    unittest.main()
