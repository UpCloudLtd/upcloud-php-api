"""Descriptions are optional, but must survive rendering when provided."""
import importlib.util
import tempfile
import unittest
from pathlib import Path

spec = importlib.util.spec_from_file_location(
    'check_docs_site', Path(__file__).with_name('check_docs_site.py'))
site_check = importlib.util.module_from_spec(spec)
spec.loader.exec_module(site_check)


class CheckDocsSiteTests(unittest.TestCase):
    def test_project_links_use_the_destination_base_path(self):
        with tempfile.TemporaryDirectory() as directory:
            root = Path(directory)
            site = root / 'site'
            site.mkdir()
            page = site / 'index.html'
            page.write_text('<a href="/upcloud-php-api/index.html">Home</a>')
            site_check.check(site, root)
            page.write_text('<a href="/upcloud-php-sdk/index.html">Home</a>')
            with self.assertRaisesRegex(AssertionError, 'Link missing project base path'):
                site_check.check(site, root)

    def check_fixture(self, source_description, rendered_description):
        with tempfile.TemporaryDirectory() as directory:
            root = Path(directory)
            for folder in ('site/latest', 'docs/latest'):
                (root / folder).mkdir(parents=True)
            (root / 'site/index.html').write_text('<h1>SDK</h1>')
            (root / 'site/latest/reference.html').write_text(
                '<details><summary>method()</summary>' + rendered_description +
                '<pre><code>method();</code></pre></details>')
            (root / 'docs/latest/reference.md').write_text(
                '<details markdown="block"><summary>method()</summary>\n' +
                source_description + '\n```php\nmethod();\n```\n</details>')
            site_check.check(root / 'site', root / 'docs')

    def test_description_optional_when_absent_from_source(self):
        self.check_fixture('', '')

    def test_present_description_must_render(self):
        self.check_fixture('#### Description\nExample.', '<h4>Description</h4><p>Example.</p>')
        with self.assertRaisesRegex(AssertionError, 'Description lost during rendering'):
            self.check_fixture('#### Description\nExample.', '')


if __name__ == '__main__':
    unittest.main()
