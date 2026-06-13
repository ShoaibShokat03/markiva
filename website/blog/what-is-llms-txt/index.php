<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-llms-txt',
  'title' => 'What Is llms.txt?',
  'seo_title' => 'What Is llms.txt? The AI Sitemap Explained | Markdown Docs',
  'description' => 'llms.txt explained: what the file is, why it matters for AI search, how to format it in Markdown, and how it differs from robots.txt and sitemap.xml.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'llms.txt explained',
  'h1' => 'What is llms.txt?',
  'lead' => 'llms.txt is a Markdown file at the root of a website that tells large language models what the site is about and which pages to reference.',
  'sections' => [
    ['heading' => 'llms.txt meaning', 'body' => '<p>`llms.txt` is a plain-text Markdown file placed at the root of a domain, for example `https://example.com/llms.txt`. It gives large language models a clean, structured summary of a site: what it is, the most important pages, and short descriptions of each. Think of it as a `robots.txt` for AI, but instead of controlling crawling, it presents your best content in a format that models can read easily.</p><p>The standard was proposed in September 2024 and is written in Markdown on purpose. Markdown is compact, token-efficient, and easy for both humans and models to parse, which makes it a natural fit for feeding context to AI systems.</p>'],
    ['heading' => 'Why llms.txt matters for AI search', 'body' => '<p>AI assistants and answer engines like ChatGPT, Perplexity, Claude, and Google AI Overviews increasingly summarize and cite web pages. A clear llms.txt helps these tools understand your site structure, reference the right URLs, and describe your content accurately. This is part of a wider shift toward GEO (generative engine optimization) and AEO (answer engine optimization), where the goal is to be quoted correctly by AI, not only ranked in classic search.</p>'],
    ['heading' => 'How an llms.txt file is structured', 'body' => '<p>The format is simple Markdown: an H1 with the site name, a short summary, then H2 sections with links and one-line descriptions. A minimal example looks like this:</p><pre><code># Example Project&#10;&#10;Short description of what the site or product does.&#10;&#10;## Docs&#10;&#10;- [Getting started](https://example.com/start): install and first steps&#10;- [API reference](https://example.com/api): endpoints and examples&#10;&#10;## Optional&#10;&#10;- [Changelog](https://example.com/changelog): release history</code></pre><p>Some sites also publish an `llms-full.txt` that includes the full text of key pages for models that want deeper context.</p>'],
    ['heading' => 'llms.txt vs robots.txt vs sitemap.xml', 'body' => '<table><tbody><tr><th>File</th><th>Audience</th><th>Purpose</th></tr><tr><td>robots.txt</td><td>Search crawlers</td><td>What they may or may not crawl</td></tr><tr><td>sitemap.xml</td><td>Search engines</td><td>A full list of URLs to index</td></tr><tr><td>llms.txt</td><td>AI models</td><td>A curated, readable summary of key content</td></tr></tbody></table><p>They are complementary. robots.txt and sitemap.xml help traditional SEO, while llms.txt is aimed at AI consumption. Markdown Docs publishes its own <a href="/">llms.txt</a> as a working example.</p>'],
    ['heading' => 'How to create an llms.txt file', 'body' => '<ol><li>List your most valuable pages: docs, product, key guides.</li><li>Write a one-line description for each, in plain language.</li><li>Format the file in Markdown with an H1 title and H2 sections.</li><li>Save it as `llms.txt` and upload it to your site root.</li><li>Keep it current as you add important pages.</li></ol><p>Because it is just Markdown, you can draft and preview it in the <a href="/editor/">online Markdown editor</a> before publishing.</p>'],
    ['heading' => 'Is llms.txt an official standard?', 'body' => '<p>llms.txt is a proposed community standard, not an official requirement. As of 2026, the major AI providers have not formally confirmed they read it during crawling. Even so, it is low-cost to publish, it documents your site clearly, and it positions you for a future where AI systems increasingly rely on structured, citable sources. Many documentation platforms now generate it automatically.</p>'],
    ['heading' => 'Related Markdown files', 'body' => '<p>llms.txt is part of a growing family of Markdown files that give machines context. See <a href="/blog/common-md-files-for-ai-projects/">common .md files for AI projects</a>, or learn about <a href="/blog/what-is-agents-md/">AGENTS.md</a> and <a href="/blog/what-is-claude-md/">CLAUDE.md</a> for instructing AI coding agents.</p>']
  ],
  'sources' => [
    ['label' => 'llms.txt proposal (llmstxt.org)', 'url' => 'https://llmstxt.org/', 'note' => 'for the original specification.'],
    ['label' => 'Semrush: What is llms.txt', 'url' => 'https://www.semrush.com/blog/llms-txt/', 'note' => 'for adoption context and SEO view.']
  ],
  'faqs' => [
    ['Where should llms.txt be placed?', 'Put llms.txt at the root of your domain, such as https://yoursite.com/llms.txt, so AI tools can find it in a predictable location.'],
    ['Is llms.txt the same as robots.txt?', 'No. robots.txt controls what search crawlers may access. llms.txt presents a curated, Markdown summary of your best content for large language models.'],
    ['Do I need llms.txt for SEO?', 'It is optional and not yet officially used by major AI providers, but it is cheap to publish, documents your site clearly, and supports AEO and GEO strategies.'],
    ['What format does llms.txt use?', 'It uses Markdown: an H1 site name, a short summary, then H2 sections containing links with one-line descriptions.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
