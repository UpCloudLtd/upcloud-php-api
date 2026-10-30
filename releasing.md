# Releasing the PHP SDK

Releases start when you push a version tag. GitHub builds the release, then asks Packagist to update the existing `upcloudltd/upcloud-php-api` package.

Protect `main` before releasing: require reviewed pull requests and block force-pushes and deletion. Check these settings in the destination repository; they do not transfer from the old SDK repository. Both release and publishing jobs independently verify the tag and commit against default-branch history.

Add these under **Settings → Secrets and variables → Actions** for this repository:

- Repository variable `PACKAGIST_PUBLISH_ENABLED` with value `true`, enabled only when ready to publish. If it is `false`, the build can still create a GitHub Release, but the separate Packagist job stops before using credentials. Set it to `true` before pushing the tag you intend to publish.
- Repository secrets `PACKAGIST_USERNAME` and `PACKAGIST_TOKEN` with your Packagist username and safe API token.

The publisher needs the repository-level variable and Packagist secrets above; it does not need a GitHub Environment. GitHub supplies the built-in `GITHUB_TOKEN` automatically for artifact access and release verification. `SPECS_ACCESS_PAT` is used by the separate SDK regeneration workflow, not by a manual release-tag publish. The publisher verifies the release tag and commit are on protected `main` before using the Packagist credentials.

Keep the existing Packagist package pointed at `https://github.com/UpCloudLtd/upcloud-php-api`. Do not change the package name or move existing v1-v3 tags. The new SDK replaces the implementation in this repository while historical versions remain at their original commits.

The release workflow uploads the tag and exact commit in a release-identity artifact. The publisher runs from the default branch and validates that artifact against the successful run's commit, repository and run ID. It does not infer tags from a branch name. The publisher uses Bearer authentication to request a refresh, then verifies registry source and archive URLs and commit references before saving a receipt. Documentation uses the released tag; its job is allowed to fail without blocking publication, so check its result separately.

## Create a Release

1. Make sure the release changes are merged and the default branch is up to date.
2. Choose any tag accepted by the release workflow and push it as an annotated tag. The same process applies to stable and prerelease tags:

   ```sh
   read -r -p "Release tag (stable or alpha/beta/rc prerelease): " RELEASE_TAG
   git checkout main
   git pull --ff-only
   git tag -a "$RELEASE_TAG" -m "Release $RELEASE_TAG"
   git push origin "$RELEASE_TAG"
   ```

   Stable versions use `vX.Y.Z`; prereleases use `vX.Y.Z-alpha`, `vX.Y.Z-beta`, or `vX.Y.Z-rc`, optionally followed by a numeric iteration such as `.2`. For stable releases, choose the next version according to the change: patch, minor, or major.

3. In **Actions**, watch **Build PHP SDK Release**, then **Publish PHP SDK**. The GitHub Release is created before Packagist verification; its existence alone is not proof that publishing succeeded.
4. Check the publish job's receipt: both source and archive must match the tag's commit. Prereleases are marked as such and are not set as GitHub's latest release.
5. Install the exact version just published in a fresh Composer project and verify the generated client autoloads. The following commands derive the Composer stability from whichever valid tag you set above; stable tags use Composer's default stability.

   ```sh
   read -r -p "Release tag to test: " RELEASE_TAG
   RELEASE_VERSION="${RELEASE_TAG#v}"
   TEST_DIR=$(mktemp -d)
   if [[ "$RELEASE_VERSION" == *-* ]]; then
      COMPOSER_STABILITY="${RELEASE_VERSION#*-}"
      COMPOSER_STABILITY="${COMPOSER_STABILITY%%.*}"
      if [[ "$COMPOSER_STABILITY" == "rc" ]]; then COMPOSER_STABILITY="RC"; fi
      PACKAGE_CONSTRAINT="${RELEASE_VERSION}@${COMPOSER_STABILITY}"
   else
      PACKAGE_CONSTRAINT="$RELEASE_VERSION"
   fi
   composer require --working-dir "$TEST_DIR" --no-interaction --no-plugins --no-scripts --prefer-dist "upcloudltd/upcloud-php-api:${PACKAGE_CONSTRAINT}"
   php -r 'require $argv[1]."/vendor/autoload.php"; if (!class_exists("Upcloud\\UpcloudClient")) { exit(1); }' "$TEST_DIR"
   ```

   As a one-time v3-to-v4 migration check, install the previous stable release in another fresh project and verify the legacy class still autoloads:

   ```sh
   V3_TEST_DIR=$(mktemp -d)
   composer require --working-dir "$V3_TEST_DIR" --no-interaction --no-plugins --no-scripts --prefer-dist 'upcloudltd/upcloud-php-api:3.0.0'
   php -r 'require $argv[1]."/vendor/autoload.php"; if (!class_exists("Upcloud\\ApiClient\\Configuration")) { exit(1); }' "$V3_TEST_DIR"
   ```

   This confirms the v4 release did not disturb the old Packagist release. It is a one-time migration check, not a step to repeat for every later v4 release. For each release, test the exact newly published version using the generic command above.

6. Review the documentation PR generated for this release and merge it after confirming the reference and version links look right. `update-docs.yml` dispatches **Validate documentation** manually because a PR created with `GITHUB_TOKEN` does not start normal pull-request workflows. Check that manual run's result; an automatic `action_required` run has no test jobs and can be ignored. The PHP SDK validation workflow does not run for docs-only changes; SDK code is validated separately on PHP 8.1 and 8.2.

### Supported Version Channels

The release procedure is the same for every supported tag. The tag suffix selects the release type and Composer stability:

| Tag pattern | Release type | Composer install stability |
| --- | --- | --- |
| `vX.Y.Z` | Stable GitHub release | Default stable |
| `vX.Y.Z-alpha` or `vX.Y.Z-alpha.N` | Alpha prerelease | `@alpha` |
| `vX.Y.Z-beta` or `vX.Y.Z-beta.N` | Beta prerelease | `@beta` |
| `vX.Y.Z-rc` or `vX.Y.Z-rc.N` | Release-candidate prerelease | `@RC` |

An optional prerelease iteration is numeric and must not have leading zeros. Other suffixes or extra components are rejected by the workflow.

```sh
read -r -p "Release tag: " RELEASE_TAG
git tag -a "$RELEASE_TAG" -m "Release $RELEASE_TAG"
git push origin "$RELEASE_TAG"
```

Stable releases remain the default for consumers who do not opt into prerelease stability. The generic install test above derives the correct Composer stability from the selected tag. See the package at <https://packagist.org/packages/upcloudltd/upcloud-php-api>.

## Legacy Maintenance

Branch from `v3.0.0` when maintaining the old client; never move that tag. The v4 release workflow rejects commits that exist only on a maintenance branch. Publishing v3 fixes needs a separately reviewed maintenance process and is not covered here.

If the Packagist job fails, read its error and fix the package settings or credentials before retrying. Do not push the same version tag again; rerun the failed workflow from the **Actions** tab after correcting the issue.
