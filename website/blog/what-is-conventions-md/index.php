<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-conventions-md',
  'title' => 'What Is CONVENTIONS.md?',
  'seo_title' => 'What Is CONVENTIONS.md? Aider Conventions | Markdown Docs',
  'description' => 'CONVENTIONS.md explained: the Markdown coding-conventions file popularized by Aider and used by AI agents like Cursor, Cline, and Claude Code.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'CONVENTIONS.md explained',
  'h1' => 'What is CONVENTIONS.md?',
  'lead' => 'CONVENTIONS.md is a free-form Markdown file that documents the coding rules an AI coding agent should follow inside a repository.',
  'sections' => [
    ['heading' => 'CONVENTIONS.md meaning', 'body' => '<p>`CONVENTIONS.md` is a Markdown file that specifies coding guidelines for AI coding agents to follow. It was popularized by Aider, the AI pair-programming tool, and has since been adopted by other agents such as Cursor, Cline, and Claude Code. It documents project-specific coding standards, library preferences, naming conventions, and architecture decisions in plain natural language.</p>'],
    ['heading' => 'What to include in CONVENTIONS.md', 'body' => '<ul><li>Library and package preferences, for example "prefer httpx over requests"</li><li>Type annotation and typing requirements</li><li>Code style and formatting guidelines</li><li>Naming conventions</li><li>Architecture and project-structure rules</li><li>Testing and review expectations</li></ul><p>The format is free-form Markdown, so you can write the rules as plain sentences under clear headings.</p>'],
    ['heading' => 'How agents load it', 'body' => '<p>With Aider, you load the file as read-only so it is not edited and can be cached:</p><pre><code># load for one session&#10;aider --read CONVENTIONS.md&#10;&#10;# or inside a session&#10;/read CONVENTIONS.md</code></pre><p>To load it automatically every time, add it to your `.aider.conf.yml` config with `read: CONVENTIONS.md`. Other agents can reference the same file, which is why CONVENTIONS.md works as a shared, tool-neutral convention document.</p>'],
    ['heading' => 'A short CONVENTIONS.md example', 'body' => '<pre><code># Conventions&#10;&#10;- Language: Python 3.12 with full type hints.&#10;- Prefer httpx over requests for HTTP.&#10;- Use pytest for tests; one test file per module.&#10;- Functions stay small and single-purpose.&#10;- Public APIs need docstrings.</code></pre>'],
    ['heading' => 'Why a shared conventions file helps', 'body' => '<p>AI agents follow concrete, written rules far better than unwritten team habits. A CONVENTIONS.md keeps standards in one reviewable place, reduces inconsistent output, and works across multiple tools because it is just Markdown. Marking it read-only also means the agent treats it as guidance rather than something to rewrite.</p>'],
    ['heading' => 'CONVENTIONS.md vs other agent files', 'body' => '<p>CONVENTIONS.md overlaps with <a href="/blog/what-is-agents-md/">AGENTS.md</a>, <a href="/blog/what-are-cursor-rules/">Cursor rules</a>, and <a href="/blog/what-is-claude-md/">CLAUDE.md</a>. The difference is emphasis: CONVENTIONS.md focuses on coding standards, while AGENTS.md also covers commands and operations. Many projects use both. Compare them in the <a href="/blog/ai-agent-instruction-files-explained/">AI agent instruction files guide</a>.</p>'],
    ['heading' => 'Edit CONVENTIONS.md with a preview', 'body' => '<p>Draft the file in the <a href="/editor/">Markdown Docs online editor</a> to preview the structure, or <a href="/download/">download Markdown Docs</a> to edit it on Windows.</p>']
  ],
  'sources' => [
    ['label' => 'Aider: specifying coding conventions', 'url' => 'https://aider.chat/docs/usage/conventions.html', 'note' => 'official Aider docs.'],
    ['label' => 'conventions-md overview', 'url' => 'https://github.com/api-evangelist/conventions-md', 'note' => 'on the cross-tool convention.']
  ],
  'faqs' => [
    ['Which tools read CONVENTIONS.md?', 'It was popularized by Aider and is also used by agents such as Cursor, Cline, and Claude Code. Because it is plain Markdown, any tool can reference it.'],
    ['How do I load CONVENTIONS.md in Aider?', 'Use aider --read CONVENTIONS.md or /read CONVENTIONS.md to load it read-only, or set read: CONVENTIONS.md in .aider.conf.yml to load it automatically.'],
    ['Is CONVENTIONS.md the same as AGENTS.md?', 'They overlap. CONVENTIONS.md focuses on coding standards, while AGENTS.md also covers setup, test commands, and operations. Many teams keep both.'],
    ['Why load it as read-only?', 'Read-only loading keeps the agent from editing the file and lets it be cached, so your conventions stay stable and cheap to include.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
