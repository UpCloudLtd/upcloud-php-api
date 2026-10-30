#!/usr/bin/env bash
set -euo pipefail

echo "== PHP SDK GENERATION =="

SPEC_PATH="generator/openapi/spec.json"
PATCHED_SPEC_PATH="generator/openapi/spec.patched.json"

# Install Fern CLI if not available
if ! command -v fern &> /dev/null; then
  echo "Installing Fern CLI..."
  npm install -g fern-api
fi

# Ensure spec is present
if [ ! -f "$SPEC_PATH" ]; then
  echo "ERROR: Missing spec.json"
  exit 1
fi

if ! command -v python3 &> /dev/null; then
  echo "ERROR: python3 not found"
  exit 1
fi

echo "Patching OpenAPI spec for PHP compatibility..."
python3 generator/scripts/patch_openapi.py "$SPEC_PATH" "$PATCHED_SPEC_PATH"

# Run Fern generation
cd fern

# Validate the patched spec and Fern configuration before generation.
fern check

# Generate PHP SDK
fern generate --local

cd -

echo "Setting Packagist package metadata..."
php -r '
$path = "fern/sdk/composer.json";
$manifest = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
$package = json_decode(file_get_contents("composer.json"), true, 512, JSON_THROW_ON_ERROR);
foreach (["name", "description", "license", "homepage", "support"] as $field) {
  $manifest[$field] = $package[$field];
}
unset($manifest["version"]);
file_put_contents($path, json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
'

echo "Applying the maintained README to the generated package..."
cp README.md fern/sdk/README.md

echo "Patching generated PHP for strict null checks..."
python3 generator/scripts/patch_generated_php.py fern/sdk/src

echo "Generation complete."