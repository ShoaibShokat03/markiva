<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-gemini-md',
  'title' => 'What Is GEMINI.md?',
  'seo_title' => 'What Is GEMINI.md? Gemini CLI Context | Markdown Docs',
  'description' => 'GEMINI.md explained: how Google Gemini CLI uses Markdown context files, what to put inside, hierarchical loading, and why it improves AI responses.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'GEMINI.md explained',
  'h1' => 'What is GEMINI.md?',
  'lead' => 'GEMINI.md is a Markdown context file that Google Gemini CLI loads automatically to give the model project instructions, style rules, and persona.',
  'sections' => [
    ['heading' => 'GEMINI.md meaning', 'body' => '<p>`GEMINI.md` is the context file used by Gemini CLI, Google\'s open-source terminal AI agent. It is a plain Markdown file that the CLI loads automatically before every interaction, so the model starts each request already knowing your project rules, coding style, and preferences. Instead of repeating the same instructions in every prompt, you define them once in GEMINI.md.</p><p>The idea mirrors other agent memory files: <a href="/blog/what-is-claude-md/">CLAUDE.md</a> for Claude Code and <a href="/blog/what-is-agents-md/">AGENTS.md</a> for cross-agent instructions. GEMINI.md is the Gemini-specific version.</p>'],
    ['heading' => 'What to put in GEMINI.md', 'body' => '<ul><li>Project overview and the stack in use</li><li>Build, test, and run commands</li><li>Coding style and naming conventions</li><li>A persona or tone for the assistant</li><li>Important files, folders, and entry points</li><li>Constraints and things the agent should not change</li></ul>'],
    ['heading' => 'How hierarchical loading works', 'body' => '<p>Gemini CLI sources context from several levels and concatenates them before sending to the model:</p><ol><li><strong>Global:</strong> `~/.gemini/GEMINI.md` provides default instructions for all your projects.</li><li><strong>Project:</strong> a GEMINI.md in your workspace and its parent directories adds project-specific context.</li><li><strong>Local:</strong> the CLI scans subdirectories so a GEMINI.md inside a component folder can add highly specific rules that only apply there.</li></ol><p>More specific files build on the broader ones, which keeps shared rules in one place while still allowing local overrides.</p>'],
    ['heading' => 'A short GEMINI.md example', 'body' => '<pre><code># GEMINI.md&#10;&#10;## Project&#10;Python FastAPI service. Source in `app/`.&#10;&#10;## Commands&#10;- Install: `uv sync`&#10;- Test: `pytest`&#10;- Run: `uvicorn app.main:app --reload`&#10;&#10;## Style&#10;- Type hints required&#10;- Prefer httpx over requests&#10;&#10;## Persona&#10;Be concise. Explain trade-offs briefly.</code></pre>'],
    ['heading' => 'Why GEMINI.md improves AI responses', 'body' => '<p>Giving the model the right context up front means fewer wrong guesses about commands, libraries, and conventions. The assistant produces code that fits your project on the first try more often, which reduces back-and-forth and review time. It is one of the cheapest ways to make a terminal AI agent reliable.</p>'],
    ['heading' => 'GEMINI.md vs CLAUDE.md vs AGENTS.md', 'body' => '<p>All three are Markdown instruction files loaded automatically by their tools. <a href="/blog/what-is-claude-md/">CLAUDE.md</a> is for Claude Code, GEMINI.md is for Gemini CLI, and <a href="/blog/what-is-agents-md/">AGENTS.md</a> is a cross-agent open format. If you use several tools, keep shared rules in AGENTS.md and tool-specific tweaks in CLAUDE.md or GEMINI.md. See the full <a href="/blog/ai-agent-instruction-files-explained/">guide to AI agent instruction files</a>.</p>'],
    ['heading' => 'Write GEMINI.md with a live preview', 'body' => '<p>Draft GEMINI.md in the <a href="/editor/">Markdown Docs online editor</a> to preview headings and command blocks, or <a href="/download/">download Markdown Docs</a> to edit it locally on Windows with autosave.</p>']
  ],
  'sources' => [
    ['label' => 'Gemini CLI: GEMINI.md context files', 'url' => 'https://google-gemini.github.io/gemini-cli/docs/cli/gemini-md.html', 'note' => 'official Gemini CLI docs.'],
    ['label' => 'google-gemini/gemini-cli on GitHub', 'url' => 'https://github.com/google-gemini/gemini-cli', 'note' => 'the open-source agent.']
  ],
  'faqs' => [
    ['Where do I put GEMINI.md?', 'Put a global file at ~/.gemini/GEMINI.md for all projects, and a project GEMINI.md at your repository root. You can add more in subfolders for local rules.'],
    ['Is GEMINI.md the same as CLAUDE.md?', 'They serve the same purpose but for different tools. GEMINI.md is read by Gemini CLI; CLAUDE.md is read by Claude Code.'],
    ['Does Gemini CLI load GEMINI.md automatically?', 'Yes. Gemini CLI concatenates the GEMINI.md files it finds and sends them to the model with every prompt.'],
    ['Can I have multiple GEMINI.md files?', 'Yes. Global, project, and subdirectory files are merged, with more specific files adding to the broader ones.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
