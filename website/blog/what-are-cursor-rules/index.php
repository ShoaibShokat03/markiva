<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-are-cursor-rules',
  'title' => 'What Are Cursor Rules?',
  'seo_title' => 'What Are Cursor Rules? .mdc Guide | Markdown Docs',
  'description' => 'Cursor rules explained: the .cursorrules legacy file, the modern .cursor/rules .mdc system, frontmatter, glob scoping, and how the AI uses them.',
  'date' => '2026-06-13',
  'reading_time' => '7 min read',
  'eyebrow' => 'Cursor rules explained',
  'h1' => 'What are Cursor rules?',
  'lead' => 'Cursor rules are Markdown instruction files that tell the Cursor AI editor how to write code for your project, using the modern .cursor/rules .mdc system.',
  'sections' => [
    ['heading' => 'Cursor rules meaning', 'body' => '<p>Cursor rules are reusable instructions that guide the AI inside the Cursor code editor. They encode your project conventions, preferred libraries, and patterns so the assistant generates consistent, project-appropriate code instead of guessing. They are the Cursor equivalent of <a href="/blog/what-is-claude-md/">CLAUDE.md</a> and <a href="/blog/what-is-gemini-md/">GEMINI.md</a>.</p>'],
    ['heading' => '.cursorrules vs .cursor/rules', 'body' => '<p>There are two formats. The original `.cursorrules` file in the project root is now deprecated. The modern system uses individual `.mdc` files (Markdown Cursor) inside a `.cursor/rules/` directory. The shift matters because Cursor Agent mode loads context differently, and the old single file is not part of that path. Cursor recommends migrating to `.mdc` files in `.cursor/rules/`.</p>'],
    ['heading' => 'How .mdc files are structured', 'body' => '<p>Each `.mdc` file is Markdown with YAML frontmatter that controls when it activates. Three key frontmatter fields are:</p><ul><li><strong>description:</strong> a summary used for intelligent matching</li><li><strong>alwaysApply:</strong> a boolean for universal activation</li><li><strong>globs:</strong> file patterns for scoped activation</li></ul><pre><code>---&#10;description: API route conventions&#10;globs: ["app/api/**"]&#10;alwaysApply: false&#10;---&#10;&#10;- Validate input with zod&#10;- Return typed JSON responses</code></pre>'],
    ['heading' => 'Why split rules into multiple files', 'body' => '<p>Instead of one giant file, you use small `.mdc` files each scoped to a situation. This saves tokens and makes rules more reliable, because only the relevant rules load for a given file. Best practice is to keep each file under 500 lines and keep all always-apply rules under roughly 2,000 tokens combined so the context stays focused.</p>'],
    ['heading' => 'Commit your rules to the repo', 'body' => '<p>The `.cursor/rules/` directory should be committed to version control. That is how an entire team gets the same AI behavior, the same way <a href="/blog/what-is-agents-md/">AGENTS.md</a> and copilot instructions are shared. Rules in Git travel with the project and stay reviewable.</p>'],
    ['heading' => 'Cursor rules vs other agent files', 'body' => '<p>Cursor rules play the same role as <a href="/blog/what-is-gemini-md/">GEMINI.md</a>, <a href="/blog/what-is-copilot-instructions-md/">copilot-instructions.md</a>, and <a href="/blog/what-are-windsurf-rules/">Windsurf rules</a>: tool-specific guidance for an AI coding agent. Cursor also reads <a href="/blog/what-is-agents-md/">AGENTS.md</a> in many setups. Compare them all in the <a href="/blog/ai-agent-instruction-files-explained/">AI agent instruction files guide</a>.</p>'],
    ['heading' => 'Write Cursor rules with a preview', 'body' => '<p>Because `.mdc` files are Markdown, you can draft them in the <a href="/editor/">Markdown Docs online editor</a> to check headings and frontmatter, then save them into `.cursor/rules/`. Use the <a href="/download/">desktop app</a> for local editing on Windows.</p>']
  ],
  'sources' => [
    ['label' => 'Cursor rules best practices (.mdc guide)', 'url' => 'https://www.morphllm.com/cursor-rules-best-practices', 'note' => 'on the modern .mdc system.'],
    ['label' => '.cursorrules vs .cursor/rules format guide', 'url' => 'https://thepromptshelf.dev/blog/cursorrules-vs-mdc-format-guide-2026/', 'note' => 'on migrating formats.']
  ],
  'faqs' => [
    ['Is .cursorrules deprecated?', 'Yes. The legacy single .cursorrules file is deprecated. Cursor recommends moving to individual .mdc files in the .cursor/rules/ directory.'],
    ['What is an .mdc file?', 'An .mdc (Markdown Cursor) file is a Cursor rule written in Markdown with YAML frontmatter for description, alwaysApply, and glob scoping.'],
    ['How do globs work in Cursor rules?', 'The globs frontmatter field lists file patterns. The rule activates only when you work on files that match those patterns, which keeps context focused.'],
    ['Should I commit .cursor/rules to Git?', 'Yes. Committing the directory gives your whole team the same AI behavior across the project.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
