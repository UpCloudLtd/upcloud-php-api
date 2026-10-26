#!/usr/bin/env python3
"""Apply PHP SDK compatibility fixes to the OpenAPI document."""

import json
import sys
from pathlib import Path
from typing import Any

SORT_ENUM_SCHEMAS = {
    "objectStorage2QueryParamSort",
    "fileStorageQueryParamSort",
    "databaseQueryParamSort",
    "gatewayQueryParamSortServices",
    "loadBalancerSortServicesParameter",
    "loadBalancerMetricsSortParameter",
}

HTTP_METHODS = {"get", "put", "post", "delete", "options", "head", "patch", "trace"}


def patch_firewall_rule_position(spec: dict[str, Any]) -> bool:
    """Make numeric firewall-rule path positions usable by PHP wire-test generation."""
    schemas = spec.get("components", {}).get("schemas", {})
    schema = schemas.get("firewallRulesetServerFirewallRulePosition")
    if not isinstance(schema, dict) or schema.get("type") != "string":
        return False

    schema["type"] = "integer"
    schema.pop("pattern", None)
    schema["examples"] = [int(value) for value in schema.get("examples", [])]
    return True


def patch_sort_enums(spec: dict[str, Any]) -> int:
    schemas = spec.get("components", {}).get("schemas", {})
    removed = 0

    for schema_name in SORT_ENUM_SCHEMAS:
        schema = schemas.get(schema_name)
        if not isinstance(schema, dict) or not isinstance(schema.get("enum"), list):
            continue

        original = schema["enum"]
        schema["enum"] = [
            value
            for value in original
            if not (isinstance(value, str) and value.startswith("-"))
        ]
        removed += len(original) - len(schema["enum"])

    return removed


def patch_no_content_responses(spec: dict[str, Any]) -> int:
    """Remove response bodies from HTTP 204 responses, which cannot contain content."""
    component_responses = spec.get("components", {}).get("responses", {})
    patched = 0

    for path_item in spec.get("paths", {}).values():
        if not isinstance(path_item, dict):
            continue
        for method, operation in path_item.items():
            if method not in HTTP_METHODS or not isinstance(operation, dict):
                continue
            response = operation.get("responses", {}).get("204")
            if not isinstance(response, dict):
                continue

            target = response
            reference = response.get("$ref")
            if isinstance(reference, str) and reference.startswith("#/components/responses/"):
                response_name = reference.rsplit("/", 1)[-1]
                referenced_response = component_responses.get(response_name)
                if isinstance(referenced_response, dict):
                    target = referenced_response

            if "content" in target:
                target.pop("content")
                patched += 1

    return patched


def main() -> int:
    if len(sys.argv) != 3:
        print("Usage: patch_openapi.py <input_spec.json> <output_spec.json>", file=sys.stderr)
        return 2

    input_path = Path(sys.argv[1])
    output_path = Path(sys.argv[2])

    try:
        with input_path.open(encoding="utf-8") as source:
            spec = json.load(source)
    except FileNotFoundError:
        print(f"ERROR: input spec not found: {input_path}", file=sys.stderr)
        return 2
    except json.JSONDecodeError as error:
        print(f"ERROR: input spec is not valid JSON: {error}", file=sys.stderr)
        return 2

    if not isinstance(spec, dict):
        print("ERROR: OpenAPI document must be a JSON object", file=sys.stderr)
        return 2

    removed = patch_sort_enums(spec)
    firewall_position_patched = patch_firewall_rule_position(spec)
    no_content_responses_patched = patch_no_content_responses(spec)
    output_path.parent.mkdir(parents=True, exist_ok=True)
    with output_path.open("w", encoding="utf-8") as destination:
        json.dump(spec, destination, indent=2)
        destination.write("\n")

    print(f"Removed {removed} descending sort enum values")
    if firewall_position_patched:
        print("Patched firewall rule position schema for PHP wire-test generation")
    print(f"Removed content from {no_content_responses_patched} HTTP 204 responses")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
