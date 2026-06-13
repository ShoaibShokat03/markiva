<?php
$blogPosts = [
  [
    'slug' => 'markdown-cheat-sheet',
    'title' => 'Markdown Cheat Sheet',
    'description' => 'A complete Markdown cheat sheet with copy-ready syntax for headings, bold, lists, links, images, tables, code blocks, and task lists.',
    'date' => '2026-06-13',
    'reading_time' => '7 min read',
    'primary_keyword' => 'markdown cheat sheet',
    'excerpt' => 'A quick Markdown syntax reference: headings, emphasis, lists, links, images, code blocks, tables, task lists, and GitHub Flavored Markdown extensions.'
  ],
  [
    'slug' => 'what-is-llms-txt',
    'title' => 'What Is llms.txt?',
    'description' => 'llms.txt explained: what the file is, why it matters for AI search, how to format it in Markdown, and how it differs from robots.txt and sitemap.xml.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'what is llms.txt',
    'excerpt' => 'llms.txt is a Markdown file at a site root that tells AI models what the site is about and which pages to reference. A robots.txt for large language models.'
  ],
  [
    'slug' => 'ai-agent-instruction-files-explained',
    'title' => 'AI Agent Instruction Files Explained',
    'description' => 'A complete guide to AI agent instruction files: README, AGENTS, CLAUDE, GEMINI, Cursor, Copilot, Windsurf, CONVENTIONS, and llms.txt.',
    'date' => '2026-06-13',
    'reading_time' => '10 min read',
    'primary_keyword' => 'ai agent instruction files',
    'excerpt' => 'AI coding agents read Markdown files to learn how your project works. The complete guide to every .md and rules file, what it does, and when to use it.'
  ],
  [
    'slug' => 'what-is-gemini-md',
    'title' => 'What Is GEMINI.md?',
    'description' => 'GEMINI.md explained: how Google Gemini CLI uses Markdown context files, what to put inside, hierarchical loading, and why it improves AI responses.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'what is GEMINI.md',
    'excerpt' => 'GEMINI.md is a Markdown context file that Google Gemini CLI loads automatically to give the model project instructions, coding style, and persona.'
  ],
  [
    'slug' => 'what-is-copilot-instructions-md',
    'title' => 'What Is copilot-instructions.md?',
    'description' => 'copilot-instructions.md explained: how GitHub Copilot uses repository custom instructions, path-specific .instructions.md files, and the benefits.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'copilot-instructions.md',
    'excerpt' => 'copilot-instructions.md gives GitHub Copilot repository-wide custom instructions so it follows your coding standards automatically across the repo.'
  ],
  [
    'slug' => 'what-are-cursor-rules',
    'title' => 'What Are Cursor Rules?',
    'description' => 'Cursor rules explained: the .cursorrules legacy file, the modern .cursor/rules .mdc system, frontmatter, glob scoping, and how the AI uses them.',
    'date' => '2026-06-13',
    'reading_time' => '7 min read',
    'primary_keyword' => 'cursor rules',
    'excerpt' => 'Cursor rules are Markdown instruction files that tell the Cursor AI editor how to write code, using the modern .cursor/rules .mdc system with glob scoping.'
  ],
  [
    'slug' => 'what-are-windsurf-rules',
    'title' => 'What Are Windsurf Rules?',
    'description' => 'Windsurf rules explained: how .windsurfrules and global_rules.md guide the Cascade AI agent, global vs workspace rules, and why they keep code consistent.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'windsurf rules',
    'excerpt' => 'Windsurf rules are Markdown instructions that guide Cascade, the Windsurf AI agent, so it writes code that matches your project conventions.'
  ],
  [
    'slug' => 'what-is-conventions-md',
    'title' => 'What Is CONVENTIONS.md?',
    'description' => 'CONVENTIONS.md explained: the Markdown coding-conventions file popularized by Aider and used by AI agents like Cursor, Cline, and Claude Code.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'what is CONVENTIONS.md',
    'excerpt' => 'CONVENTIONS.md is a free-form Markdown file that documents the coding rules an AI coding agent should follow inside a repository, across multiple tools.'
  ],
  [
    'slug' => 'what-is-skill-md',
    'title' => 'What Is SKILL.md?',
    'description' => 'SKILL.md explained: how Claude Agent Skills use a Markdown file with YAML frontmatter, the required name and description fields, and progressive disclosure.',
    'date' => '2026-06-13',
    'reading_time' => '7 min read',
    'primary_keyword' => 'what is SKILL.md',
    'excerpt' => 'SKILL.md is the Markdown file that defines an Agent Skill: YAML frontmatter that tells the agent when to use it, plus the instructions the agent follows.'
  ],
  [
    'slug' => 'how-to-create-a-skill-md-file',
    'title' => 'How to Create a SKILL.md File',
    'description' => 'A step-by-step guide to creating a SKILL.md file: the folder structure, where skills live, how to name a skill, the YAML frontmatter, and a full example.',
    'date' => '2026-06-13',
    'reading_time' => '9 min read',
    'primary_keyword' => 'how to create a SKILL.md file',
    'excerpt' => 'Build an Agent Skill from scratch: the folder layout, how to name it, the YAML frontmatter, the instructions, supporting files, and a complete example.'
  ],
  [
    'slug' => 'what-is-changelog-md',
    'title' => 'What Is CHANGELOG.md?',
    'description' => 'CHANGELOG.md explained: how to record release notes and version history in Markdown, the Keep a Changelog format, and why AI tools read it for context.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'what is CHANGELOG.md',
    'excerpt' => 'CHANGELOG.md is a Markdown file that records what changed in each version of a project, so people and tools can see its history at a glance.'
  ],
  [
    'slug' => 'what-is-contributing-md',
    'title' => 'What Is CONTRIBUTING.md?',
    'description' => 'CONTRIBUTING.md explained: how this Markdown file sets contribution rules, branch and PR workflow, and review expectations, and how GitHub and AI tools use it.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'what is CONTRIBUTING.md',
    'excerpt' => 'CONTRIBUTING.md is a Markdown file that tells contributors how to work on a project: setup, branch and pull request rules, and review expectations.'
  ],
  [
    'slug' => 'what-is-todo-md',
    'title' => 'What Is TODO.md?',
    'description' => 'TODO.md explained: how to track tasks, backlog, and implementation checklists in Markdown, and how AI coding agents use TODO.md for project state.',
    'date' => '2026-06-13',
    'reading_time' => '5 min read',
    'primary_keyword' => 'what is TODO.md',
    'excerpt' => 'TODO.md is a Markdown file that holds a project task list, backlog, or implementation checklist in plain text that lives next to the code.'
  ],
  [
    'slug' => 'what-is-prompts-md',
    'title' => 'What Is PROMPTS.md?',
    'description' => 'PROMPTS.md explained: how to store reusable AI prompts and prompt patterns in Markdown so your team gets consistent, high-quality results from AI tools.',
    'date' => '2026-06-13',
    'reading_time' => '5 min read',
    'primary_keyword' => 'what is PROMPTS.md',
    'excerpt' => 'PROMPTS.md is a Markdown file that collects reusable AI prompts and prompt patterns so a team can reuse what works instead of rewriting prompts each time.'
  ],
  [
    'slug' => 'what-is-api-md',
    'title' => 'What Is API.md?',
    'description' => 'API.md explained: how to document API endpoints, examples, payloads, and auth in Markdown, and how AI coding agents use API.md for accurate integrations.',
    'date' => '2026-06-13',
    'reading_time' => '5 min read',
    'primary_keyword' => 'what is API.md',
    'excerpt' => 'API.md is a Markdown file that documents a project API: endpoints, request and response examples, payloads, and authentication, kept next to the code.'
  ],
  [
    'slug' => 'what-is-security-md',
    'title' => 'What Is SECURITY.md?',
    'description' => 'SECURITY.md explained: how it publishes a security policy and vulnerability reporting process, where it lives, and how GitHub and AI tools use it.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'what is SECURITY.md',
    'excerpt' => 'SECURITY.md is a Markdown file that tells people how to report a security vulnerability in your project and what your security policy is.'
  ],
  [
    'slug' => 'why-markdown-files-matter-in-the-ai-age',
    'title' => 'Why Markdown Files Matter in the AI Age',
    'description' => 'Learn why .md files and Markdown documents are becoming more important for AI tools, documentation, prompts, and searchable knowledge.',
    'date' => '2026-06-13',
    'reading_time' => '7 min read',
    'primary_keyword' => 'markdown files in AI age',
    'excerpt' => 'Markdown is no longer just a developer convenience. In AI workflows, .md files are portable, token-efficient, easy to diff, and simple for humans and agents to read.'
  ],
  [
    'slug' => 'best-markdown-editor-for-windows-live-preview',
    'title' => 'Best Markdown Editor for Windows with Live Preview',
    'description' => 'Compare what matters in a Windows Markdown editor: live preview, local files, autosave, toolbar editing, open-with support, and fast .md viewing.',
    'date' => '2026-06-13',
    'reading_time' => '8 min read',
    'primary_keyword' => 'best markdown editor for Windows',
    'excerpt' => 'A practical buying guide for choosing a fast Markdown editor on Windows, especially when you need local .md file viewing and side-by-side preview.'
  ],
  [
    'slug' => 'how-to-open-preview-edit-md-files-windows',
    'title' => 'How to Open, Preview, and Edit .md Files on Windows',
    'description' => 'A simple guide to opening .md files on Windows, previewing Markdown, editing safely, and choosing a dedicated Markdown viewer.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'open .md files on Windows',
    'excerpt' => 'Windows can open Markdown files as plain text, but a dedicated editor makes headings, tables, links, checklists, and previews much easier to work with.'
  ],
  [
    'slug' => 'markdown-vs-word-for-ai-documentation',
    'title' => 'Markdown vs Word for AI Documentation',
    'description' => 'Compare Markdown and Word documents for AI documentation, LLM prompts, team notes, changelogs, and technical writing workflows.',
    'date' => '2026-06-13',
    'reading_time' => '7 min read',
    'primary_keyword' => 'Markdown vs Word for AI documentation',
    'excerpt' => 'Word is excellent for polished documents, but Markdown is usually better for AI-readable documentation, version control, prompts, and developer knowledge bases.'
  ],
  [
    'slug' => 'online-markdown-editor-live-preview',
    'title' => 'Online Markdown Editor with Live Preview',
    'description' => 'Use an online Markdown editor to preview .md files, edit Markdown in the browser, test tables, links, images, and download clean Markdown.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'online markdown editor live preview',
    'excerpt' => 'Online Markdown editors are useful when you need a fast browser preview, a clean copy-paste workspace, or a way to test Markdown before saving a file locally.'
  ],
  [
    'slug' => 'how-to-use-markdown-files-with-ai',
    'title' => 'How to Use Markdown Files with AI Tools',
    'description' => 'Learn how to use Markdown files with AI tools for prompts, project context, coding agents, documentation, RAG, and reusable knowledge.',
    'date' => '2026-06-13',
    'reading_time' => '8 min read',
    'primary_keyword' => 'how to use Markdown files with AI',
    'excerpt' => 'Markdown works well with AI because it keeps instructions, examples, headings, and code in a structured plain-text format that models can read clearly.'
  ],
  [
    'slug' => 'what-is-readme-md',
    'title' => 'What Is README.md?',
    'description' => 'README.md explained: what it is, why GitHub displays it, what to include, and how AI tools use README files for project context.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'what is README.md',
    'excerpt' => 'README.md is the front door of a project. It explains what the project does, how to use it, and gives humans and AI tools the first layer of context.'
  ],
  [
    'slug' => 'what-is-agents-md',
    'title' => 'What Is AGENTS.md?',
    'description' => 'AGENTS.md explained: how coding agents use it, what to include, and how it differs from README.md, CLAUDE.md, and other AI instruction files.',
    'date' => '2026-06-13',
    'reading_time' => '7 min read',
    'primary_keyword' => 'what is AGENTS.md',
    'excerpt' => 'AGENTS.md is like a README for coding agents: a predictable Markdown file for setup commands, test rules, project style, and agent instructions.'
  ],
  [
    'slug' => 'what-is-claude-md',
    'title' => 'What Is CLAUDE.md?',
    'description' => 'CLAUDE.md explained: how Claude Code uses Markdown memory files, what to write inside them, and how they support AI coding workflows.',
    'date' => '2026-06-13',
    'reading_time' => '7 min read',
    'primary_keyword' => 'what is CLAUDE.md',
    'excerpt' => 'CLAUDE.md gives Claude persistent project instructions in plain Markdown, helping each session start with the right context and workflow rules.'
  ],
  [
    'slug' => 'what-is-design-md',
    'title' => 'What Is DESIGN.md?',
    'description' => 'DESIGN.md explained: how teams use Markdown design docs for architecture decisions, UI direction, product thinking, and AI-assisted development.',
    'date' => '2026-06-13',
    'reading_time' => '6 min read',
    'primary_keyword' => 'what is DESIGN.md',
    'excerpt' => 'DESIGN.md is a practical Markdown file for recording design intent, architecture choices, UI decisions, constraints, and trade-offs before implementation.'
  ],
  [
    'slug' => 'common-md-files-for-ai-projects',
    'title' => 'Common .md Files for AI and Software Projects',
    'description' => 'A guide to README.md, AGENTS.md, CLAUDE.md, DESIGN.md, CHANGELOG.md, TODO.md, PROMPTS.md, API.md, and other useful Markdown project files.',
    'date' => '2026-06-13',
    'reading_time' => '9 min read',
    'primary_keyword' => 'common .md files for AI projects',
    'excerpt' => 'Modern AI and software projects often use multiple Markdown files: README.md for humans, AGENTS.md for agents, CLAUDE.md for Claude, and DESIGN.md for decisions.'
  ]
];

function blog_post_by_slug($slug) {
  global $blogPosts;
  foreach ($blogPosts as $post) {
    if ($post['slug'] === $slug) {
      return $post;
    }
  }
  return null;
}
