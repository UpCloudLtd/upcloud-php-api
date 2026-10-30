"""Regression coverage for Fern-to-Pages conversion."""
import importlib.util
import re
import tempfile
import unittest
from pathlib import Path

ROOT = Path(__file__).resolve().parents[2]
spec = importlib.util.spec_from_file_location('prepare_docs', ROOT / 'generator/scripts/prepare_docs.py')
docs = importlib.util.module_from_spec(spec)
spec.loader.exec_module(docs)


class PrepareDocsTests(unittest.TestCase):
    def test_index_identifies_legacy_docs_and_prerelease_snapshots(self):
        with tempfile.TemporaryDirectory() as directory:
            root = Path(directory)
            for version in ('latest', 'v0.0.105', 'v4.0.0-alpha.1'):
                (root / version).mkdir()
                (root / version / 'reference.md').write_text('## server\n')
            docs.prepare_index(root)
            index = (root / 'index.md').read_text()
            self.assertIn('https://github.com/UpCloudLtd/upcloud-php-api#requirements', index)
            self.assertNotIn('upcloud-php-sdk', index)
            self.assertIn('v4.0.0-alpha.1/reference.html', index)
            self.assertIn('are not legacy Packagist v1-v3 releases', index)
            self.assertIn('/tree/v3.0.0', index)

    def test_preserves_examples_and_method_count_in_each_snapshot(self):
        for path in (ROOT / 'docs').glob('*/reference.md'):
            with self.subTest(version=path.parent.name):
                original = path.read_text()
                prepared = docs.prepare_reference(original, path.parent.name)
                self.assertEqual(re.findall(r'```.*?```', original, re.S),
                                 re.findall(r'```.*?```', prepared, re.S))
                self.assertEqual(original.count('<details'), prepared.count('<details'))
                self.assertEqual(prepared, docs.prepare_reference(prepared, path.parent.name))
                self.assertEqual(docs.services(original), docs.services(prepared))

    def test_explicit_parsing_and_anchors(self):
        source = '''# Reference
## ip_address
<details><summary><code>$client-&gt;ipAddress-&gt;list()</code></summary>
<dl>
<dd>

#### 📝 Description

List addresses.
</dd>
</dl>
</details>
'''
        result = docs.prepare_reference(source, 'latest')
        self.assertIn('{:#ip_addressAnchor}', result)
        self.assertIn('<details markdown="block">\n<summary markdown="0">', result)
        self.assertIn('#### Description', result)
        self.assertNotIn('<dl>', result)
        self.assertNotIn('<dd>', result)


if __name__ == '__main__':
    unittest.main()
