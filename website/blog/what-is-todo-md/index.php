<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-todo-md',
  'title' => 'What Is TODO.md?',
  'seo_title' => 'What Is TODO.md? Markdown Task Lists | Markdown Docs',
  'description' => 'TODO.md explained: how to track tasks, backlog, and implementation checklists in Markdown, and how AI coding agents use TODO.md for project state.',
  'date' => '2026-06-13',
  'reading_time' => '5 min read',
  'eyebrow' => 'TODO.md explained',
  'h1' => 'What is TODO.md?',
  'lead' => 'TODO.md is a Markdown file that holds a project task list, backlog, or implementation checklist in plain text that lives next to the code.',
  'sections' => [
    ['heading' => 'TODO.md meaning', 'body' => '<p>`TODO.md` is a simple Markdown file for tracking what still needs to be done in a project. It is not an official standard, but it is a popular, lightweight alternative to an external issue tracker for small projects, personal work, or a focused implementation plan. Because it lives in the repository, it versions with the code and is visible to anyone who clones the project.</p>'],
    ['heading' => 'Using Markdown task lists', 'body' => '<p>TODO.md usually uses GitHub Flavored Markdown task lists, which render as checkboxes:</p><pre><code># TODO&#10;&#10;## In progress&#10;- [ ] Add export to PDF&#10;- [x] Live preview split view&#10;&#10;## Backlog&#10;- [ ] Dark theme&#10;- [ ] Keyboard shortcuts</code></pre><p>See the <a href="/blog/markdown-cheat-sheet/">Markdown cheat sheet</a> for task list and list syntax.</p>'],
    ['heading' => 'Why use a TODO.md file', 'body' => '<ul><li>Zero setup compared with an external tracker</li><li>Tasks stay next to the code and in version control</li><li>Easy to review in a pull request</li><li>Readable in any editor, even without a renderer</li></ul><p>For larger teams, a full issue tracker scales better, but TODO.md is ideal for quick plans and solo work.</p>'],
    ['heading' => 'How AI agents use TODO.md', 'body' => '<p>AI coding agents read TODO.md to understand outstanding work and current priorities, and some agents maintain a checklist as they work through a multi-step task. Keeping a clear TODO.md gives an assistant a ready-made plan to follow and update, which keeps long tasks organized.</p>'],
    ['heading' => 'Edit TODO.md with a preview', 'body' => '<p>Draft and check off tasks in the <a href="/editor/">Markdown Docs online editor</a>, or <a href="/download/">download Markdown Docs</a> to edit TODO.md on Windows. See more <a href="/blog/common-md-files-for-ai-projects/">common .md files for AI projects</a>.</p>']
  ],
  'sources' => [
    ['label' => 'GitHub Flavored Markdown: task lists', 'url' => 'https://github.github.com/gfm/', 'note' => 'for checkbox task list syntax.']
  ],
  'faqs' => [
    ['Is TODO.md a standard file?', 'No. TODO.md is a popular convention, not an official standard. It is a lightweight way to track tasks inside a repository.'],
    ['How do I make checkboxes in TODO.md?', 'Use GitHub Flavored Markdown task lists: "- [ ]" for an open task and "- [x]" for a completed one.'],
    ['When should I use TODO.md instead of an issue tracker?', 'Use TODO.md for small projects, solo work, or a focused plan. Use a full tracker when many people need assignments, labels, and workflow.'],
    ['Do AI agents update TODO.md?', 'Some agents read it for context and maintain a working checklist as they complete multi-step tasks.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
