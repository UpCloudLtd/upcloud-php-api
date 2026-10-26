#!/usr/bin/env python3
"""Check that OpenAPI operations have matching generated PHP client methods."""

import json
import re
import sys
from pathlib import Path
from typing import Any

HTTP_METHODS = {"delete", "get", "head", "options", "patch", "post", "put", "trace"}
FUNCTION_PATTERN = re.compile(r"^    public function ([A-Za-z_][A-Za-z0-9_]*)\(", re.MULTILINE)
PATH_PATTERN = re.compile(r'\bpath: "([^"]+)"')
METHOD_PATTERN = re.compile(r"\bmethod: HttpMethod::([A-Z]+)")
PATH_PARAMETER_PATTERN = re.compile(r"\{(?:\$)?[^}]+\}")


def normalize_path(path: str) -> str:
    path = path.lstrip("/")
    return PATH_PARAMETER_PATTERN.sub("{}", path)


def load_spec(path: Path) -> dict[str, Any]:
    with path.open(encoding="utf-8") as source:
        document = json.load(source)
    if not isinstance(document, dict):
        raise ValueError("OpenAPI document must be a JSON object")
    return document


def openapi_operations(spec: dict[str, Any]) -> list[dict[str, str]]:
    operations = []
    for path, path_item in spec.get("paths", {}).items():
        if not isinstance(path_item, dict):
            continue
        for method, operation in path_item.items():
            if method not in HTTP_METHODS or not isinstance(operation, dict):
                continue
            operation_id = operation.get("operationId")
            if isinstance(operation_id, str):
                operations.append({"id": operation_id, "method": method.upper(), "path": normalize_path(path)})
    return operations


def generated_operations(source_directory: Path) -> list[dict[str, str]]:
    operations = []
    for path in sorted(source_directory.glob("*/*Client.php")):
        content = path.read_text(encoding="utf-8")
        functions = list(FUNCTION_PATTERN.finditer(content))
        for index, function in enumerate(functions):
            name = function.group(1)
            if name == "__construct":
                continue
            end = functions[index + 1].start() if index + 1 < len(functions) else len(content)
            block = content[function.start():end]
            path_match = PATH_PATTERN.search(block)
            method_match = METHOD_PATTERN.search(block)
            if path_match and method_match:
                operations.append({
                    "id": name,
                    "method": method_match.group(1),
                    "path": normalize_path(path_match.group(1)),
                })
    return operations


def check_coverage(spec_path: Path, source_directory: Path) -> list[str]:
    expected = openapi_operations(load_spec(spec_path))
    generated = generated_operations(source_directory)
    generated_by_contract = {
        (operation["method"], operation["path"]): operation for operation in generated
    }
    errors = []

    for operation in expected:
        if (operation["method"], operation["path"]) not in generated_by_contract:
            errors.append(f"missing method for {operation['id']}: {operation['method']} {operation['path']}")

    expected_contracts = {(operation["method"], operation["path"]) for operation in expected}
    for operation in generated:
        contract = (operation["method"], operation["path"])
        if contract not in expected_contracts:
            errors.append(
                f"unexpected generated method {operation['id']}: "
                f"{operation['method']} {operation['path']}"
            )

    return errors


def main() -> int:
    if len(sys.argv) != 3:
        print("Usage: check_endpoint_coverage.py <spec.json> <generated-src-dir>", file=sys.stderr)
        return 2

    errors = check_coverage(Path(sys.argv[1]), Path(sys.argv[2]))
    if errors:
        print(f"Endpoint coverage failed: {len(errors)} issue(s)", file=sys.stderr)
        for error in errors:
            print(f"- {error}", file=sys.stderr)
        return 1

    operation_count = len(openapi_operations(load_spec(Path(sys.argv[1]))))
    print(f"Endpoint coverage passed: {operation_count} OpenAPI operations")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
