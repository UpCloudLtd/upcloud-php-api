#!/usr/bin/env python3
"""Apply compatibility fixes to generated PHP source files."""

import re
import sys
from pathlib import Path

# Matches "!= null" / "null !=" while excluding "!==" / "=== null", which are already strict.
LOOSE_NULL_PATTERN = re.compile(r"!=(?!=)\s*null\b|\bnull\s*!=(?!=)")


def find_loose_null_checks(source_directory: Path) -> dict[Path, list[int]]:
    """Return 1-based line numbers of loose null comparisons, keyed by file."""
    matches: dict[Path, list[int]] = {}
    for path in sorted(source_directory.rglob("*.php")):
        lines = path.read_text(encoding="utf-8").splitlines()
        hits = [line_no for line_no, line in enumerate(lines, start=1) if LOOSE_NULL_PATTERN.search(line)]
        if hits:
            matches[path] = hits
    return matches


def patch_strict_null_checks(source_directory: Path) -> dict[Path, list[int]]:
    """Rewrite loose null comparisons to strict ones. Returns the locations patched."""
    before = find_loose_null_checks(source_directory)
    for path in before:
        source = path.read_text(encoding="utf-8")
        patched = LOOSE_NULL_PATTERN.sub(lambda m: m.group(0).replace("!=", "!==", 1), source)
        path.write_text(patched, encoding="utf-8")
    return before


def verify_patch(source_directory: Path, expected: dict[Path, list[int]]) -> list[str]:
    """Confirm every previously-flagged line was actually converted, and none remain."""
    errors = []

    still_loose = find_loose_null_checks(source_directory)
    for path, line_numbers in still_loose.items():
        errors.append(f"{path}: still loose at line(s) {line_numbers}")

    for path, line_numbers in expected.items():
        current_lines = path.read_text(encoding="utf-8").splitlines()
        for line_no in line_numbers:
            line = current_lines[line_no - 1]
            if "!==" not in line:
                errors.append(f"{path}:{line_no}: expected strict comparison, got: {line.strip()}")

    return errors


def main() -> int:
    if len(sys.argv) != 2:
        print("Usage: patch_generated_php.py <generated-src-directory>", file=sys.stderr)
        return 2

    source_directory = Path(sys.argv[1])
    if not source_directory.is_dir():
        print(f"ERROR: generated source directory not found: {source_directory}", file=sys.stderr)
        return 2

    before = find_loose_null_checks(source_directory)
    total_before = sum(len(line_numbers) for line_numbers in before.values())
    print(f"Found {total_before} loose null comparison(s) in {len(before)} file(s):")
    for path, line_numbers in sorted(before.items()):
        print(f"  {path.relative_to(source_directory)}: line(s) {line_numbers}")

    if total_before == 0:
        return 0

    patch_strict_null_checks(source_directory)

    errors = verify_patch(source_directory, before)
    if errors:
        print("ERROR: verification failed for the following locations:", file=sys.stderr)
        for error in errors:
            print(f"  {error}", file=sys.stderr)
        return 1

    print(f"Verified {total_before} loose null check(s) in {len(before)} file(s) are now strict")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())