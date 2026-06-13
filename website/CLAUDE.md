# CLAUDE.md - Markdown Docs website

Project memory for Claude Code and other AI agents working on the **Markdown Docs** marketing +
content website. Read this first before editing.

## What this is

A PHP (no framework) marketing and content site for **Markdown Docs**, a Windows Markdown editor +
previewer with an online editor. The site's SEO strategy centers on a content cluster about
**Markdown files used by AI and AI agents** (README.md, AGENTS.md, CLAUDE.md, GEMINI.md, Cursor
rules, SKILL.md, llms.txt, etc.) which is its main differentiator.

- **Live domain:** `https://markdowndocs.online` (registered 2026-06-13). The site was originally
  built on the typo domain `makrdowndocs.online`; everything was migrated. `.htaccess` 301-redirects
  the old typo domain (and www) to the correct one. Do NOT reintroduce `makrdowndocs`.
- **Tech:** PHP 8.2, plain HTML/CSS/JS. No build step, no database. Download counts are stored in
  `data/downloads.json`.

## Run locally

```bash
php -S 127.0.0.1:8765      # from the website/ root, then open http://127.0.0.1:8765/
```
There is a measurement harness at `seo-work/measure.php` that renders every page and reports title
length, description length, visible word count, H2 count, and internal-link count. Run it against
the dev server after content changes:
```bash
php seo-work/measure.php
```

## Directory map

- `index.php` - homepage. Section pages live in folders: `features/`, `editor/`, `download/`,
  `faq/`, `about/`, `contact/`, `privacy/`, `terms/`, each an `index.php`.
- `blog/index.php` - blog listing (has the live JS search box). `blog/<slug>/index.php` - one post.
- `includes/config.php` - the `$site` array (brand, urls, contact email) + helpers `e()`,
  `page_url()`, `is_current()`, `is_section()`.
- `includes/header.php` - `<head>`, global Organization+WebSite JSON-LD, optional BreadcrumbList
  (set `$breadcrumbs`), nav. Emits per-page `$schema` if set. Versions CSS via `?v=filemtime`.
- `includes/footer.php` - footer nav + versioned `site.js`.
- `includes/blog-data.php` - `$blogPosts` array (listing cards + ItemList schema) and
  `blog_post_by_slug()`.
- `includes/article-template.php` - renders a blog post from an `$article` array (BlogPosting +
  FAQPage + Breadcrumb schema, sources, FAQ section).
- `assets/css/styles.css`, `assets/js/site.js` - styles and the small JS (mobile nav, file upload,
  blog search filter). Both are cache-busted by filemtime in header/footer.
- `seo-work/` - SEO research, audit reports, and `measure.php`. Not part of the public site.

## How a page declares its SEO

Before `include header.php`, a page sets PHP variables:
```php
$title = '...';          // <=60 chars
$description = '...';     // 120-160 chars
$canonical = page_url('path/');
$schema = [ ... ];        // optional per-page JSON-LD (@graph or single type)
$breadcrumbs = [ ['name'=>'Home','url'=>page_url('')], ... ]; // optional, builds BreadcrumbList
```

## How to add a blog post

1. Create `blog/<slug>/index.php`. Most posts use the **article template**: define an `$article`
   array (`slug, title, seo_title, description, date, reading_time, eyebrow, h1, lead, sections[],
   sources[], faqs[]`) then `include includes/article-template.php`. See any
   `blog/what-is-*.md/index.php` as a model. Each `sections` item is `['heading'=>..,'body'=>'<p>..']`
   (body is raw HTML).
2. Add a card entry to `$blogPosts` in `includes/blog-data.php` (so it shows on `/blog/` and in the
   ItemList + search index).
3. Add the URL to **`sitemap.xml`** (with `<lastmod>`) and **`llms.txt`** (Blog/Insights section).
4. Add at least 2-3 contextual internal links to/from related posts (pillar <-> cluster).

The cluster pillar is `blog/ai-agent-instruction-files-explained/` and the supporting roundup is
`blog/common-md-files-for-ai-projects/` (its table links every per-file post). New `.md`-file posts
should be linked from both.

## Content + SEO conventions (IMPORTANT)

- **Never use the em dash character.** Use a comma, "to", or a period instead. This is a hard rule
  for all content. (Grepping the repo for the em dash character should return nothing in
  `.php`/`.txt`/`.xml`.)
- **Meta titles <= 60 chars. Meta descriptions 120-160 chars.** Verify with `seo-work/measure.php`.
- Every blog post: a direct-answer opening, question-style H2s, an FAQ block (drives FAQPage schema),
  cited `sources`, and links to `/editor/` and `/download/`.
- Weave semantic keywords (CommonMark, GFM, fenced code blocks, frontmatter, task lists, etc.).
- Keep `sitemap.xml`, `robots.txt`, and `llms.txt` in sync with every new page. `llms.text` is just a
  pointer mirror to `llms.txt`.
- Brand name is "Markdown Docs" (`$site['app_name']`). Reference it via `e($appName)`, not hardcoded.

## AdSense / compliance pages

The site is set up for Google AdSense review. Required pages exist: `/about/`, `/contact/`,
`/privacy/` (discloses cookies, Google Analytics G-NRDJ1ZFD40, and AdSense/third-party ad cookies
with opt-out links), and `/terms/`. Contact email is `$site['contact_email']`
(contact@markdowndocs.online). After AdSense approval, add `ads.txt` at the site root with the
publisher line `google.com, pub-XXXXXXXXXXXXXXXX, DIRECT, f08c47fec0942fa0`.

## Deploy notes

- Point `markdowndocs.online` DNS at the host, upload the `website/` contents. `.htaccess` handles
  HTTPS + non-www canonicalization and the old-domain 301. Ensure the TLS cert covers the apex and
  `www`.
- After deploy: submit `sitemap.xml` in Google Search Console and Bing; confirm `llms.txt` loads.
- CSS/JS are cache-busted by file mtime, so edits propagate to visitors automatically.
