#!/usr/bin/env bash
set -euo pipefail

SDK_DIR="fern/sdk"

if [ ! -f "$SDK_DIR/composer.json" ]; then
  echo "ERROR: $SDK_DIR/composer.json not found. SDK not generated?"
  exit 1
fi

echo "== Validating composer.json (non-strict) =="
composer validate --no-check-publish
composer validate --no-check-publish --working-dir "$SDK_DIR"

echo "== Creating SDK package =="
ARTIFACT="php-sdk.tar.gz"
mkdir -p generator/release-artifacts
git archive --format=tar.gz --prefix=php-sdk/ \
  --output="generator/release-artifacts/$ARTIFACT" HEAD

echo "Created artifact: generator/release-artifacts/$ARTIFACT"
