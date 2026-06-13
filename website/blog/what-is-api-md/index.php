<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-api-md',
  'title' => 'What Is API.md?',
  'seo_title' => 'What Is API.md? Markdown API Docs | Markdown Docs',
  'description' => 'API.md explained: how to document API endpoints, examples, payloads, and auth in Markdown, and how AI coding agents use API.md for accurate integrations.',
  'date' => '2026-06-13',
  'reading_time' => '5 min read',
  'eyebrow' => 'API.md explained',
  'h1' => 'What is API.md?',
  'lead' => 'API.md is a Markdown file that documents a project API: endpoints, request and response examples, payloads, and authentication, kept next to the code.',
  'sections' => [
    ['heading' => 'API.md meaning', 'body' => '<p>`API.md` is a lightweight, Markdown-based API reference. It documents the endpoints a service exposes, the data they accept and return, and how to authenticate. For small or internal APIs, a single API.md is often enough, and because it lives in the repository it stays close to the code and versions with it.</p>'],
    ['heading' => 'What to document', 'body' => '<ul><li>Each endpoint, method, and path</li><li>Required and optional parameters</li><li>Request and response examples</li><li>Status codes and error formats</li><li>Authentication and rate limits</li></ul><pre><code># API&#10;&#10;## GET /users/{id}&#10;Returns a single user.&#10;&#10;**Response 200**&#10;```json&#10;{ "id": 1, "name": "Alice" }&#10;```&#10;&#10;## Auth&#10;Send `Authorization: Bearer &lt;token&gt;`.</code></pre>'],
    ['heading' => 'API.md vs OpenAPI', 'body' => '<p>For large or public APIs, a machine-readable spec like OpenAPI is better because it powers generated clients and interactive docs. API.md is the simpler choice for small services, internal tools, or a quick human-readable reference. Many projects start with API.md and adopt OpenAPI as the API grows.</p>'],
    ['heading' => 'How AI tools use API.md', 'body' => '<p>AI coding agents read API.md to generate correct integration code, write client functions, and answer questions about endpoints and payloads. Clear examples in API.md reduce wrong guesses about field names, methods, and auth, which makes generated code work on the first try more often. It complements a clear <a href="/blog/what-is-readme-md/">README.md</a> and <a href="/blog/what-is-design-md/">DESIGN.md</a>.</p>'],
    ['heading' => 'Edit API.md with a preview', 'body' => '<p>API docs rely on code blocks and tables, so a live preview helps. Draft API.md in the <a href="/editor/">Markdown Docs online editor</a>, or <a href="/download/">download Markdown Docs</a> to edit it on Windows. See more <a href="/blog/common-md-files-for-ai-projects/">common .md files for AI projects</a>.</p>']
  ],
  'sources' => [
    ['label' => 'OpenAPI Specification', 'url' => 'https://www.openapis.org/', 'note' => 'for machine-readable API specs.'],
    ['label' => 'GitHub Markdown syntax', 'url' => 'https://docs.github.com/github/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax', 'note' => 'for formatting code and tables.']
  ],
  'faqs' => [
    ['Is API.md a standard?', 'No. API.md is a convention for documenting an API in Markdown. For formal, machine-readable specs, use OpenAPI.'],
    ['What should API.md include?', 'Endpoints with methods and paths, parameters, request and response examples, status codes, and authentication details.'],
    ['When should I use OpenAPI instead?', 'Use OpenAPI for large or public APIs that need generated clients and interactive docs. API.md suits small or internal APIs.'],
    ['How do AI agents use API.md?', 'They read it to generate correct client code and answer endpoint questions, using the examples to avoid wrong field names or auth.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
