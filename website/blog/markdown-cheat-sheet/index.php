<?php
require_once __DIR__ . '/../../includes/config.php';

$article = [
  'slug' => 'markdown-cheat-sheet',
  'title' => 'Markdown Cheat Sheet',
  'seo_title' => 'Markdown Cheat Sheet: Syntax Quick Reference | Markdown Docs',
  'description' => 'A complete Markdown cheat sheet with copy-ready syntax for headings, bold, lists, links, images, tables, code blocks, task lists, and GitHub Flavored Markdown.',
  'date' => '2026-06-13',
  'reading_time' => '7 min read',
  'eyebrow' => 'Markdown syntax reference',
  'h1' => 'Markdown cheat sheet',
  'lead' => 'A quick reference for Markdown syntax: headings, emphasis, lists, links, images, code, tables, task lists, and GitHub Flavored Markdown extensions.',
  'sections' => [
    ['heading' => 'Headings', 'body' => '<p>Use one to six `#` symbols at the start of a line. The number of hashes sets the heading level.</p><table><tbody><tr><th>Markdown</th><th>Result</th></tr><tr><td><code># Heading 1</code></td><td>Largest heading</td></tr><tr><td><code>## Heading 2</code></td><td>Section heading</td></tr><tr><td><code>### Heading 3</code></td><td>Subsection heading</td></tr></tbody></table><p>Keep one H1 per document and nest the rest in order. Clear heading hierarchy helps readers, search engines, and AI tools understand structure.</p>'],
    ['heading' => 'Bold, italic, and strikethrough', 'body' => '<table><tbody><tr><th>Markdown</th><th>Result</th></tr><tr><td><code>**bold**</code></td><td><strong>bold</strong></td></tr><tr><td><code>_italic_</code></td><td><em>italic</em></td></tr><tr><td><code>***bold italic***</code></td><td><strong><em>bold italic</em></strong></td></tr><tr><td><code>~~strikethrough~~</code></td><td><s>strikethrough</s></td></tr><tr><td><code>`inline code`</code></td><td><code>inline code</code></td></tr></tbody></table>'],
    ['heading' => 'Lists and task lists', 'body' => '<p>Use `-`, `*`, or `+` for bullet lists, and numbers for ordered lists. Indent to nest. GitHub Flavored Markdown adds task lists with `- [ ]` and `- [x]`.</p><pre><code>- Bullet item&#10;  - Nested item&#10;1. First step&#10;2. Second step&#10;&#10;- [ ] Open task&#10;- [x] Completed task</code></pre>'],
    ['heading' => 'Links and images', 'body' => '<p>Links wrap text in square brackets followed by the URL in parentheses. Images use the same pattern with a leading `!`.</p><pre><code>[Link text](https://example.com)&#10;[Link with title](https://example.com "Tooltip")&#10;![Alt text](/path/to/image.png)&#10;&#10;[Reference link][ref]&#10;[ref]: https://example.com</code></pre><p>Always write descriptive alt text for images. It improves accessibility and SEO.</p>'],
    ['heading' => 'Code blocks', 'body' => '<p>Wrap inline code in single backticks. For multi-line code, use three backticks (a fenced code block) and add a language name for syntax highlighting.</p><pre><code>```js&#10;function hello() {&#10;  return "hi";&#10;}&#10;```</code></pre>'],
    ['heading' => 'Blockquotes and rules', 'body' => '<p>Start a line with `&gt;` for a blockquote. Use three or more dashes on their own line for a horizontal rule.</p><pre><code>&gt; This is a quote.&#10;&gt;&gt; Nested quote.&#10;&#10;---</code></pre>'],
    ['heading' => 'Tables', 'body' => '<p>Use pipes `|` to separate columns and a row of dashes to mark the header. Colons set column alignment: `:---` left, `:---:` center, `---:` right.</p><pre><code>| Name  | Role    | Count |&#10;| :---- | :-----: | ----: |&#10;| Alice | Admin   |    12 |&#10;| Bob   | Editor  |     7 |</code></pre><p>Tables are part of GitHub Flavored Markdown. You can build and preview them instantly in the <a href="/editor/">online Markdown editor</a>.</p>'],
    ['heading' => 'Escaping characters', 'body' => '<p>To show a Markdown character literally, put a backslash before it. For example, `\\*not italic\\*` renders as plain text with asterisks instead of italics. This is useful when writing about Markdown syntax itself.</p>'],
    ['heading' => 'Standard Markdown vs GitHub Flavored Markdown', 'body' => '<p>Core Markdown (CommonMark) covers headings, emphasis, lists, links, images, code, and blockquotes. GitHub Flavored Markdown (GFM) adds tables, task lists, strikethrough, and automatic URL links. Most modern tools, including Markdown Docs, support both, but very simple renderers may only handle the core syntax.</p>'],
    ['heading' => 'Practice with a live preview', 'body' => '<p>The fastest way to learn Markdown is to type it and watch it render. Open the <a href="/editor/">Markdown Docs online editor</a> to test this cheat sheet, or <a href="/download/">download Markdown Docs</a> to edit `.md` files on Windows with live preview. For more, see <a href="/blog/online-markdown-editor-live-preview/">online Markdown editing</a> and <a href="/blog/how-to-open-preview-edit-md-files-windows/">opening .md files on Windows</a>.</p>']
  ],
  'sources' => [
    ['label' => 'CommonMark specification', 'url' => 'https://commonmark.org/', 'note' => 'for standard Markdown syntax.'],
    ['label' => 'GitHub Flavored Markdown spec', 'url' => 'https://github.github.com/gfm/', 'note' => 'for GFM extensions like tables and task lists.']
  ],
  'faqs' => [
    ['What is the difference between * and _ in Markdown?', 'Both create emphasis. A single * or _ makes italic text, and a double ** or __ makes bold. Many writers use ** for bold and _ for italic for readability.'],
    ['How do I make a table in Markdown?', 'Separate columns with pipes and add a row of dashes under the header. Use colons in the dash row to align columns left, center, or right.'],
    ['Does Markdown support task lists?', 'Yes, in GitHub Flavored Markdown. Use "- [ ]" for an unchecked item and "- [x]" for a checked item.'],
    ['How do I add a code block with highlighting?', 'Wrap the code in three backticks and write the language name right after the opening backticks, for example ```js for JavaScript.']
  ]
];

include __DIR__ . '/../../includes/article-template.php';
