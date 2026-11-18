#!/usr/bin/env python3
"""Add the User-Agent default header to the generated root client."""

import sys
from pathlib import Path

CLIENT_FILE_NAME = "UpcloudClient.php"
DEFAULT_HEADERS_ANCHOR = "        $defaultHeaders = [\n"
ANCHOR = "            'X-Fern-SDK-Name' => 'Upcloud',\n"
VERSION_LINES = (
    "        $version = null;\n"
    "        if (class_exists(\\Composer\\InstalledVersions::class) && \\Composer\\InstalledVersions::isInstalled('upcloudltd/upcloud-php-api')) {\n"
    "            $version = \\Composer\\InstalledVersions::getPrettyVersion('upcloudltd/upcloud-php-api');\n"
    "        }\n"
    "        if (!is_string($version) || preg_match('/^[A-Za-z0-9][A-Za-z0-9.+_-]*$/D', $version) !== 1) {\n"
    "            $version = 'unknown';\n"
    "        }\n"
)
USER_AGENT_LINE = "            'User-Agent' => 'upcloud-php-api/' . $version,\n"
USER_AGENT_MARKER = "'User-Agent' =>"
HEADER_MERGE_BLOCK = (
    "        $this->options['headers'] = array_merge(\n"
    "            $defaultHeaders,\n"
    "            $this->options['headers'] ?? [],\n"
    "        );\n"
)
HEADER_NORMALIZATION = (
    "        $headers = $this->options['headers'] ?? [];\n"
    "        $userAgent = null;\n"
    "        foreach ($headers as $name => $value) {\n"
    "            if (strcasecmp($name, 'User-Agent') === 0) {\n"
    '                $userAgent = trim($value, " \\t");\n'
    "                unset($headers[$name]);\n"
    "            }\n"
    "        }\n"
    "        if ($userAgent !== null && $userAgent !== '') {\n"
    "            $defaultHeaders['User-Agent'] .= ' ' . $userAgent;\n"
    "        }\n"
    "        $this->options['headers'] = array_merge($defaultHeaders, $headers);\n"
)
HEADER_NORMALIZATION_MARKER = "$userAgent = null;"


def patch_user_agent(client_file: Path) -> bool:
    """Insert the User-Agent default and case-insensitive application suffix handling."""
    source = client_file.read_text(encoding="utf-8")
    original = source
    if USER_AGENT_MARKER not in source:
        if source.count(ANCHOR) != 1:
            raise ValueError(f"{client_file}: expected exactly one X-Fern-SDK-Name default header")
        if source.count(DEFAULT_HEADERS_ANCHOR) != 1:
            raise ValueError(f"{client_file}: expected exactly one default header array")
        source = source.replace(DEFAULT_HEADERS_ANCHOR, VERSION_LINES + "\n" + DEFAULT_HEADERS_ANCHOR, 1)
        source = source.replace(ANCHOR, ANCHOR + USER_AGENT_LINE, 1)
    if HEADER_NORMALIZATION_MARKER not in source:
        if source.count(HEADER_MERGE_BLOCK) != 1:
            raise ValueError(f"{client_file}: expected exactly one default header merge")
        source = source.replace(HEADER_MERGE_BLOCK, HEADER_NORMALIZATION, 1)
    if source != original:
        client_file.write_text(source, encoding="utf-8")
        return True
    return False


def verify_user_agent(client_file: Path) -> list[str]:
    """Confirm the User-Agent default, version lookup, and suffix handling are present."""
    source = client_file.read_text(encoding="utf-8")
    count = source.count(USER_AGENT_MARKER)
    if count != 1:
        return [f"{client_file}: expected one User-Agent default header, found {count}"]
    if source.count(HEADER_NORMALIZATION) != 1:
        return [f"{client_file}: User-Agent application suffix handling is missing or outdated"]
    if source.count(VERSION_LINES + "\n" + DEFAULT_HEADERS_ANCHOR) != 1:
        return [f"{client_file}: User-Agent version lookup must precede the default header array"]
    return []


def main() -> int:
    if len(sys.argv) != 2:
        print("Usage: patch_generated_user_agent.py <generated-src-directory>", file=sys.stderr)
        return 2

    source_directory = Path(sys.argv[1])
    client_file = source_directory / CLIENT_FILE_NAME
    if not client_file.is_file():
        print(f"ERROR: generated client not found: {client_file}", file=sys.stderr)
        return 2

    patched = patch_user_agent(client_file)
    errors = verify_user_agent(client_file)
    if errors:
        print("ERROR: verification failed:", file=sys.stderr)
        for error in errors:
            print(f"  {error}", file=sys.stderr)
        return 1

    print("Added User-Agent default header" if patched else "User-Agent default header already present")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
