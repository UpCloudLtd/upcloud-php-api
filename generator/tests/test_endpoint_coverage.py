import json
import tempfile
import unittest
from pathlib import Path

from check_endpoint_coverage import check_coverage, normalize_path


class EndpointCoverageTest(unittest.TestCase):
    def test_normalizes_openapi_and_php_path_parameters(self):
        self.assertEqual(normalize_path("/1.3/server/{uuid}"), "1.3/server/{}")
        self.assertEqual(normalize_path("1.3/server/{$uuid}"), "1.3/server/{}")

    def test_accepts_renamed_generated_method_when_contract_matches(self):
        spec = {"paths": {"/1.3/account": {"get": {"operationId": "accountDetails"}}}}
        php = '''<?php
class AccountClient {
    public function details(): Account
    {
        new JsonApiRequest(
            path: "1.3/account",
            method: HttpMethod::GET,
        );
    }
}
'''
        self.assertEqual(self.run_check(spec, {"AccountClient.php": php}), [])

    def test_reports_missing_operation(self):
        spec = {"paths": {"/1.3/account": {"get": {"operationId": "accountDetails"}}}}
        self.assertEqual(
            self.run_check(spec, {}),
            ["missing method for accountDetails: GET 1.3/account"],
        )

    def test_reports_unexpected_generated_contract(self):
        spec = {"paths": {}}
        php = '''<?php
class AccountClient {
    public function details(): Account
    {
        new JsonApiRequest(
            path: "1.3/account",
            method: HttpMethod::GET,
        );
    }
}
'''
        self.assertEqual(
            self.run_check(spec, {"AccountClient.php": php}),
            ["unexpected generated method details: GET 1.3/account"],
        )

    @staticmethod
    def run_check(spec, php_files):
        with tempfile.TemporaryDirectory() as directory:
            root = Path(directory)
            spec_path = root / "spec.json"
            source_directory = root / "src"
            spec_path.write_text(json.dumps(spec), encoding="utf-8")
            (source_directory / "Account").mkdir(parents=True)
            for filename, content in php_files.items():
                (source_directory / "Account" / filename).write_text(content, encoding="utf-8")
            return check_coverage(spec_path, source_directory)


if __name__ == "__main__":
    unittest.main()
