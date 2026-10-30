# PHP SDK documentation

Fern's `fern/sdk/reference.md` targets GitHub's Markdown renderer. GitHub Pages
uses Jekyll and Kramdown, which need explicit parsing boundaries around nested
HTML. Do not enable `parse_block_html` globally: it also parses inline summaries
as blocks and can expose closing tags as text.

`python3 generator/scripts/prepare_docs.py` prepares all existing snapshots and
rebuilds the landing page. It preserves fenced PHP examples, removes Fern's
presentation-only definition-list wrappers, keeps summaries as HTML, and enables
Markdown only inside each method disclosure. Service headings have explicit IDs
shared by the landing page and sidebar. Running it again produces no changes.
The original Fern reference remains untouched.

For a new release, the docs-update workflow runs:

```sh
python3 generator/scripts/prepare_docs.py --version v0.0.65
```

This copies the current Fern reference to `latest` and the supplied version,
then prepares every snapshot. Without `--version`, existing snapshots retain
their original API content.

To validate the same renderer used by GitHub Pages:

```sh
cd docs
bundle install
bundle exec jekyll build --destination ../_site
cd ..
python3 generator/tests/check_docs_site.py _site
```

The documentation validation workflow checks rendered links, service IDs, and
method disclosures. The custom layout and stylesheet are in `docs/_layouts/`
and `docs/assets/`; publishing continues to use the repository's Pages setup.
