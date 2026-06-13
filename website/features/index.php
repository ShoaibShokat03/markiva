<?php
require_once __DIR__ . '/../includes/config.php';
$appName = $site['app_name'];
$title = $appName . ' Features - Editing, Preview, and Autosave';
$description = $appName . ' features: live preview, full toolbar editing, autosave, tables, images, video preview, and Windows open-with for .md files.';
$canonical = page_url('features/');
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'SoftwareApplication',
  'name' => $appName,
  'featureList' => ['Live Markdown preview', 'Autosave', 'Undo and redo', 'Markdown tables', 'Image insertion', 'Video preview', 'Windows file associations'],
  'operatingSystem' => 'Windows',
  'applicationCategory' => 'ProductivityApplication',
  'url' => $canonical
];
include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero">
  <p class="eyebrow">Features</p>
  <h1>Everything needed for fast Markdown editing.</h1>
  <p><?= e($appName) ?> keeps Markdown work compact: editor, preview, tools, autosave, and file workflow in one focused desktop app.</p>
</section>
<section class="section feature-list">
  <article><h2>Editor and preview modes</h2><p>Switch between editor-only, side-by-side split, and full preview mode depending on how you work. The live preview renders headings, tables, code blocks, and images as you type, so you always see the formatted result.</p></article>
  <article><h2>Complete Markdown toolbar</h2><p>Insert headings, bold, italic, strikethrough, inline code, block quotes, callouts, horizontal rules, fenced code blocks, tables, links, reference links, images, and video directives. The toolbar covers standard Markdown and GitHub Flavored Markdown patterns.</p></article>
  <article><h2>Lists, tasks, and tables</h2><p>Build bullet lists, numbered lists, and task checklists for notes, specs, and release plans. The table tool inserts aligned Markdown tables you can edit by hand or preview instantly.</p></article>
  <article><h2>Autosave and recovery</h2><p>Saved files autosave to disk, while untitled documents are preserved as recoverable local drafts. This is especially useful for <a href="/blog/why-markdown-files-matter-in-the-ai-age/">AI-ready Markdown documentation</a> and long writing sessions.</p></article>
  <article><h2>Windows-first workflow</h2><p>Open Markdown files from Explorer through <?= e($appName) ?> after installing the setup package, with open-with support for `.md`, `.markdown`, `.mdown`, and `.mkd`. See the guide to <a href="/blog/how-to-open-preview-edit-md-files-windows/">opening .md files on Windows</a>.</p></article>
  <article><h2>Rename, undo, and redo</h2><p>Rename a document straight from the header, and rely on full undo and redo while editing. Everything stays local on your device, with no account required.</p></article>
</section>

<section class="band">
  <div>
    <h2>From AI docs to README files.</h2>
    <p><?= e($appName) ?> handles every kind of Markdown file, from <a href="/blog/what-is-readme-md/">README.md</a> and <a href="/blog/what-is-agents-md/">AGENTS.md</a> to <a href="/blog/common-md-files-for-ai-projects/">other project Markdown files</a>. Try it in the browser or install it for Windows.</p>
  </div>
  <a class="btn primary" href="/download/">Download for Windows</a>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
