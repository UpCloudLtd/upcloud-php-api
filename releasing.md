# Releasing the PHP SDK

Releases start when you push a version tag. GitHub builds the release, then asks Packagist to update the existing `upcloudltd/upcloud-php-api` package.

Protect `main` before releasing: require reviewed pull requests and block force-pushes and deletion. Check these settings in the destination repository; they do not transfer from the old SDK repository. Both release and publishing jobs independently verify the tag and commit against default-branch history.

Add these under **Settings → Secrets and variables → Actions** for this repository:

- Repository variable `PACKAGIST_PUBLISH_ENABLED` with value `true`, enabled only when ready to publish.
- Repository secrets `PACKAGIST_USERNAME` and `PACKAGIST_TOKEN` with your Packagist username and safe API token.

The publisher uses only the repository-level variable and secrets above; it does not need a GitHub Environment. It verifies the release tag and commit are on protected `main` before using the Packagist credentials.

Keep the existing Packagist package pointed at `https://github.com/UpCloudLtd/upcloud-php-api`. Do not change the package name or move existing v1-v3 tags. The new SDK replaces the implementation in this repository while historical versions remain at their original commits.

The release workflow uploads the tag and exact commit in a release-identity artifact. The publisher runs from the default branch and validates that artifact against the successful run's commit, repository and run ID. It does not infer tags from a branch name. The publisher uses Bearer authentication to request a refresh, then verifies registry source and archive URLs and commit references before saving a receipt. Documentation uses the released tag; its job is allowed to fail without blocking publication, so check its result separately.

## Create a Release

1. Make sure the release changes are merged and the default branch is up to date.
2. Create and push an annotated version tag. For the first stable release, use:

   ```sh
   git checkout main
   git pull --ff-only
   git tag -a v4.0.0 -m "Release v4.0.0"
   git push origin v4.0.0
   ```

   For later stable releases, choose the next appropriate version: `v4.0.1` for a patch, `v4.1.0` for a backward-compatible feature, or `v5.0.0` for a breaking change.

3. In **Actions**, watch **Build PHP SDK Release**, then **Publish PHP SDK**. Check the release workflow's `docs` job separately. The GitHub Release is created before registry verification; its existence alone is not proof that publishing succeeded.
4. Check the publish job's receipt: both source and archive must match the tag's commit. Prereleases are marked as such and are not set as GitHub's latest release.
5. Verify both `v3.0.0` and the new release still install from Packagist using fresh Composer projects.

### Alpha, beta, and release candidates

Prereleases use the upcoming stable version followed by `-alpha`, `-beta`, or `-rc`. You may add a dot and number to distinguish iterations. For example, publish `v4.0.0-alpha.1`, then `v4.0.0-alpha.2`, `v4.0.0-beta.1`, and `v4.0.0-rc.1` before the stable `v4.0.0` release. Each tag creates a GitHub prerelease and is indexed on Packagist.

Create a prerelease tag in the same way as a stable tag:

Use lowercase `alpha`, `beta`, or `rc`, optionally followed by one numeric iteration
such as `.1`. Numeric components must not have leading zeros. Textual iterations
such as `-rc.foo` and extra components such as `-alpha.1.extra` are rejected because
they are not supported Composer release versions.

```sh
VERSION=v4.0.0-alpha.1
git tag -a "$VERSION" -m "Release $VERSION"
git push origin "$VERSION"
```

To install a prerelease for testing, request its version and stability explicitly:

```sh
composer require upcloudltd/upcloud-php-api:4.0.0-alpha.1@alpha
```

Stable releases remain the default for consumers who do not opt into prerelease stability. See the package at <https://packagist.org/packages/upcloudltd/upcloud-php-api>.

## Legacy Maintenance

Branch from `v3.0.0` when maintaining the old client; never move that tag. The v4 release workflow rejects commits that exist only on a maintenance branch. Publishing v3 fixes needs a separately reviewed maintenance process and is not covered here.

If the Packagist job fails, read its error and fix the package settings or credentials before retrying. Do not push the same version tag again; rerun the failed workflow from the **Actions** tab after correcting the issue.
