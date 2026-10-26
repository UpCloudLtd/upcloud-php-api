import assert from 'node:assert/strict';
import { execFileSync, spawnSync } from 'node:child_process';
import { mkdtempSync, readFileSync, writeFileSync, mkdirSync, existsSync, rmSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';
import test from 'node:test';

const root = fileURLToPath(new URL('../../', import.meta.url));
const publisher = resolve(root, 'generator/scripts/publish.sh');
const commit = 'a'.repeat(40);
const repository = 'UpCloudLtd/upcloud-php-api';

function workspace(context) {
  const directory = mkdtempSync(join(tmpdir(), 'php-release-test-'));
  context.after(() => rmSync(directory, { recursive: true, force: true }));
  return directory;
}

function packageVersion(overrides = {}) {
  return {
    version: 'v4.0.0-alpha.1',
    source: { type: 'git', url: `https://github.com/${repository}.git`, reference: commit },
    dist: { type: 'zip', url: `https://api.github.com/repos/${repository}/zipball/${commit}`, reference: commit },
    ...overrides,
  };
}

function publish(context, versions, update = { status: 'success' }) {
  const directory = workspace(context);
  const bin = join(directory, 'bin');
  mkdirSync(bin);
  writeFileSync(join(directory, 'update.json'), JSON.stringify(update));
  writeFileSync(join(directory, 'metadata.json'), JSON.stringify({
    minified: 'composer/2.0', packages: { 'upcloudltd/upcloud-php-api': versions },
  }));
  writeFileSync(join(bin, 'curl'), `#!/usr/bin/env bash
set -euo pipefail
if [[ "$*" == *api/update-package* ]]; then
  [[ "$*" == *'Authorization: Bearer fixture-user:fixture-token'* ]]
  [[ "$*" == *'"repository":"https://github.com/UpCloudLtd/upcloud-php-api"'* ]]
  cat "$FIXTURE/update.json"
else
  [[ "$*" == *repo.packagist.org/p2/upcloudltd/upcloud-php-api.json* ]]
  cat "$FIXTURE/metadata.json"
fi
`, { mode: 0o755 });
  writeFileSync(join(bin, 'sleep'), '#!/usr/bin/env bash\nexit 0\n', { mode: 0o755 });
  const result = spawnSync('bash', [publisher, 'v4.0.0-alpha.1'], {
    cwd: directory, encoding: 'utf8',
    env: { ...process.env, PATH: `${bin}:${process.env.PATH}`, FIXTURE: directory,
      GITHUB_REPOSITORY: repository, RELEASE_COMMIT: commit,
      PACKAGIST_USERNAME: 'fixture-user', PACKAGIST_TOKEN: 'fixture-token' },
  });
  return { result, receipt: join(directory, 'publication-receipt.json') };
}

test('stable, alpha, beta and rc tags pass format validation; malformed tags do not', () => {
  for (const tag of ['v4.0.0', 'v0.0.0', 'v4.0.0-alpha', 'v4.0.0-alpha.0', 'v4.0.0-alpha.1', 'v4.0.0-beta.2', 'v4.0.0-rc.1']) {
    const result = spawnSync('bash', [publisher, tag], {
      encoding: 'utf8', env: { ...process.env, PACKAGIST_USERNAME: '', PACKAGIST_TOKEN: '' },
    });
    assert.match(result.stdout, /PACKAGIST_USERNAME and PACKAGIST_TOKEN must be set/);
  }
  for (const tag of ['main', '4.0.0', 'v4.0', 'v4.0.0-dev', 'v4.0.0-alpha.',
    'v4.0.0-rc.foo', 'v4.0.0-alpha.1.extra', 'v4.0.0-alpha.01', 'v04.0.0', 'v4.00.0']) {
    const result = spawnSync('bash', [publisher, tag], { encoding: 'utf8' });
    assert.equal(result.status, 1);
    assert.match(result.stdout, /expected vX.Y.Z/);
  }
});

test('workflow validators match the publisher numeric prerelease contract', () => {
  const publisherText = readFileSync(publisher, 'utf8');
  const pattern = publisherText.match(/=~ (\^v\S+) \]\]/)[1];
  const release = readFileSync(resolve(root, '.github/workflows/release.yml'), 'utf8');
  const publish = readFileSync(resolve(root, '.github/workflows/publish.yml'), 'utf8');
  const patterns = [...`${release}\n${publish}`.matchAll(/=~ (\^v\S+) \]\]/g)];
  assert.equal(patterns.length, 3);
  for (const match of patterns) assert.equal(match[1], pattern);
});

