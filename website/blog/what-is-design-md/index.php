<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'what-is-design-md',
  'title' => 'What Is DESIGN.md?',
  'seo_title' => 'What Is DESIGN.md? Design Docs in Markdown | Markdown Docs',
  'description' => 'DESIGN.md explained: how teams use Markdown design docs for architecture decisions, UI direction, product thinking, and AI-assisted development.',
  'date' => '2026-06-13',
  'reading_time' => '6 min read',
  'eyebrow' => 'DESIGN.md explained',
  'h1' => 'What is DESIGN.md?',
  'lead' => 'DESIGN.md is a Markdown design document that records product, UI, architecture, or technical decisions before implementation.',
  'sections' => [
    ['heading' => 'DESIGN.md meaning', 'body' => '<p>`DESIGN.md` is not a single official standard, but it is a useful convention. Teams use it to capture design intent, constraints, trade-offs, diagrams, user flows, data models, and architecture decisions in a plain-text file that can live beside the code.</p>'],
    ['heading' => 'What to include in DESIGN.md', 'body' => '<ul><li>Problem statement</li><li>Goals and non-goals</li><li>User flows or system flows</li><li>Architecture choices</li><li>UI rules and component behavior</li><li>Risks, trade-offs, and open questions</li><li>Links to README.md, AGENTS.md, and implementation tasks</li></ul>'],
    ['heading' => 'A simple DESIGN.md outline', 'body' => '<pre><code># DESIGN.md&#10;&#10;## Problem&#10;What we are solving and for whom.&#10;&#10;## Goals / Non-goals&#10;- Goal: fast offline editing&#10;- Non-goal: real-time collaboration&#10;&#10;## Approach&#10;Chosen architecture and why.&#10;&#10;## Trade-offs&#10;What we gave up and the risks.&#10;&#10;## Open questions&#10;Decisions still pending.</code></pre><p>This outline keeps a design doc skimmable. Each heading answers one question, which makes it easy for reviewers and AI tools to follow the reasoning.</p>'],
    ['heading' => 'Why DESIGN.md helps AI agents', 'body' => '<p>AI coding agents need intent, not just code. DESIGN.md explains why a feature should work a certain way. That helps an assistant make changes that match the product direction instead of only matching local syntax. Paired with an <a href="/blog/what-is-agents-md/">AGENTS.md</a> file for operational rules and a <a href="/blog/what-is-claude-md/">CLAUDE.md</a> file for session memory, DESIGN.md supplies the missing layer: the reasoning behind the build.</p>'],
    ['heading' => 'DESIGN.md vs ADR and RFC', 'body' => '<p>Some teams record decisions as ADRs (Architecture Decision Records) or RFCs. DESIGN.md is lighter and more flexible: a single living document for the current design rather than a numbered log of past choices. For small projects, one DESIGN.md is often enough; larger teams may keep DESIGN.md for the big picture and ADRs for individual decisions.</p>'],
    ['heading' => 'DESIGN.md vs README.md', 'body' => '<p><a href="/blog/what-is-readme-md/">README.md</a> introduces the finished project. DESIGN.md explains the decisions behind it. README is for usage; DESIGN is for reasoning and implementation guidance.</p>'],
    ['heading' => 'Preview design docs before sharing', 'body' => '<p>Design docs often include tables, checklists, code snippets, and links. Use the <a href="/editor/">online Markdown editor</a> to preview them, then save as `DESIGN.md` with the desktop app if you work locally.</p>']
  ],
  'sources' => [
    ['label' => 'GitHub Markdown syntax', 'url' => 'https://docs.github.com/github/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax', 'note' => 'for Markdown formatting patterns.']
  ],
  'faqs' => [
    ['Is DESIGN.md a required file?', 'No. DESIGN.md is a convention, not a requirement. It is useful when a project needs persistent design or architecture context.'],
    ['Should DESIGN.md include diagrams?', 'Yes, if they help. You can link images, use Mermaid where supported, or describe flows in tables and lists.'],
    ['Can AI tools write DESIGN.md?', 'AI tools can draft design docs, but humans should review goals, trade-offs, constraints, and product decisions before implementation.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
