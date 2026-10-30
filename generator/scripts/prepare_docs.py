#!/usr/bin/env python3
"""Adapt Fern's GitHub Markdown for Jekyll without modifying the SDK reference."""
import argparse
import re
from pathlib import Path


def services(source):
    return re.findall(r'^## ([a-zA-Z0-9_-]+)$', source, re.MULTILINE)


def prepare_reference(source, version):
    # Rebuild metadata when processing an already prepared snapshot.
    source = re.sub(r'\A---\n.*?\n---\n', '', source, count=1, flags=re.DOTALL)
    areas = services(source)
    output = []
    fenced = False
    for line in source.splitlines():
        if line.startswith('```'):
            fenced = not fenced
        if not fenced:
            if re.fullmatch(r'</?(?:dl|dd)>', line):
                continue
            match = re.fullmatch(r'<details><summary>(.*)</summary>', line)
            if match:
                output.extend(['<details markdown="block">',
                               '<summary markdown="0">' + match[1] + '</summary>', ''])
                continue
            if line == '</details>':
                output.extend(['', line, ''])
                continue
            if line.startswith('## ') and line[3:] in areas:
                output.extend([line, '{:#' + line[3:] + 'Anchor}', ''])
                continue
            if re.fullmatch(r'\{:#.*Anchor\}', line):
                continue
            if line == '# Reference':
                line = '# API reference'
            line = re.sub(r'^#### [📝🔌⚙️]+\s*', '#### ', line)
        output.append(line)
    # Do not collapse whitespace inside code examples.
    compact = []
    fenced = False
    for line in output:
        if line.startswith('```'):
            fenced = not fenced
        if not fenced and not line.strip() and compact and not compact[-1].strip():
            continue
        compact.append(line if fenced else line.rstrip())
    body = '\n'.join(compact).strip() + '\n'
    metadata = ['---', 'layout: sdk', f'title: "API reference · {version}"',
                f'version: "{version}"', 'services:']
    metadata.extend(f'  - {area}' for area in areas)
    return '\n'.join(metadata + ['---', '']) + body


def prepare_index(docs):
    areas = services((docs / 'latest/reference.md').read_text())
    versions = sorted((p.name for p in docs.iterdir()
                       if re.fullmatch(r'v\d+\.\d+\.\d+(?:-[a-zA-Z0-9.-]+)?', p.name) and
                       (p / 'reference.md').exists()),
                      key=lambda value: (tuple(map(int, value[1:].split('-')[0].split('.'))), '-' not in value, value), reverse=True)
    lines = ['---', 'layout: sdk', 'title: UpCloud PHP SDK', '---',
             '# UpCloud PHP SDK', '',
             'A typed PHP client for the UpCloud API. Browse service methods, request parameters, and PHP usage examples.', '',
             '## Getting started', '', 'Requires PHP **8.1 or later** and Composer.', '',
             '```sh', 'composer require upcloudltd/upcloud-php-api', '```', '',
             '```php', '<?php', '', "require __DIR__ . '/vendor/autoload.php';", '',
             "$client = new \\Upcloud\\UpcloudClient(token: getenv('UPCLOUD_TOKEN'));",
             '$account = $client->account->details();', '```', '',
             'Set `UPCLOUD_TOKEN` to your API token before running the example.', '',
             '[Installation, authentication, and error handling](https://github.com/UpCloudLtd/upcloud-php-api#requirements)', '',
             'Latest follows the generated SDK on main, including prerelease development. Stable Composer installs do not opt into alpha versions.', '',
             '[Legacy v3 source and documentation](https://github.com/UpCloudLtd/upcloud-php-api/tree/v3.0.0)', '',
             '## API reference', '',
             '[Browse the latest reference](latest/reference.html). Choose a service below to jump to its methods. Expand a method to see its description, usage, and parameters.', '',
             '### Services', '', '<div class="service-grid" markdown="block">', '']
    lines.extend(f'- [{area.replace("_", " ").replace("-", " ").title()}](latest/reference.html#{area}Anchor)' for area in areas)
    lines.extend(['', '</div>', '', '## Tagged releases', '',
                  'Versioned SDK reference snapshots. The v0.0.x snapshots predate migration and are not legacy Packagist v1-v3 releases.', ''])
    lines.extend(f'- [{version}]({version}/reference.html)' for version in versions)
    (docs / 'index.md').write_text('\n'.join(lines) + '\n')


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument('--docs', type=Path, default=Path('docs'))
    parser.add_argument('--source', type=Path, default=Path('fern/sdk/reference.md'))
    parser.add_argument('--version', help='Copy the generated reference to latest and this release')
    args = parser.parse_args()
    if args.version:
        if not re.fullmatch(r'v\d+\.\d+\.\d+(?:-[a-zA-Z0-9.-]+)?', args.version):
            parser.error('version must be a release tag such as v0.0.65')
        source = args.source.read_text()
        for version in ('latest', args.version):
            directory = args.docs / version
            directory.mkdir(parents=True, exist_ok=True)
            (directory / 'reference.md').write_text(source)
    for reference in sorted(args.docs.glob('*/reference.md')):
        reference.write_text(prepare_reference(reference.read_text(), reference.parent.name))
    prepare_index(args.docs)


if __name__ == '__main__':
    main()
