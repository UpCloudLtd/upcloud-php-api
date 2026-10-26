#!/usr/bin/env bash
set -euo pipefail

TAG="${1:-}"
PACKAGE_NAME="upcloudltd/upcloud-php-api"
if [[ ! "$TAG" =~ ^v(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)(-(alpha|beta|rc)(\.(0|[1-9][0-9]*))?)?$ ]]; then
  echo "ERROR: expected vX.Y.Z or an alpha, beta, or rc tag, such as v4.0.0-rc.1"
  exit 1
fi

if [ -z "${PACKAGIST_USERNAME:-}" ] || [ -z "${PACKAGIST_TOKEN:-}" ]; then
  echo "ERROR: PACKAGIST_USERNAME and PACKAGIST_TOKEN must be set"
  exit 1
fi

if [[ "${GITHUB_REPOSITORY,,}" != upcloudltd/upcloud-php-api ]]; then
  echo "ERROR: publication must run from UpCloudLtd/upcloud-php-api"
  exit 1
fi

if [[ ! "${RELEASE_COMMIT:-}" =~ ^[0-9a-f]{40}$ ]]; then
  echo "ERROR: RELEASE_COMMIT must be the full verified release commit"
  exit 1
fi

echo "== Trigger Packagist update for $PACKAGE_NAME at $TAG =="

curl --fail-with-body --silent --show-error --request POST \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer ${PACKAGIST_USERNAME}:${PACKAGIST_TOKEN}" \
  -d "$(php -r 'echo json_encode(["repository" => "https://github.com/" . getenv("GITHUB_REPOSITORY")], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);')" \
  https://packagist.org/api/update-package |
  php -r '$response = json_decode(stream_get_contents(STDIN), true); if (($response["status"] ?? null) !== "success") { fwrite(STDERR, "Packagist rejected the update request\n"); exit(1); }'

echo "Packagist update requested; waiting for $TAG to become available..."
for attempt in {1..20}; do
  if curl --fail --silent --show-error \
    "https://repo.packagist.org/p2/${PACKAGE_NAME}.json" |
    php -r '
        $metadata = json_decode(stream_get_contents(STDIN), true);
      if (!is_array($metadata)) {
          exit(1);
      }
        $version = [];
        foreach (($metadata["packages"]["upcloudltd/upcloud-php-api"] ?? []) as $entry) {
          $version = array_replace($version, $entry);
          foreach ($version as $key => $value) {
            if ($value === "__unset") {
              unset($version[$key]);
            }
          }
          if (($version["version"] ?? null) !== $argv[1]) {
            continue;
          }
          $repository = "https://github.com/" . getenv("GITHUB_REPOSITORY");
          $commit = getenv("RELEASE_COMMIT");
          $source = $version["source"] ?? [];
          $dist = $version["dist"] ?? [];
          if (($source["type"] ?? null) !== "git"
            || strtolower(preg_replace("{\\.git$}", "", $source["url"] ?? "")) !== strtolower($repository)
            || ($source["reference"] ?? null) !== $commit
            || ($dist["type"] ?? null) !== "zip"
            || ($dist["reference"] ?? null) !== $commit
            || strtolower($dist["url"] ?? "") !== strtolower("https://api.github.com/repos/" . getenv("GITHUB_REPOSITORY") . "/zipball/" . $commit)) {
            fwrite(STDERR, "Registry version does not match the verified release source and archive\n");
            exit(1);
          }
          $receipt = [
            "package" => "upcloudltd/upcloud-php-api",
            "version" => $argv[1],
            "repository" => $repository,
            "commit" => $commit,
            "source" => $source,
            "dist" => $dist,
            "verified_at" => gmdate(DATE_ATOM),
          ];
          file_put_contents("publication-receipt.json", json_encode($receipt, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
          exit(0);
      }
      exit(1);
    ' "$TAG"; then
    echo "Verified $PACKAGE_NAME $TAG on Packagist."
    exit 0
  fi
  if [[ "$attempt" -lt 20 ]]; then
    sleep 15
  fi
done

echo "ERROR: $PACKAGE_NAME $TAG did not appear on Packagist within five minutes."
exit 1
