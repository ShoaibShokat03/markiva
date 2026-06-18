<?php
require_once __DIR__ . '/../includes/config.php';
$appName = $site['app_name'];
$title = 'Download ' . $appName . ' - Markdown Editor for Windows';
$description = 'Download the ' . $appName . ' Windows installer for a compact Markdown editor and previewer with autosave, full toolbar editing, and open-with support.';
$canonical = page_url('download/');
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'SoftwareApplication',
  'name' => $appName,
  'operatingSystem' => 'Windows',
  'applicationCategory' => 'ProductivityApplication',
  'downloadUrl' => page_url(ltrim($site['setup_download_url'], '/')),
  'softwareVersion' => $site['version'],
  'url' => $canonical
];
include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero download-hero">
  <p class="eyebrow">Download</p>
  <h1>Install <?= e($appName) ?> on Windows.</h1>
  <p>Use the setup installer to add <?= e($appName) ?> to your system and open Markdown files directly from Windows.</p>
  <div class="actions">
    <a class="btn primary" href="<?= e($site['setup_download_url']) ?>"><?= e($site['setup_download_text']) ?></a>
    <button class="btn" data-upload-trigger>Preview a Markdown file</button>
    <input class="hidden-file" type="file" accept=".md,.markdown,.mdown,.mkd,text/markdown,text/plain" data-upload-input>
  </div>
  <p class="micro" data-upload-status>Installer version <?= e($site['version']) ?>.</p>
</section>
<section class="section steps">
  <article><strong>1</strong><h2>Download Extractor</h2><p>Extract the downloaded `.bat` file.</p></article>
  <article><strong>2</strong><h2>Run Extractor</h2><p>Run the extract-markdowndocs-setup.bat file and installer setup will be show.</p></article>
  <article><strong>3</strong><h2>Download</h2><p>Save `Markdown-Docs-Setup.exe` to your computer from the button above.</p></article>
  <article><strong>4</strong><h2>Install</h2><p>Run the installer and follow the setup prompts. Installation takes under a minute.</p></article>
  <article><strong>5</strong><h2>Open files</h2><p>Choose <?= e($appName) ?> for `.md` files from Windows Explorer, or double-click any Markdown file.</p></article>
</section>

<section class="section">
  <div class="section-head">
    <p class="eyebrow">What you get</p>
    <h2>A complete Markdown editor and previewer for Windows.</h2>
  </div>
  <div class="feature-grid">
    <article><h3>Live preview</h3><p>Edit Markdown on the left and see the rendered result on the right with side-by-side split view or a full preview mode.</p></article>
    <article><h3>Autosave and drafts</h3><p>Saved files autosave to disk, and untitled documents are kept as recoverable local drafts so you never lose work.</p></article>
    <article><h3>Full editing toolbar</h3><p>Insert headings, bold, italic, lists, task lists, tables, links, images, code blocks, and video directives in one click.</p></article>
    <article><h3>Windows open-with</h3><p>The installer registers Markdown file types, so you can open `.md`, `.markdown`, `.mdown`, and `.mkd` files directly from Explorer.</p></article>
  </div>
</section>

<section class="section split-text">
  <div>
    <h2>System requirements</h2>
    <p><?= e($appName) ?> runs on Windows 10 and Windows 11. The installer is a standard desktop setup package, version <?= e($site['version']) ?>, with no account or internet connection required to edit files.</p>
  </div>
  <div>
    <h2>Prefer to stay in the browser?</h2>
    <p>You can also use the <a href="/editor/">online Markdown editor</a> for quick previews, or read the guide on <a href="/blog/how-to-open-preview-edit-md-files-windows/">how to open and edit .md files on Windows</a>. New to Markdown for AI work? See <a href="/blog/why-markdown-files-matter-in-the-ai-age/">why Markdown files matter in the AI age</a>.</p>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
