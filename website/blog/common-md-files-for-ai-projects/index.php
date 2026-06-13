<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'common-md-files-for-ai-projects',
  'title' => 'Common .md Files for AI and Software Projects',
  'seo_title' => 'Common .md Files for AI Projects | Markdown Docs',
  'description' => 'A guide to README.md, AGENTS.md, CLAUDE.md, DESIGN.md, CHANGELOG.md, TODO.md, PROMPTS.md, API.md, and other useful Markdown project files.',
  'date' => '2026-06-13',
  'reading_time' => '9 min read',
  'eyebrow' => 'Markdown file types',
  'h1' => 'Common .md files for AI and software projects',
  'lead' => 'Modern projects use Markdown files for humans, AI coding agents, documentation systems, changelogs, prompts, and design decisions.',
  'sections' => [
    ['heading' => 'The most useful .md files', 'body' => '<table><tbody><tr><th>File</th><th>Purpose</th></tr><tr><td><a href="/blog/what-is-readme-md/">README.md</a></td><td>Project overview, setup, usage, and first context layer.</td></tr><tr><td><a href="/blog/what-is-agents-md/">AGENTS.md</a></td><td>Instructions for AI coding agents.</td></tr><tr><td><a href="/blog/what-is-claude-md/">CLAUDE.md</a></td><td>Claude Code project memory and workflow rules.</td></tr><tr><td><a href="/blog/what-is-design-md/">DESIGN.md</a></td><td>Design intent, architecture decisions, and trade-offs.</td></tr><tr><td><a href="/blog/what-is-skill-md/">SKILL.md</a></td><td>Defines an Agent Skill with YAML frontmatter and instructions.</td></tr><tr><td><a href="/blog/what-is-conventions-md/">CONVENTIONS.md</a></td><td>Tool-neutral coding standards for AI coding agents.</td></tr><tr><td><a href="/blog/what-is-changelog-md/">CHANGELOG.md</a></td><td>Release notes and version history.</td></tr><tr><td><a href="/blog/what-is-todo-md/">TODO.md</a></td><td>Task list, backlog, or implementation checklist.</td></tr><tr><td><a href="/blog/what-is-prompts-md/">PROMPTS.md</a></td><td>Reusable AI prompts and prompt patterns.</td></tr><tr><td><a href="/blog/what-is-api-md/">API.md</a></td><td>API endpoints, examples, payloads, and auth notes.</td></tr><tr><td><a href="/blog/what-is-contributing-md/">CONTRIBUTING.md</a></td><td>Contribution rules, branch workflow, and review expectations.</td></tr><tr><td><a href="/blog/what-is-security-md/">SECURITY.md</a></td><td>Security policy and how to report a vulnerability.</td></tr></tbody></table>'],
    ['heading' => 'How these files work together', 'body' => '<p>Each file owns a different layer of context. Use <a href="/blog/what-is-readme-md/">README.md</a> as the front door for humans. Use <a href="/blog/what-is-agents-md/">AGENTS.md</a> and <a href="/blog/what-is-claude-md/">CLAUDE.md</a> to guide AI coding agents. Use <a href="/blog/what-is-design-md/">DESIGN.md</a> to explain intent before code changes. Use CHANGELOG.md and TODO.md to keep project state visible. Use PROMPTS.md when your team repeatedly asks AI tools to perform similar work.</p><p>Think of them as a stack: README for "what", DESIGN for "why", AGENTS and CLAUDE for "how the agent should work", and CHANGELOG for "what changed". Together they give both people and models a complete, plain-text map of the project.</p>'],
    ['heading' => 'README, AGENTS, CLAUDE, and DESIGN at a glance', 'body' => '<table><tbody><tr><th>File</th><th>Audience</th><th>Answers</th></tr><tr><td>README.md</td><td>Humans</td><td>What is this and how do I use it?</td></tr><tr><td>AGENTS.md</td><td>Any coding agent</td><td>How do I build, test, and behave here?</td></tr><tr><td>CLAUDE.md</td><td>Claude Code</td><td>What context and rules apply to this project?</td></tr><tr><td>DESIGN.md</td><td>Team and agents</td><td>Why was it built this way?</td></tr></tbody></table><p>Each tool also has its own instruction file, from <a href="/blog/what-is-gemini-md/">GEMINI.md</a> and <a href="/blog/what-are-cursor-rules/">Cursor rules</a> to <a href="/blog/what-is-copilot-instructions-md/">Copilot instructions</a>. The <a href="/blog/ai-agent-instruction-files-explained/">AI agent instruction files guide</a> compares all of them.</p>'],
    ['heading' => 'Why file names matter for AI', 'body' => '<p>Predictable names help humans and agents find the right context quickly. A coding agent can infer that README.md is a project overview, AGENTS.md is an instruction file, and DESIGN.md contains decisions. Clear names reduce ambiguity and improve retrieval. The same idea now extends to whole sites through <a href="/blog/what-is-llms-txt/">llms.txt</a>, a root-level Markdown file that tells AI models what a site is about.</p>'],
    ['heading' => 'Recommended folder pattern', 'body' => '<pre><code>project/&#10;  README.md&#10;  AGENTS.md&#10;  CLAUDE.md&#10;  DESIGN.md&#10;  CHANGELOG.md&#10;  TODO.md&#10;  docs/&#10;    API.md&#10;    PROMPTS.md&#10;    ARCHITECTURE.md</code></pre>'],
    ['heading' => 'Edit and preview your .md files', 'body' => '<p>Use <a href="/editor/">Markdown Docs online editor</a> for quick previews or <a href="/download/">download Markdown Docs</a> to open and edit local `.md` files on Windows.</p>']
  ],
  'sources' => [
    ['label' => 'GitHub README docs', 'url' => 'https://docs.github.com/en/repositories/managing-your-repositorys-settings-and-features/customizing-your-repository/about-readmes', 'note' => 'for README.md behavior.'],
    ['label' => 'OpenAI Codex AGENTS.md guide', 'url' => 'https://developers.openai.com/codex/guides/agents-md', 'note' => 'for AGENTS.md.'],
    ['label' => 'Anthropic Claude Code memory docs', 'url' => 'https://docs.anthropic.com/en/docs/claude-code/memory', 'note' => 'for CLAUDE.md.']
  ],
  'faqs' => [
    ['Do all projects need every .md file?', 'No. Start with README.md. Add AGENTS.md, CLAUDE.md, DESIGN.md, or PROMPTS.md only when the project needs that type of context.'],
    ['Are Markdown file names case-sensitive?', 'On some systems, file names can be case-sensitive. Use conventional uppercase names like README.md, AGENTS.md, and CLAUDE.md for clarity.'],
    ['Can Markdown Docs edit all these files?', 'Yes. Markdown Docs can open, edit, preview, and save Markdown files such as README.md, AGENTS.md, CLAUDE.md, DESIGN.md, TODO.md, and CHANGELOG.md.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
