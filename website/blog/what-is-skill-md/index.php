<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-skill-md',
  'title' => 'What Is SKILL.md?',
  'seo_title' => 'What Is SKILL.md? Claude Agent Skills | Markdown Docs',
  'description' => 'SKILL.md explained: how Claude Agent Skills use a Markdown file with YAML frontmatter, the required name and description fields, and progressive disclosure.',
  'date' => '2026-06-13',
  'reading_time' => '7 min read',
  'eyebrow' => 'SKILL.md explained',
  'h1' => 'What is SKILL.md?',
  'lead' => 'SKILL.md is the Markdown file that defines an Agent Skill: YAML frontmatter that tells the agent when to use it, plus instructions the agent follows.',
  'sections' => [
    ['heading' => 'SKILL.md meaning', 'body' => '<p>`SKILL.md` is the core file of an Agent Skill, a packaged capability that Claude and other agents can load on demand. Anthropic introduced Agent Skills in late 2025. Each skill lives in its own folder, and the SKILL.md file inside defines what the skill does and when it should be used. It is a plain Markdown file, so it is easy to write, read, and version in Git.</p><p>A skill bundles instructions and optional supporting files, such as scripts or reference documents, behind a single Markdown entry point. This makes a reusable capability portable between projects and tools.</p>'],
    ['heading' => 'The two parts of a SKILL.md file', 'body' => '<p>Every SKILL.md has two sections:</p><ol><li><strong>YAML frontmatter</strong> between `---` markers. This configures how the skill runs and, most importantly, when it activates.</li><li><strong>Markdown body</strong> with the instructions, steps, and examples the agent follows once the skill is active.</li></ol><p>In short: the frontmatter says HOW the skill is registered, and the Markdown body says WHAT the agent should do.</p>'],
    ['heading' => 'Required frontmatter: name and description', 'body' => '<p>Two frontmatter fields are required:</p><ul><li><strong>name</strong> must match the parent folder name.</li><li><strong>description</strong> tells the agent when to activate the skill, so it should clearly state the triggers and use cases.</li></ul><pre><code>---&#10;name: pdf-tools&#10;description: Extract text and tables from PDF files, fill forms, merge or split PDFs. Use when the user works with .pdf files.&#10;---&#10;&#10;# PDF Tools&#10;&#10;## Instructions&#10;1. ...&#10;&#10;## Examples&#10;...</code></pre><p>Optional fields such as `allowed-tools` and `disable-model-invocation` let you control permissions and behavior.</p>'],
    ['heading' => 'How progressive disclosure works', 'body' => '<p>SKILL.md is built around progressive disclosure. When an agent starts a session, it scans every skill directory but reads only the YAML frontmatter from each SKILL.md, building a lightweight catalog of available skills. That catalog goes into the agent\'s system prompt. The full Markdown body is loaded only when a skill is actually triggered. This keeps startup cheap while still giving the agent access to deep instructions when needed, which is why the description field matters so much.</p>'],
    ['heading' => 'Why SKILL.md is useful', 'body' => '<p>Skills turn repeated, multi-step work into a reusable package. A good SKILL.md means you do not re-explain a workflow every time, the agent activates the right capability automatically, and the instructions stay in one reviewable file. Because it is Markdown with simple frontmatter, anyone on the team can read and improve it.</p>'],
    ['heading' => 'SKILL.md vs other agent files', 'body' => '<p><a href="/blog/what-is-claude-md/">CLAUDE.md</a> gives whole-project memory, while SKILL.md packages a specific capability the agent loads only when relevant. <a href="/blog/what-is-agents-md/">AGENTS.md</a> sets cross-agent project rules. They work together: project context in CLAUDE.md or AGENTS.md, reusable capabilities in skills. Compare them all in the <a href="/blog/ai-agent-instruction-files-explained/">AI agent instruction files guide</a>.</p>'],
    ['heading' => 'How to create your own SKILL.md', 'body' => '<p>Ready to build one? Our step-by-step tutorial covers the folder structure, naming rules, frontmatter, and a full working example: <a href="/blog/how-to-create-a-skill-md-file/">how to create a SKILL.md file</a>.</p>'],
    ['heading' => 'Write SKILL.md with a live preview', 'body' => '<p>Since SKILL.md is Markdown with YAML frontmatter, you can draft it in the <a href="/editor/">Markdown Docs online editor</a> to check the structure, or <a href="/download/">download Markdown Docs</a> to edit it on Windows with autosave. See also <a href="/blog/common-md-files-for-ai-projects/">common .md files for AI projects</a>.</p>']
  ],
  'sources' => [
    ['label' => 'Anthropic: Agent Skills overview', 'url' => 'https://platform.claude.com/docs/en/agents-and-tools/agent-skills/overview', 'note' => 'official Agent Skills docs.'],
    ['label' => 'Claude Code: Extend Claude with skills', 'url' => 'https://code.claude.com/docs/en/skills', 'note' => 'for using skills in Claude Code.']
  ],
  'faqs' => [
    ['What are the required fields in SKILL.md?', 'The YAML frontmatter requires name and description. The name must match the skill\'s folder, and the description tells the agent when to activate the skill.'],
    ['How does an agent decide to use a skill?', 'At startup the agent reads only the frontmatter of each SKILL.md to build a catalog. It uses the description to decide when to load the full skill instructions.'],
    ['Is SKILL.md only for Claude?', 'Agent Skills were introduced by Anthropic for Claude, but the SKILL.md pattern of Markdown plus frontmatter is simple and is being adopted more broadly.'],
    ['What is progressive disclosure in skills?', 'It means only the lightweight frontmatter is loaded at startup, and the full Markdown instructions load only when the skill is actually triggered.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
