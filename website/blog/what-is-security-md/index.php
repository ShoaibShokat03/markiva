<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-security-md',
  'title' => 'What Is SECURITY.md?',
  'seo_title' => 'What Is SECURITY.md? Security Policy | Markdown Docs',
  'description' => 'SECURITY.md explained: how it publishes a security policy and vulnerability reporting process, where it lives, and how GitHub and AI tools use it.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'SECURITY.md explained',
  'h1' => 'What is SECURITY.md?',
  'lead' => 'SECURITY.md is a Markdown file that tells people how to report a security vulnerability in your project and what your security policy is.',
  'sections' => [
    ['heading' => 'SECURITY.md meaning', 'body' => '<p>`SECURITY.md` is a community health file that documents a project\'s security policy. Its main job is to give security researchers a clear, private way to report a vulnerability instead of opening a public issue. On GitHub, when a SECURITY.md is present, the platform surfaces a "Report a vulnerability" path and links to the file from the Security tab, so reporters find it at the right moment.</p>'],
    ['heading' => 'Where SECURITY.md lives', 'body' => '<p>Place it where GitHub looks for community health files: the repository root, a `.github` folder, or a `docs` folder.</p><pre><code>.github/&#10;  SECURITY.md&#10;# or&#10;SECURITY.md            # repo root&#10;docs/&#10;  SECURITY.md</code></pre><p>A single SECURITY.md can also live in a special `.github` repository to apply across an entire organization.</p>'],
    ['heading' => 'What to include', 'body' => '<ul><li>Which versions are supported with security updates</li><li>How to report a vulnerability privately (email or a security advisory link)</li><li>What information to include in a report</li><li>Expected response time and disclosure process</li><li>Any scope, safe-harbor, or out-of-scope notes</li></ul>'],
    ['heading' => 'A short SECURITY.md example', 'body' => '<pre><code># Security Policy&#10;&#10;## Supported versions&#10;| Version | Supported |&#10;| ------- | --------- |&#10;| 1.x     | Yes       |&#10;| &lt; 1.0  | No        |&#10;&#10;## Reporting a vulnerability&#10;Email security@example.com. Do not open a&#10;public issue. We respond within 3 business days.</code></pre>'],
    ['heading' => 'Why SECURITY.md matters', 'body' => '<p>A clear security policy means vulnerabilities are reported responsibly and privately, not disclosed in public where they can be exploited. It sets expectations for both sides, builds trust with users and researchers, and is a basic signal of a mature, well-maintained project. For many compliance checks, a SECURITY.md is the expected place to find this information.</p>'],
    ['heading' => 'How AI tools use SECURITY.md', 'body' => '<p>AI coding agents read SECURITY.md to learn the reporting process and supported-version policy before suggesting security-related changes or writing disclosure text. It complements operational files like <a href="/blog/what-is-contributing-md/">CONTRIBUTING.md</a> and project context in the <a href="/blog/what-is-readme-md/">README.md</a>. Together these community health files give both people and agents a complete picture of how the project is run.</p>'],
    ['heading' => 'Edit SECURITY.md with a preview', 'body' => '<p>Security policies use headings, tables, and links, so a preview helps. Draft SECURITY.md in the <a href="/editor/">Markdown Docs online editor</a>, or <a href="/download/">download Markdown Docs</a> to edit it on Windows. See more <a href="/blog/common-md-files-for-ai-projects/">common .md files for AI projects</a>.</p>']
  ],
  'sources' => [
    ['label' => 'GitHub Docs: adding a security policy', 'url' => 'https://docs.github.com/en/code-security/getting-started/adding-a-security-policy-to-your-repository', 'note' => 'official SECURITY.md guidance.']
  ],
  'faqs' => [
    ['Where should SECURITY.md be placed?', 'Put it in the repository root, a .github folder, or a docs folder. GitHub then links to it from the Security tab and the report-a-vulnerability flow.'],
    ['What goes in SECURITY.md?', 'Supported versions, how to report a vulnerability privately, what to include in a report, response time, and the disclosure process.'],
    ['Why not report bugs in a public issue?', 'Public reports expose a vulnerability before it is fixed. SECURITY.md gives a private channel so issues are handled responsibly.'],
    ['Is SECURITY.md required?', 'It is not required, but it is strongly recommended. It is a standard community health file and a signal of a well-maintained project.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
