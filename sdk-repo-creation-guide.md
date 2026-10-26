# 📘 Creating a New UpCloud SDK Repository

This guide explains how to create, configure, and operate a new UpCloud SDK repository using the **UpCloud OpenAPI SDK Template**.\
It reflects the **current, production-ready pipeline** and clearly documents **inputs, outputs, and responsibilities** for each workflow and script.

---

## 1. Purpose of the Template

The SDK template standardizes:

- Regeneration of SDKs from OpenAPI specs
- Pull-request–based updates (no direct pushes to `main`)
- Versioned GitHub releases
- Versioned reference documentation
- Publishing to external registries (Packagist, npm, etc.)

The template is **language-agnostic**.\
Each SDK repository only needs to implement generator scripts — **not workflows**.

---

## 2. Prerequisites

Before creating a new SDK repository:

- You have write access to the **UpCloud GitHub organization**
- You have access to the **SDK template repository**
- You know which generator you will use:
  - Fern
  - OpenAPI Generator
  - Custom generator

You do **not** need to configure GitLab.\
GitLab already dispatches spec releases to SDK repositories.

---

## 3. Creating a New SDK Repository

1. Go to **GitHub → UpCloud organization**
2. Click **New Repository**
3. Select **Use a template**
4. Choose the **UpCloud OpenAPI SDK Template**
5. Name the repository:

   ```
   upcloud-<language>-sdk
   ```

6. Create the repository

---

## 4. Repository Structure (From Template)

```
.github/workflows/
  regenerate.yml      # regenerate SDK from OpenAPI spec
  release.yml         # build GitHub release from merged code
  publish.yml         # publish SDK to registry (optional)
  update-docs.yml     # version & publish reference docs

generator/
  openapi/            # standardized spec input location
  scripts/
    generate.sh       # REQUIRED: SDK generation entrypoint
    prepare-release.sh# REQUIRED: release packaging
    publish.sh        # OPTIONAL: registry publishing

docs/                 # versioned documentation (generated)
README.md
LICENSE
.gitignore
```

> **Important:**\
> Workflow files are shared and should not be modified in normal SDK repos.

---

## 5. End-to-End Execution Flow

```
GitLab OpenAPI release
        ↓
repository_dispatch (spec_released)
        ↓
regenerate.yml
        ↓
PR with regenerated SDK
        ↓ (manual review & merge)
git tag vX.Y.Z
        ↓
release.yml
        ↓
GitHub Release + artifacts
        ↓
update-docs.yml (docs PR, needs manual review and merge)
        ↓
publish.yml
```

---

## 6. Workflow Contracts (Critical)

This section defines **hard contracts** between workflows and scripts. You will have to implement these scripts for each sdk we are generating.

---

### regenerate.yml — SDK Regeneration

**Trigger**
```
repository_dispatch (spec_released in GitLab)
```

**Inputs**

| Source | Description |
|------|------------|
| `github.event.client_payload.version` | Spec version (`vX.Y.Z`) |
| `github.event.client_payload.asset_url` | URL to spec tarball |
| `SPECS_ACCESS_PAT` (secret) | Token to download spec from GitHub. Must have repo access to download the specs |

**Guaranteed Input Location**

```
generator/openapi/spec.json
```

This path is **mandatory** for all SDKs.

**Script Called**

```
generator/scripts/generate.sh
```

**Responsibilities of generate.sh**

- Read `generator/openapi/spec.json`
- Run language-specific generator
- Write SDK source code into the repository
- ❌ Do NOT commit
- ❌ Do NOT tag
- ❌ Do NOT create releases

**Output**

- Pull request:
  ```
  regen/vX.Y.Z
  ```

---

### release.yml — Build GitHub Release

**Trigger**
```
git push tag vX.Y.Z
```

**Inputs**
- Repository state after regeneration PR has been merged

**Script Called**
```
generator/scripts/prepare-release.sh vX.Y.Z
```

**Responsibilities of prepare-release.sh**

- Validate generated SDK
- Install dependencies if needed
- Create release artifacts
- Write artifacts to:

```
generator/release-artifacts/
```

**Output**
- GitHub Release `vX.Y.Z`
- Uploaded artifacts
- Dispatches `docs-update` event

---

### update-docs.yml — Versioned Documentation

**Trigger**
```
repository_dispatch (docs-update)
```

**Inputs**

| Variable | Description |
|--------|------------|
| `VERSION` | SDK version (`vX.Y.Z`) |
| `REFERENCE_FILE` | Path to generated reference file |

Example (Fern):
```
REFERENCE_FILE=fern/sdk/reference.md
```

**Responsibilities**

- Validate reference file exists
- Copy reference into:
  ```
  docs/latest/reference.md
  docs/vX.Y.Z/reference.md
  ```
- Regenerate `docs/index.md`
- Create documentation PR

**Output**
- PR updating `/docs`
- Content ready for GitHub Pages

---

### publish.yml — Registry Publishing (Optional)

**Trigger**
```
workflow_run (release.yml succeeded; publisher verifies its release-identity artifact)
```

**Inputs**
- Git tag `vX.Y.Z`
- Exact release commit SHA
- Registry credentials (language-specific)

**Script Called**
```
generator/scripts/publish.sh vX.Y.Z
```

---

## 7. Required Secrets

### GitHub Secrets (per SDK repo)

| Name | Purpose |
|----|--------|
| `SPECS_ACCESS_PAT` | GitHub token used to download OpenAPI spec artifacts from a draft GitHub release in the SDK repository

---

## 8. GitHub Pages Setup (One-Time)

Once documentation exists:

1. Go to **Repository → Settings → Pages**
2. Source: **Deploy from a branch**
3. Branch: `main`
4. Folder: `/docs`

Docs will be available at:

```
https://upcloudltd.github.io/<repo-name>/
```

---

## 9. SDK Author Checklist (One Page)

### Repository
- [ ] Created from SDK template
- [ ] Public repo
- [ ] GitHub Pages enabled

### Secrets
- [ ] `SPECS_ACCESS_PAT` configured
- [ ] Registry secrets added (if applicable)

### Generation
- [ ] `generate.sh` implemented
- [ ] Reads from `generator/openapi/spec.json`
- [ ] Writes SDK code to repo
- [ ] No commits or tags

### Release
- [ ] `prepare-release.sh` implemented
- [ ] Outputs artifacts to `generator/release-artifacts/`

### Documentation
- [ ] Reference file generated
- [ ] `REFERENCE_FILE` path correct
- [ ] Docs PR workflow verified

### Publishing
- [ ] `publish.yml` present
- [ ] Triggered only after successful release
- [ ] Registry credentials configured

### End-to-End
- [ ] Spec release creates regen PR
- [ ] PR merged manually
- [ ] Tag `vX.Y.Z` pushed
- [ ] GitHub release created
- [ ] Docs PR created
- [ ] Package published