test('tag-based documentation PRs explicitly target the default branch', () => {
  const workflow = readFileSync(resolve(root, '.github/workflows/update-docs.yml'), 'utf8');
  assert.match(workflow, /ref: \$\{\{ env.VERSION \}\}/);
  const creation = workflow.slice(workflow.indexOf('- name: Create PR for docs update'));
  assert.match(creation, /base: \$\{\{ github.event.repository.default_branch \}\}/);
});

test('verified alpha source and archive produce an evidence-based receipt', context => {
  const { result, receipt } = publish(context, [packageVersion()]);
  assert.equal(result.status, 0, result.stdout + result.stderr);
  const proof = JSON.parse(readFileSync(receipt));
  assert.equal(proof.source.reference, commit);
  assert.equal(proof.dist.reference, commit);
  assert.equal(proof.version, 'v4.0.0-alpha.1');
});

test('compressed registry metadata inherits unchanged source and dist', context => {
  const { result } = publish(context, [packageVersion({ version: 'v4.0.0-alpha.2' }), { version: 'v4.0.0-alpha.1' }]);
  assert.equal(result.status, 0, result.stdout + result.stderr);
});

test('wrong source, archive, commit, missing version and rejected update never produce receipts', context => {
  const cases = [
    [packageVersion({ source: { type: 'git', url: 'https://github.com/attacker/repo.git', reference: commit } })],
    [packageVersion({ source: { type: 'git', url: `https://github.com/${repository}.git`, reference: 'b'.repeat(40) } })],
    [packageVersion({ dist: { type: 'zip', url: `https://api.github.com/repos/${repository}/zipball/${commit}`, reference: 'b'.repeat(40) } })],
    [packageVersion({ dist: { type: 'zip', url: 'https://example.com/archive.zip', reference: commit } })],
    [packageVersion({ source: '__unset' })],
    [],
  ];
  for (const versions of cases) {
    const { result, receipt } = publish(context, versions);
    assert.notEqual(result.status, 0);
    assert.equal(existsSync(receipt), false);
  }
  const { result, receipt } = publish(context, [packageVersion()], { status: 'error' });
  assert.notEqual(result.status, 0);
  assert.equal(existsSync(receipt), false);
});

function verificationScript(file, name) {
  const lines = readFileSync(resolve(root, file), 'utf8').split('\n');
  const start = lines.findIndex(line => line.trim() === `- name: ${name}`);
  assert.ok(start >= 0);
  const run = lines.findIndex((line, index) => index > start && line.trim() === 'run: |');
  assert.ok(run > start);
  const script = [];
  for (const line of lines.slice(run + 1)) {
    if (line.trim() && !line.startsWith('          ')) break;
    script.push(line.slice(10));
  }
  return script.join('\n');
}

test('spec-download token is only used after allowlisting the exact GitHub asset endpoint', () => {
  const file = '.github/workflows/regenerate.yml';
  const workflow = readFileSync(resolve(root, file), 'utf8');
  assert.ok(workflow.indexOf('Validate trusted spec asset URL') < workflow.indexOf('SPECS_ACCESS_PAT:'));
  assert.match(workflow, /--proto '=https' --proto-redir '=https'/);
  assert.doesNotMatch(workflow, /--location-trusted|set -eux/);
  const script = verificationScript(file, 'Validate trusted spec asset URL');
  const trusted = 'https://api.github.com/repos/UpCloudLtd/upcloud-openapi-spec/releases/assets/123';
  for (const url of [trusted, trusted.replace('/123', '/987654321')]) {
    const result = spawnSync('bash', ['-c', script], { encoding: 'utf8', env: { ...process.env, ASSET_URL: url } });
    assert.equal(result.status, 0, result.stderr);
  }
  for (const url of ['', 'https://example.com/asset', trusted.replace('https:', 'http:'),
    trusted.replace('api.github.com', 'api.github.com.attacker.test'),
    trusted.replace('api.github.com', 'api.github.com@attacker.test'),
    trusted.replace('api.github.com', 'user@api.github.com'),
    trusted.replace('api.github.com', 'api.github.com:443'),
    trusted.replace('upcloud-openapi-spec', 'another-repo'),
    trusted.replace('/123', '/123/other'), `${trusted}?redirect=other`, `${trusted}#other`]) {
    const result = spawnSync('bash', ['-c', script], { encoding: 'utf8', env: { ...process.env, ASSET_URL: url } });
    assert.notEqual(result.status, 0, url);
  }
});

