<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-copilot-instructions-md',
  'title' => 'What Is copilot-instructions.md?',
  'seo_title' => 'What Is copilot-instructions.md? | Markdown Docs',
  'description' => 'copilot-instructions.md explained: how GitHub Copilot uses repository custom instructions, where the file lives, path-specific .instructions.md, and benefits.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'GitHub Copilot instructions',
  'h1' => 'What is copilot-instructions.md?',
  'lead' => 'copilot-instructions.md is a Markdown file that gives GitHub Copilot repository-wide custom instructions so it follows your coding standards automatically.',
  'sections' => [
    ['heading' => 'copilot-instructions.md meaning', 'body' => '<p>`copilot-instructions.md` is GitHub Copilot\'s repository custom instructions file. You place it at `.github/copilot-instructions.md` in your repo, and Copilot Chat, the coding agent, and code review start applying it automatically. It works like a custom ruleset or style guide written in plain Markdown that Copilot reads and follows across the whole repository.</p>'],
    ['heading' => 'Where the file lives', 'body' => '<p>The main file goes in the `.github` folder at your repository root:</p><pre><code>.github/&#10;  copilot-instructions.md          # repo-wide&#10;  instructions/&#10;    frontend.instructions.md       # path-specific&#10;    api.instructions.md</code></pre><p>The repo-wide file applies to every request. Path-specific `.instructions.md` files under `.github/instructions` use YAML frontmatter to declare which files or folders they apply to, so you can give different rules to different parts of the codebase.</p>'],
    ['heading' => 'What to include', 'body' => '<ul><li>Language, framework, and version preferences</li><li>Code style and formatting rules</li><li>Testing expectations</li><li>Project structure and important paths</li><li>Patterns to follow and anti-patterns to avoid</li></ul><p>Instructions are natural-language Markdown. Whitespace is ignored, so you can write one instruction per line or group them under headings for readability.</p>'],
    ['heading' => 'A short example', 'body' => '<pre><code># Copilot instructions&#10;&#10;- This is a React + TypeScript app.&#10;- Use functional components and hooks.&#10;- Write tests with Vitest for new logic.&#10;- Prefer named exports.&#10;- Do not edit files in `generated/`.</code></pre>'],
    ['heading' => 'Why custom instructions help', 'body' => '<p>Without instructions, Copilot guesses your conventions from the surrounding code, which is inconsistent. A clear copilot-instructions.md makes suggestions match your standards, improves Copilot code review feedback, and reduces the edits you make after accepting a suggestion. It is committed to the repo, so the whole team gets the same behavior.</p>'],
    ['heading' => 'copilot-instructions.md vs other agent files', 'body' => '<p>This file is the GitHub Copilot equivalent of <a href="/blog/what-is-claude-md/">CLAUDE.md</a>, <a href="/blog/what-is-gemini-md/">GEMINI.md</a>, and <a href="/blog/what-are-cursor-rules/">Cursor rules</a>. Many teams also keep a cross-tool <a href="/blog/what-is-agents-md/">AGENTS.md</a>. See how they compare in the <a href="/blog/ai-agent-instruction-files-explained/">guide to AI agent instruction files</a>.</p>'],
    ['heading' => 'Edit it with a live preview', 'body' => '<p>Write your instructions in the <a href="/editor/">Markdown Docs online editor</a> and preview the formatting, or <a href="/download/">download Markdown Docs</a> to edit `.md` files on Windows.</p>']
  ],
  'sources' => [
    ['label' => 'GitHub Docs: repository custom instructions', 'url' => 'https://docs.github.com/copilot/customizing-copilot/adding-custom-instructions-for-github-copilot', 'note' => 'official Copilot guidance.'],
    ['label' => 'GitHub Changelog: .instructions.md support', 'url' => 'https://github.blog/changelog/2025-07-23-github-copilot-coding-agent-now-supports-instructions-md-custom-instructions/', 'note' => 'path-specific instructions.']
  ],
  'faqs' => [
    ['Where does copilot-instructions.md go?', 'Place it at .github/copilot-instructions.md in your repository root. Copilot starts using it as soon as the file is saved.'],
    ['What are .instructions.md files?', 'They are path-specific instruction files under .github/instructions. Each uses YAML frontmatter to target certain files or folders with their own rules.'],
    ['Does Copilot apply the file automatically?', 'Yes. Once committed, repository custom instructions are applied to Copilot Chat, the coding agent, and code review without extra setup.'],
    ['Is it different from AGENTS.md?', 'Yes. copilot-instructions.md is specific to GitHub Copilot. AGENTS.md is a cross-agent open format read by many tools.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
