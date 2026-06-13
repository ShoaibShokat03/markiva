<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-changelog-md',
  'title' => 'What Is CHANGELOG.md?',
  'seo_title' => 'What Is CHANGELOG.md? Keep a Changelog | Markdown Docs',
  'description' => 'CHANGELOG.md explained: how to record release notes and version history in Markdown, the Keep a Changelog format, and why AI tools read it for context.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'CHANGELOG.md explained',
  'h1' => 'What is CHANGELOG.md?',
  'lead' => 'CHANGELOG.md is a Markdown file that records what changed in each version of a project, so people and tools can see its history at a glance.',
  'sections' => [
    ['heading' => 'CHANGELOG.md meaning', 'body' => '<p>`CHANGELOG.md` is a curated, chronological list of notable changes for each version of a project. It is written for humans, kept at the repository root, and usually ordered with the newest version first. A good changelog answers one question quickly: what changed between this release and the last one?</p>'],
    ['heading' => 'The Keep a Changelog format', 'body' => '<p>The widely used Keep a Changelog convention groups entries under headings like Added, Changed, Deprecated, Removed, Fixed, and Security, under each version number and date. Versions typically follow semantic versioning (major.minor.patch).</p><pre><code># Changelog&#10;&#10;## [1.2.0] - 2026-06-13&#10;### Added&#10;- Live preview split view&#10;&#10;### Fixed&#10;- Autosave on rename&#10;&#10;## [1.1.0] - 2026-05-01&#10;### Changed&#10;- Faster file open</code></pre>'],
    ['heading' => 'Why keep a changelog', 'body' => '<ul><li>Users can see what is new without reading commit logs</li><li>Contributors understand recent direction</li><li>Support and QA can map bugs to releases</li><li>It builds trust by making progress visible</li></ul><p>A changelog is a summary for people. Raw Git history is not a substitute, because it is noisy and not written for readers.</p>'],
    ['heading' => 'How AI tools use CHANGELOG.md', 'body' => '<p>AI coding agents read CHANGELOG.md to understand a project\'s recent history and current version. That context helps an assistant write accurate release notes, answer "what changed" questions, and avoid suggesting features that were already removed. Paired with a clear <a href="/blog/what-is-readme-md/">README.md</a>, it gives models a fuller picture of the project.</p>'],
    ['heading' => 'Best practices', 'body' => '<ul><li>Write for humans, not machines</li><li>Keep an Unreleased section at the top for upcoming changes</li><li>One entry per notable change, grouped by type</li><li>Link versions to release tags or diffs where possible</li><li>Update it as part of each release, not months later</li></ul>'],
    ['heading' => 'Edit CHANGELOG.md with a preview', 'body' => '<p>Changelogs use headings, lists, and links, so a preview helps. Draft yours in the <a href="/editor/">Markdown Docs online editor</a>, or <a href="/download/">download Markdown Docs</a> to edit it on Windows. See more <a href="/blog/common-md-files-for-ai-projects/">common .md files for AI projects</a>.</p>']
  ],
  'sources' => [
    ['label' => 'Keep a Changelog', 'url' => 'https://keepachangelog.com/', 'note' => 'the changelog format standard.'],
    ['label' => 'Semantic Versioning', 'url' => 'https://semver.org/', 'note' => 'for version numbering.']
  ],
  'faqs' => [
    ['Where does CHANGELOG.md go?', 'Place it at the repository root so users, contributors, and tools can find it next to the README.'],
    ['What is the Keep a Changelog format?', 'It groups changes under Added, Changed, Deprecated, Removed, Fixed, and Security headings, listed under each version and date, newest first.'],
    ['Is a changelog the same as Git history?', 'No. Git history is a complete, noisy log. A changelog is a curated summary of notable changes written for human readers.'],
    ['Should I use semantic versioning?', 'It is recommended. Semantic versioning (major.minor.patch) makes the size and risk of each release clear in the changelog.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