test('release identity must match the completed run, repository and commit before checkout', context => {
  const directory = workspace(context);
  mkdirSync(join(directory, 'release-identity'));
  const script = verificationScript('.github/workflows/publish.yml', 'Validate explicit release identity');
  const identity = { tag: 'v4.0.0-alpha.1', commit, repository, run_id: '123' };
  const check = overrides => {
    writeFileSync(join(directory, 'release-identity/release.json'), JSON.stringify({ ...identity, ...overrides }));
    return spawnSync('bash', ['-c', script], { cwd: directory, encoding: 'utf8',
      env: { ...process.env, RELEASE_COMMIT: commit, RELEASE_RUN_ID: '123',
        GITHUB_REPOSITORY: repository, GITHUB_OUTPUT: join(directory, 'outputs') } });
  };
  assert.equal(check({}).status, 0);
  for (const overrides of [
    { commit: 'b'.repeat(40) }, { repository: 'attacker/repo' },
    { run_id: '124' }, { tag: 'main' }, { tag: 'v4.0.0-alpha.1\nextra=value' },
  ]) {
    assert.notEqual(check(overrides).status, 0);
  }
});

test('both workflow guards accept annotated main tags and reject unmerged or mismatched commits', context => {
  const directory = workspace(context);
  const origin = join(directory, 'origin');
  mkdirSync(origin);
  const git = (cwd, ...args) => execFileSync('git', args, { cwd, encoding: 'utf8', stdio: ['ignore', 'pipe', 'pipe'] }).trim();
  git(origin, 'init', '-b', 'main');
  git(origin, 'config', 'user.name', 'Release test');
  git(origin, 'config', 'user.email', 'release-test@example.invalid');
  git(origin, 'commit', '--allow-empty', '-m', 'trusted');
  const trusted = git(origin, 'rev-parse', 'HEAD');
  git(origin, 'tag', '-a', 'v4.0.0-alpha.1', '-m', 'alpha');
  git(origin, 'switch', '-c', 'unmerged');
  git(origin, 'commit', '--allow-empty', '-m', 'untrusted');
  const untrusted = git(origin, 'rev-parse', 'HEAD');
  git(origin, 'tag', '-a', 'v4.0.0-beta.1', '-m', 'beta');
  git(origin, 'switch', 'main');
  const checkout = join(directory, 'checkout');
  git(directory, 'clone', origin, checkout);
  const guards = [
    ['.github/workflows/release.yml', 'Verify tag is on the default branch'],
    ['.github/workflows/publish.yml', 'Verify release tag and commit are on the default branch'],
  ];
  for (const [file, name] of guards) {
    const script = verificationScript(file, name);
    const check = (tag, sha) => {
      git(checkout, 'checkout', '--detach', sha);
      return spawnSync('bash', ['-c', script], { cwd: checkout, encoding: 'utf8',
        env: { ...process.env, DEFAULT_BRANCH: 'main', RELEASE_TAG: tag, RELEASE_COMMIT: sha,
          GITHUB_REF: `refs/tags/${tag}`, GITHUB_SHA: sha, GH_TOKEN: 'fixture-token' } });
    };
    const valid = check('v4.0.0-alpha.1', trusted);
    assert.equal(valid.status, 0, valid.stdout + valid.stderr);
    assert.notEqual(check('v4.0.0-beta.1', untrusted).status, 0);
    assert.notEqual(check('v4.0.0-beta.1', trusted).status, 0);
    assert.notEqual(check('not-a-version', trusted).status, 0);
  }
});

test('default-branch publisher verifies run-bound identity and has no pre-verification Packagist token', () => {
  const workflow = readFileSync(resolve(root, '.github/workflows/publish.yml'), 'utf8');
  assert.doesNotMatch(workflow, /head_branch|environment:/);
  assert.match(workflow, /workflow_run:/);
  assert.match(workflow, /run-id: \$\{\{ github.event.workflow_run.id \}\}/);
  assert.ok(workflow.indexOf('Validate explicit release identity') < workflow.indexOf('Check out the exact release commit'));
  assert.ok(workflow.indexOf('Verify release tag and commit') < workflow.indexOf('PACKAGIST_TOKEN: ${{ secrets.'));
  const release = readFileSync(resolve(root, '.github/workflows/release.yml'), 'utf8');
  assert.match(release, /name: sdk-release-identity/);
  assert.match(release, /continue-on-error: true/);
  assert.match(release, /make_latest:.*'false'/);
});