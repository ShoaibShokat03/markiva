<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-prompts-md',
  'title' => 'What Is PROMPTS.md?',
  'seo_title' => 'What Is PROMPTS.md? Reusable AI Prompts | Markdown Docs',
  'description' => 'PROMPTS.md explained: how to store reusable AI prompts and prompt patterns in Markdown so your team gets consistent, high-quality results from AI tools.',
  'date' => '2026-06-13',
  'reading_time' => '5 min read',
  'eyebrow' => 'PROMPTS.md explained',
  'h1' => 'What is PROMPTS.md?',
  'lead' => 'PROMPTS.md is a Markdown file that collects reusable AI prompts and prompt patterns so a team can reuse what works instead of rewriting prompts each time.',
  'sections' => [
    ['heading' => 'PROMPTS.md meaning', 'body' => '<p>`PROMPTS.md` is a project file that stores prompts your team uses with AI tools: code review prompts, refactor instructions, documentation generators, test writers, and more. Instead of everyone crafting prompts from scratch, the best versions live in one Markdown file that is shared and version controlled.</p>'],
    ['heading' => 'What to put in PROMPTS.md', 'body' => '<ul><li>Named, reusable prompts grouped by task</li><li>Short notes on when to use each prompt</li><li>Placeholders for inputs the user fills in</li><li>Examples of good and bad outputs</li><li>Links to related <a href="/blog/what-is-agents-md/">AGENTS.md</a> or <a href="/blog/what-is-claude-md/">CLAUDE.md</a> rules</li></ul><pre><code># Prompts&#10;&#10;## Code review&#10;Review this diff for bugs, edge cases, and clarity.&#10;Return findings as a short list.&#10;&#10;## Write tests&#10;Write unit tests for {file}. Cover edge cases.</code></pre>'],
    ['heading' => 'Why centralize prompts', 'body' => '<ul><li>Consistency: everyone uses the prompt that works</li><li>Quality: refine prompts in one place over time</li><li>Onboarding: new team members reuse proven patterns</li><li>Version control: prompt changes are reviewable like code</li></ul>'],
    ['heading' => 'PROMPTS.md and AI workflows', 'body' => '<p>As teams rely more on AI tools, prompts become shared assets, much like code snippets. A PROMPTS.md keeps that knowledge from living only in chat histories. It pairs well with a clear set of <a href="/blog/ai-agent-instruction-files-explained/">agent instruction files</a> that tell the AI how your project works. For more on AI Markdown workflows, see <a href="/blog/how-to-use-markdown-files-with-ai/">how to use Markdown files with AI</a>.</p>'],
    ['heading' => 'Edit PROMPTS.md with a preview', 'body' => '<p>Draft and organize prompts in the <a href="/editor/">Markdown Docs online editor</a>, or <a href="/download/">download Markdown Docs</a> to edit PROMPTS.md on Windows. See more <a href="/blog/common-md-files-for-ai-projects/">common .md files for AI projects</a>.</p>']
  ],
  'sources' => [
    ['label' => 'Markdown Docs: how to use Markdown with AI', 'url' => 'https://markdowndocs.online/blog/how-to-use-markdown-files-with-ai/', 'note' => 'related AI Markdown workflows.']
  ],
  'faqs' => [
    ['Is PROMPTS.md an official standard?', 'No. It is a practical convention for storing reusable AI prompts in a project, not an official specification.'],
    ['What should I store in PROMPTS.md?', 'Named, reusable prompts grouped by task, with notes on when to use each and placeholders for inputs.'],
    ['Why keep prompts in version control?', 'So prompt improvements are shared, reviewable, and consistent across the team instead of trapped in individual chat histories.'],
    ['How is PROMPTS.md different from AGENTS.md?', 'AGENTS.md tells an agent how to work in the project. PROMPTS.md stores reusable prompts people send to AI tools.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
