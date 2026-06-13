<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-claude-md',
  'title' => 'What Is CLAUDE.md?',
  'seo_title' => 'What Is CLAUDE.md? Claude Code Memory | Markdown Docs',
  'description' => 'CLAUDE.md explained: how Claude Code uses Markdown memory files, what to write inside them, and how they support AI coding workflows.',
  'date' => '2026-06-13',
  'reading_time' => '7 min read',
  'eyebrow' => 'CLAUDE.md explained',
  'h1' => 'What is CLAUDE.md?',
  'lead' => 'CLAUDE.md is a Markdown file that gives Claude Code persistent project instructions, workflow preferences, and context.',
  'sections' => [
    ['heading' => 'CLAUDE.md meaning', 'body' => '<p>`CLAUDE.md` is used by Claude Code as a memory and instruction file. Anthropic describes these as Markdown files that give Claude persistent instructions for a project, a personal workflow, or an organization. When you start a Claude Code session, the file is loaded automatically, so the assistant begins each session already knowing your context, conventions, and rules.</p><p>There are different levels of CLAUDE.md. A project file lives at the repository root and is shared with the team through Git. A personal file applies to your own workflow across projects. This layered memory means you do not have to re-explain the same setup, style, and safety rules every time.</p>'],
    ['heading' => 'What to put in CLAUDE.md', 'body' => '<p>Keep it focused on what helps Claude act correctly:</p><ul><li>Project overview and goals</li><li>Commands for setup, tests, lint, and build</li><li>Preferred coding style and naming conventions</li><li>Architecture notes and important file paths</li><li>Review rules, commit conventions, and safety constraints</li><li>Things to never do (touch generated files, push to main, expose secrets)</li><li>Links to <a href="/blog/what-is-design-md/">DESIGN.md</a>, API docs, or other project notes</li></ul>'],
    ['heading' => 'A short CLAUDE.md example', 'body' => '<pre><code># CLAUDE.md&#10;&#10;## Project&#10;Next.js app for invoicing. Source in `src/`.&#10;&#10;## Commands&#10;- Install: `pnpm install`&#10;- Test: `pnpm test`&#10;- Build: `pnpm build`&#10;&#10;## Style&#10;- TypeScript, functional components&#10;- Keep PRs small and focused&#10;&#10;## Rules&#10;- Never edit files in `generated/`&#10;- Run tests before claiming a task is done</code></pre>'],
    ['heading' => 'CLAUDE.md vs AGENTS.md', 'body' => '<p><a href="/blog/what-is-agents-md/">AGENTS.md</a> is a broader convention for coding agents. CLAUDE.md is Claude-specific. If you use multiple AI coding tools, keep shared instructions in AGENTS.md and Claude-only preferences in CLAUDE.md. Compare it with <a href="/blog/what-is-gemini-md/">GEMINI.md</a> and <a href="/blog/what-is-copilot-instructions-md/">Copilot instructions</a> in the <a href="/blog/ai-agent-instruction-files-explained/">AI agent instruction files guide</a>.</p>'],
    ['heading' => 'How CLAUDE.md helps AI coding', 'body' => '<p>A good CLAUDE.md reduces repeated explanations. It tells the assistant how to run the project, what files matter, how to verify changes, and what style to follow. That can make AI-assisted work faster and more consistent.</p>'],
    ['heading' => 'Preview CLAUDE.md before using it', 'body' => '<p>Use <a href="/editor/">Markdown Docs online editor</a> to preview headings, command blocks, and lists. For local projects, <a href="/download/">install Markdown Docs</a> and open CLAUDE.md directly from Windows.</p>']
  ],
  'sources' => [
    ['label' => 'Anthropic Claude Code memory docs', 'url' => 'https://docs.anthropic.com/en/docs/claude-code/memory', 'note' => 'for CLAUDE.md behavior.'],
    ['label' => 'Claude Code overview', 'url' => 'https://docs.anthropic.com/en/docs/claude-code/overview', 'note' => 'for Claude Code context.']
  ],
  'faqs' => [
    ['Is CLAUDE.md only for Claude Code?', 'Yes, CLAUDE.md is most closely associated with Claude Code. Other tools may not read it unless they explicitly support that convention.'],
    ['Can I have both CLAUDE.md and AGENTS.md?', 'Yes. Many teams can use AGENTS.md for shared agent rules and CLAUDE.md for Claude-specific context or preferences.'],
    ['Should CLAUDE.md be short?', 'Usually yes. Keep it focused and link to deeper Markdown files for long architecture, design, or process notes.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
