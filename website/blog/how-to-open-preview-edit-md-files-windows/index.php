<?php
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/blog-data.php';

$post = blog_post_by_slug('how-to-open-preview-edit-md-files-windows');
$appName = $site['app_name'];
$title = 'How to Open and Edit .md Files on Windows | Markdown Docs';
$description = $post['description'];
$canonical = page_url('blog/' . $post['slug'] . '/');
$faqs = [
  ['What is an .md file?', 'An .md file is a Markdown document. It stores formatted content as plain text using simple symbols for headings, lists, links, images, code blocks, and tables.'],
  ['Can Windows open .md files?', 'Windows can open .md files in text editors, but a Markdown editor gives you a rendered preview so the document is easier to read and edit.'],
  ['How do I preview Markdown on Windows?', 'Use a Markdown editor with live preview. Open the .md file, choose split preview or preview-only mode, and check headings, links, tables, images, and lists before saving.'],
  ['Is Markdown safe to edit?', 'Markdown is safe to edit because it is plain text. Still, keep backups for important documents and preview the file before publishing or sharing it.']
];
$schema = [
  '@context' => 'https://schema.org',
  '@graph' => [
    [
      '@type' => 'BlogPosting',
      'headline' => $post['title'],
      'description' => $description,
      'datePublished' => $post['date'],
      'dateModified' => $post['date'],
      'author' => ['@type' => 'Person', 'name' => $site['author']],
      'publisher' => ['@type' => 'Organization', 'name' => $appName],
      'mainEntityOfPage' => $canonical
    ],
    [
      '@type' => 'FAQPage',
      'mainEntity' => array_map(fn($faq) => [
        '@type' => 'Question',
        'name' => $faq[0],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]]
      ], $faqs)
    ]
  ]
];
include __DIR__ . '/../../includes/header.php';
?>

<article class="article">
  <header class="article-head">
    <p class="eyebrow">.md files on Windows</p>
    <h1>How to open, preview, and edit .md files on Windows</h1>
    <p class="lead">An `.md` file is a Markdown document. On Windows, you can open it as plain text, but a Markdown editor gives you a live preview so the document reads like formatted content.</p>
    <div class="article-meta"><?= e(date('M j, Y', strtotime($post['date']))) ?> · <?= e($post['reading_time']) ?></div>
  </header>

  <h2>What is an .md file?</h2>
  <p>An `.md` file is a plain-text Markdown file. It uses lightweight syntax for structure: `#` for headings, `-` for lists, `[text](url)` for links, `![alt](image)` for images, and fenced blocks for code. That makes it common in README files, documentation, AI prompt notes, project specs, and changelogs.</p>

  <h2>How to open an .md file on Windows</h2>
  <ol>
    <li>Install a Markdown editor such as <a href="/download/">Markdown Docs for Windows</a>.</li>
    <li>Right-click your `.md` file and choose Open with.</li>
    <li>Select the Markdown editor and optionally make it the default app.</li>
    <li>Edit the plain-text source and use preview mode to inspect the rendered output.</li>
  </ol>

  <h2>How to preview Markdown before saving</h2>
  <p>Preview is important because raw Markdown and rendered Markdown are not identical. A typo in a table, image path, link, or checklist can be hard to spot in text-only mode. Side-by-side preview lets you keep the source visible while checking the output.</p>

  <ul>
    <li>Use split view when writing new content.</li>
    <li>Use preview-only mode when reading long docs.</li>
    <li>Use full preview before sending or publishing a document.</li>
    <li>Use the <a href="/editor/">online Markdown editor</a> when you only need a quick browser check.</li>
  </ul>

  <h2>What to check before publishing an .md file</h2>
  <table>
    <tbody>
      <tr><th>Check</th><th>Why it matters</th></tr>
      <tr><td>One clear H1</td><td>Improves readability and AI retrieval.</td></tr>
      <tr><td>Working links</td><td>Prevents broken documentation paths.</td></tr>
      <tr><td>Readable tables</td><td>Tables break easily when separators are missing.</td></tr>
      <tr><td>Image alt text</td><td>Helps accessibility and content understanding.</td></tr>
      <tr><td>Consistent headings</td><td>Makes the file easier to scan and parse.</td></tr>
    </tbody>
  </table>

  <h2>Why a dedicated editor is better than Notepad</h2>
  <p>Notepad can edit a Markdown file, but it does not show the final document. A dedicated editor can render headings, lists, links, images, code, block quotes, task items, and tables while keeping the source editable. That is especially useful for AI documentation, where structure matters. See <a href="/blog/why-markdown-files-matter-in-the-ai-age/">why Markdown files matter in the AI age</a>.</p>

  <p><a href="/download/">Download Markdown Docs</a> if you want Windows open-with support, autosave, title rename, and local `.md` file editing.</p>

  <h2>Related references</h2>
  <ul>
    <li><a href="https://code.visualstudio.com/docs/languages/markdown">VS Code Markdown documentation</a> explains common Markdown preview shortcuts and side-by-side preview.</li>
    <li><a href="https://www.markdownguide.org/">Markdown Guide</a> is a useful syntax reference for `.md` files.</li>
  </ul>

  <section class="faq-list article-faq">
    <h2>FAQ</h2>
    <?php foreach ($faqs as $faq): ?>
      <details>
        <summary><?= e($faq[0]) ?></summary>
        <p><?= e($faq[1]) ?></p>
      </details>
    <?php endforeach; ?>
  </section>
</article>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
