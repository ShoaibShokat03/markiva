<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-agents-md',
  'title' => 'What Is AGENTS.md?',
  'seo_title' => 'What Is AGENTS.md? Agent Instructions | Markdown Docs',
  'description' => 'AGENTS.md explained: how coding agents use it, what to include, and how it differs from README.md, CLAUDE.md, and other AI instruction files.',
  'date' => '2026-06-13',
  'reading_time' => '7 min read',
  'eyebrow' => 'AGENTS.md explained',
  'h1' => 'What is AGENTS.md?',
  'lead' => 'AGENTS.md is a Markdown instruction file for AI coding agents. Think of it as a README written for agents instead of users.',
  'sections' => [
    ['heading' => 'AGENTS.md meaning', 'body' => '<p>`AGENTS.md` is a Markdown file that gives AI coding agents predictable, machine-readable project instructions. It can describe setup commands, test commands, code style, file ownership, deployment notes, and safety rules. OpenAI originated the format in August 2025 for the Codex CLI, and within months most major agent tools adopted it, including Cursor, Claude Code, GitHub Copilot, Devin, Windsurf, and Gemini CLI. The agents load it automatically at the start of a session.</p><p>The idea is simple: a README is written for people, so it often hides the build and test details an agent needs. AGENTS.md is the dedicated, predictable place for that operational context, which keeps the README clean while still giving agents what they need.</p>'],
    ['heading' => 'What to include in AGENTS.md', 'body' => '<p>Keep it operational and specific. A useful AGENTS.md usually covers:</p><ul><li>Setup and install commands</li><li>Test, lint, and build commands the agent should run</li><li>Code style and formatting rules</li><li>Important file locations and entry points</li><li>What not to change (generated files, vendored code, secrets)</li><li>Review, commit, and deployment expectations</li><li>Hard boundaries and safety constraints</li></ul>'],
    ['heading' => 'A short AGENTS.md example', 'body' => '<pre><code># AGENTS.md&#10;&#10;## Setup&#10;```bash&#10;npm install&#10;```&#10;&#10;## Tests&#10;Run `npm test` before committing. All tests must pass.&#10;&#10;## Style&#10;- Use TypeScript, 2-space indent&#10;- Prefer named exports&#10;&#10;## Do not touch&#10;- `dist/` and `*.generated.ts` are build output</code></pre><p>Notice that every instruction is concrete and runnable. Agents follow clear commands far better than vague guidance.</p>'],
    ['heading' => 'Why AGENTS.md improves AI output', 'body' => '<p>Teams that add an AGENTS.md report noticeably fewer hallucinations and corrections within the first session, because the agent stops guessing at commands and conventions. Giving the model the right build steps, test rules, and boundaries reduces wasted iterations and makes generated changes safer to merge. It is one of the cheapest ways to improve the quality of AI-assisted development.</p>'],
    ['heading' => 'AGENTS.md vs README.md', 'body' => '<p><a href="/blog/what-is-readme-md/">README.md</a> explains the project to humans. AGENTS.md tells AI coding agents how to work inside the project. README.md can be broad and product-focused; AGENTS.md should be direct, operational, and specific.</p>'],
    ['heading' => 'AGENTS.md vs CLAUDE.md', 'body' => '<p>AGENTS.md is a cross-agent instruction file. <a href="/blog/what-is-claude-md/">CLAUDE.md</a> is specifically used by Claude Code for persistent project memory. Some teams keep both: AGENTS.md for shared agent instructions and CLAUDE.md for Claude-specific preferences. See how it compares to <a href="/blog/what-is-gemini-md/">GEMINI.md</a>, <a href="/blog/what-are-cursor-rules/">Cursor rules</a>, and others in the <a href="/blog/ai-agent-instruction-files-explained/">AI agent instruction files guide</a>.</p>'],
    ['heading' => 'How to write AGENTS.md with Markdown Docs', 'body' => '<p>Draft the file in <a href="/editor/">Markdown Docs online editor</a>, preview the headings and command blocks, then save it as `AGENTS.md` in your project root. Use the desktop editor when you want local file association and autosave.</p>']
  ],
  'sources' => [
    ['label' => 'OpenAI Codex AGENTS.md guide', 'url' => 'https://developers.openai.com/codex/guides/agents-md', 'note' => 'for official Codex behavior.'],
    ['label' => 'AGENTS.md open format', 'url' => 'https://agents.md/', 'note' => 'for the broader agent-instructions format.']
  ],
  'faqs' => [
    ['Is the file AGENT.md or AGENTS.md?', 'The common open format and Codex convention is AGENTS.md, plural. Some teams may create AGENT.md, but AGENTS.md is the safer default.'],
    ['Does AGENTS.md replace README.md?', 'No. README.md explains the project to users. AGENTS.md gives operational instructions to AI coding agents.'],
    ['Where should AGENTS.md go?', 'Place it at the repository root for project-wide instructions. Add nested AGENTS.md files only when a subfolder needs different rules.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
