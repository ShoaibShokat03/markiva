<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-are-windsurf-rules',
  'title' => 'What Are Windsurf Rules?',
  'seo_title' => 'What Are Windsurf Rules? Cascade AI | Markdown Docs',
  'description' => 'Windsurf rules explained: how .windsurfrules and global_rules.md guide the Cascade AI agent, global vs workspace rules, and why they keep code consistent.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'Windsurf rules explained',
  'h1' => 'What are Windsurf rules?',
  'lead' => 'Windsurf rules are Markdown instructions that guide Cascade, the Windsurf AI agent, so it writes code that matches your project conventions.',
  'sections' => [
    ['heading' => 'Windsurf rules meaning', 'body' => '<p>Windsurf rules are custom instructions that tell the Windsurf AI editor how to behave when it generates code. They guide Cascade, Windsurf\'s autonomous AI agent, helping it understand your project conventions and produce consistent output. Like <a href="/blog/what-is-claude-md/">CLAUDE.md</a> and <a href="/blog/what-are-cursor-rules/">Cursor rules</a>, they encode your team\'s standards so the AI does not have to guess.</p>'],
    ['heading' => 'Global rules vs workspace rules', 'body' => '<p>Windsurf offers two types of rules files:</p><ul><li><strong>global_rules.md</strong> defines how Cascade behaves across all of your projects.</li><li><strong>.windsurfrules</strong> provides project-specific instructions for a single workspace.</li></ul><p>When both exist, Windsurf merges them, and project rules take precedence where they conflict with global rules. That lets you set personal defaults once and override them per project.</p>'],
    ['heading' => 'What to include', 'body' => '<ul><li>Stack, frameworks, and versions</li><li>Code style and naming conventions</li><li>Testing and build expectations</li><li>Architecture patterns to follow</li><li>Output constraints, such as response length or what not to touch</li></ul>'],
    ['heading' => 'A short .windsurfrules example', 'body' => '<pre><code># Windsurf rules&#10;&#10;- Next.js 15 app router project.&#10;- Use server components by default.&#10;- Keep functions small and pure.&#10;- Write tests before claiming a task is done.&#10;- Never commit secrets or .env files.</code></pre>'],
    ['heading' => 'Why Windsurf rules matter', 'body' => '<p>Rules restrict and direct AI output so it stays consistent with your project. Cascade can take broad, autonomous actions, so clear rules reduce surprises, keep generated code in line with your architecture, and cut the time spent correcting suggestions. Committed workspace rules give the whole team the same behavior.</p>'],
    ['heading' => 'Windsurf rules vs other agent files', 'body' => '<p>Windsurf rules are the Windsurf version of <a href="/blog/what-are-cursor-rules/">Cursor rules</a>, <a href="/blog/what-is-gemini-md/">GEMINI.md</a>, and <a href="/blog/what-is-copilot-instructions-md/">copilot-instructions.md</a>. Teams using several tools often keep shared rules in a cross-agent <a href="/blog/what-is-agents-md/">AGENTS.md</a>. See the full <a href="/blog/ai-agent-instruction-files-explained/">AI agent instruction files guide</a>.</p>'],
    ['heading' => 'Draft rules with a live preview', 'body' => '<p>Write global_rules.md or .windsurfrules in the <a href="/editor/">Markdown Docs online editor</a> to preview the structure, or <a href="/download/">download Markdown Docs</a> to edit them on Windows with autosave.</p>']
  ],
  'sources' => [
    ['label' => 'awesome-windsurfrules collection', 'url' => 'https://github.com/andra2112s/awesome-windsurfrules', 'note' => 'examples of global_rules.md and .windsurfrules.'],
    ['label' => '.windsurfrules complete guide (2026)', 'url' => 'https://thepromptshelf.dev/blog/windsurfrules-complete-guide-2026/', 'note' => 'on configuring Windsurf AI.']
  ],
  'faqs' => [
    ['What is the difference between global_rules.md and .windsurfrules?', 'global_rules.md applies across all your projects, while .windsurfrules is specific to one workspace. Windsurf merges them, with project rules winning conflicts.'],
    ['Which AI does Windsurf rules control?', 'They guide Cascade, Windsurf\'s autonomous AI coding agent, shaping how it writes and edits code.'],
    ['Should .windsurfrules be committed?', 'Yes. Committing workspace rules gives everyone on the team the same AI behavior for that project.'],
    ['Are Windsurf rules like Cursor rules?', 'Yes. Both are Markdown instruction files for an AI code editor. The format and file names differ, but the purpose is the same.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
