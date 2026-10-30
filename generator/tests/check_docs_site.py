#!/usr/bin/env python3
"""Check actual Jekyll output, including link targets and native disclosures."""
import re
import sys
from html.parser import HTMLParser
from pathlib import Path
from urllib.parse import unquote, urlsplit


class Page(HTMLParser):
    def __init__(self, html):
        super().__init__()
        self.ids = set()
        self.links = []
        self.methods = []
        self.current = None
        self.stack = []
        self.feed(html)
        assert self.current is None, 'Unclosed method disclosure'

    def handle_starttag(self, tag, attrs):
        attrs = dict(attrs)
        if 'id' in attrs:
            self.ids.add(attrs['id'])
        if tag == 'a' and 'href' in attrs:
            self.links.append(attrs['href'])
        if tag == 'details':
            assert self.current is None, 'Unexpected nested method disclosure'
            self.current = {'summary': 0, 'pre': 0, 'description': False}
        if self.current is not None and tag in ('summary', 'pre'):
            self.current[tag] += 1
        if tag not in ('meta', 'link', 'br', 'hr', 'img', 'input', 'wbr'):
            self.stack.append(tag)

    def handle_endtag(self, tag):
        if tag == 'details':
            assert self.current is not None
            self.methods.append(self.current)
            self.current = None
        if tag in self.stack:
            self.stack = self.stack[:len(self.stack) - 1 - self.stack[::-1].index(tag)]

    def handle_data(self, data):
        assert not re.search(r'</?(?:summary|details|dl|dd)>', data), 'Leaked HTML markup'
        if self.current is not None and 'h4' in self.stack and data.strip() == 'Description':
            self.current['description'] = True


def check(site, source):
    pages = {p.relative_to(site).as_posix(): Page(p.read_text()) for p in site.rglob('*.html')}
    assert 'index.html' in pages
    checked = 0
    for name, page in pages.items():
        for href in page.links:
            url = urlsplit(href)
            if url.scheme or url.netloc:
                continue
            path = unquote(url.path)
            if path.startswith('/upcloud-php-api/'):
                path = path[len('/upcloud-php-api/'):]
            elif path.startswith('/'):
                raise AssertionError(f'Link missing project base path: {href}')
            elif path:
                path = (Path(name).parent / path).as_posix()
            else:
                path = name
            if not path or path.endswith('/'):
                path += 'index.html'
            assert path in pages, (name, href, 'missing page')
            if url.fragment:
                assert unquote(url.fragment) in pages[path].ids, (name, href, 'missing anchor')
            checked += 1
        if name.endswith('/reference.html'):
            markdown = (source / name.replace('.html', '.md')).read_text()
            assert len(page.methods) == markdown.count('<details '), name
            sources = re.findall(r'<details\b[^>]*>(.*?)</details>', markdown, re.S)
            assert len(sources) == len(page.methods), name
            for method, source_method in zip(page.methods, sources):
                signature = re.search(r'<summary[^>]*>(.*?)</summary>', source_method, re.S)
                label = signature[1] if signature else '(missing summary)'
                assert method['summary'] == 1, (name, label, 'Expected one summary')
                assert method['pre'] >= 1, (name, label, 'Missing code example')
                if re.search(r'^#### Description\s*$', source_method, re.M):
                    assert method['description'], (name, label, 'Description lost during rendering')
    print(f'Checked {len(pages)} pages, {checked} local links, and '
          f'{sum(len(p.methods) for p in pages.values())} method disclosures.')


if __name__ == '__main__':
    check(Path(sys.argv[1]), Path(sys.argv[2] if len(sys.argv) > 2 else 'docs'))
