<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-contributing-md',
  'title' => 'What Is CONTRIBUTING.md?',
  'seo_title' => 'What Is CONTRIBUTING.md? Contributor Guide | Markdown Docs',
  'description' => 'CONTRIBUTING.md explained: how this Markdown file sets contribution rules, branch and PR workflow, and review expectations, and how GitHub and AI tools use it.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'CONTRIBUTING.md explained',
  'h1' => 'What is CONTRIBUTING.md?',
  'lead' => 'CONTRIBUTING.md is a Markdown file that tells contributors how to work on a project: setup, branch and pull request rules, and review expectations.',
  'sections' => [
    ['heading' => 'CONTRIBUTING.md meaning', 'body' => '<p>`CONTRIBUTING.md` is a community health file that explains how to contribute to a project. On GitHub, when someone opens an issue or pull request, the platform links to CONTRIBUTING.md automatically, so it is shown at the exact moment a contributor needs it. It sits at the repository root or in a `.github` or `docs` folder.</p>'],
    ['heading' => 'What to include', 'body' => '<ul><li>How to set up the project locally</li><li>How to run tests, lint, and build</li><li>Branch naming and commit message rules</li><li>Pull request and code review expectations</li><li>Coding style and where to ask questions</li><li>Links to the <a href="/blog/what-is-readme-md/">README.md</a>, license, and code of conduct</li></ul>'],
    ['heading' => 'A short example outline', 'body' => '<pre><code># Contributing&#10;&#10;## Setup&#10;```bash&#10;npm install&#10;npm test&#10;```&#10;&#10;## Branches&#10;Use feature/your-change.&#10;&#10;## Pull requests&#10;- Keep PRs small and focused&#10;- All tests must pass&#10;- One approval required</code></pre>'],
    ['heading' => 'Why CONTRIBUTING.md matters', 'body' => '<p>A clear contributor guide lowers the barrier to a first contribution, reduces back-and-forth on pull requests, and keeps quality consistent. It saves maintainers from answering the same questions repeatedly and helps new contributors feel confident. For open-source projects, it is one of the strongest signals that a project is well run.</p>'],
    ['heading' => 'How AI tools use it', 'body' => '<p>AI coding agents read CONTRIBUTING.md to learn the workflow before making changes: the test command to run, the branch convention, and the review rules. That overlaps with operational files like <a href="/blog/what-is-agents-md/">AGENTS.md</a>, but CONTRIBUTING.md is aimed at human contributors first. Many projects keep both.</p>'],
    ['heading' => 'Edit CONTRIBUTING.md with a preview', 'body' => '<p>Draft your contributor guide in the <a href="/editor/">Markdown Docs online editor</a> to preview headings and command blocks, or <a href="/download/">download Markdown Docs</a> for local editing on Windows. See more <a href="/blog/common-md-files-for-ai-projects/">common .md files for AI projects</a>.</p>']
  ],
  'sources' => [
    ['label' => 'GitHub Docs: setting guidelines for contributors', 'url' => 'https://docs.github.com/en/communities/setting-up-your-project-for-healthy-contributions/setting-guidelines-for-repository-contributors', 'note' => 'official CONTRIBUTING.md guidance.']
  ],
  'faqs' => [
    ['Where should CONTRIBUTING.md be placed?', 'Put it at the repository root, or in a .github or docs folder. GitHub then links to it when someone opens an issue or pull request.'],
    ['What goes in CONTRIBUTING.md?', 'Setup steps, test and build commands, branch and commit rules, pull request and review expectations, and coding style.'],
    ['Is CONTRIBUTING.md only for open source?', 'No. Internal teams use it too, to document workflow and onboard new developers consistently.'],
    ['How is it different from AGENTS.md?', 'CONTRIBUTING.md targets human contributors, while AGENTS.md gives operational rules to AI coding agents. Their content can overlap.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
