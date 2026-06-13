<?php
require_once __DIR__ . '/includes/config.php';
$appName = $site['app_name'];
$title = $appName . ' - Fast Markdown Editor for Windows';
$description = $appName . ' is a fast Windows Markdown editor with live preview, autosave, a full toolbar, tables, images, and open-with support for .md files.';
$canonical = page_url('');
$schema = [
  '@context' => 'https://schema.org',
  '@graph' => [
    [
      '@type' => 'SoftwareApplication',
      'name' => $appName,
      'alternateName' => ['MarkdownDocs', 'Markdown Docs editor'],
      'applicationCategory' => 'ProductivityApplication',
      'operatingSystem' => 'Windows',
      'description' => $description,
      'softwareVersion' => $site['version'],
      'author' => ['@type' => 'Person', 'name' => $site['author']],
      'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'USD'],
      'downloadUrl' => page_url(ltrim($site['setup_download_url'], '/')),
      'url' => page_url('')
    ]
  ]
];
include __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="hero-copy">
    <p class="eyebrow">Installable Markdown editor for Windows</p>
    <h1>Open, edit, preview, and autosave Markdown files fast.</h1>
    <p class="lead"><?= e($appName) ?> is a compact desktop Markdown viewer and editor built for quick `.md` file workflows, side-by-side preview, full preview mode, and a complete editing toolbar.</p>
    <div class="actions">
      <a class="btn primary" href="<?= e($site['setup_download_url']) ?>"><?= e($site['setup_download_text']) ?></a>
      <a class="btn" href="/editor/">Open online editor</a>
      <button class="btn" data-upload-trigger>Upload Markdown</button>
      <input class="hidden-file" type="file" accept=".md,.markdown,.mdown,.mkd,text/markdown,text/plain" data-upload-input>
    </div>
    <p class="micro" data-upload-status>Works with `.md`, `.markdown`, `.mdown`, and `.mkd` files.</p>
  </div>
  <div class="app-preview" aria-label="<?= e($appName) ?> interface preview">
    <div class="preview-rail">
      <span></span><b>File</b>
      <i>New file</i><i>Open file</i><i>Save</i><i>Save as</i>
    </div>
    <div class="preview-main">
      <div class="preview-top">Project Notes.md <em>Split preview</em></div>
      <div class="preview-toolbar">
        <span>H1</span><span>B</span><span>I</span><span>List</span><span>Table</span><span>Image</span>
      </div>
      <div class="preview-grid">
        <pre># Launch notes

- Fast editing
- Live preview
- Autosave drafts</pre>
        <article>
          <h2>Launch notes</h2>
          <ul><li>Fast editing</li><li>Live preview</li><li>Autosave drafts</li></ul>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="section-head">
    <p class="eyebrow">Editing coverage</p>
    <h2>A full Markdown toolbar without a heavy interface.</h2>
  </div>
  <div class="feature-grid">
    <article><h3>Text and structure</h3><p>Headings, bold, italic, strikethrough, inline code, block quotes, callouts, rules, and code blocks.</p></article>
    <article><h3>Lists and tasks</h3><p>Bullet lists, numbered lists, task items, and checklist blocks for notes, specs, and release plans.</p></article>
    <article><h3>Media and tables</h3><p>Insert Markdown tables, links, images, reference links, and video embeds with preview support.</p></article>
    <article><h3>File workflow</h3><p>Open with Windows, autosave saved files, restore untitled drafts, rename from the header, and save as needed.</p></article>
  </div>
</section>

<section class="section">
  <div class="section-head">
    <p class="eyebrow">Markdown learning hub</p>
    <h2>Guides for `.md` files, AI docs, and Windows preview.</h2>
  </div>
  <div class="feature-grid">
    <article><h3>Markdown cheat sheet</h3><p>A quick syntax reference for headings, bold, lists, links, tables, code blocks, and task lists. <a href="/blog/markdown-cheat-sheet/">Open the cheat sheet</a>.</p></article>
    <article><h3>Markdown in the AI age</h3><p>Learn why `.md` files are becoming more useful for AI-readable documentation, prompt notes, and agent context. <a href="/blog/why-markdown-files-matter-in-the-ai-age/">Read the guide</a>.</p></article>
    <article><h3>Online Markdown preview</h3><p>Use the browser editor for AI output, README drafts, tables, and quick live previews. <a href="/blog/online-markdown-editor-live-preview/">Online preview guide</a>.</p></article>
    <article><h3>AI Markdown files</h3><p>Use Markdown with AI tools for prompts, coding agents, project context, and reusable knowledge. <a href="/blog/how-to-use-markdown-files-with-ai/">AI Markdown guide</a>.</p></article>
    <article><h3>Best Windows editor</h3><p>Compare Markdown editors for Windows and decide when a compact local viewer beats a heavy workspace. <a href="/blog/best-markdown-editor-for-windows-live-preview/">Compare editors</a>.</p></article>
    <article><h3>Open .md files</h3><p>Follow a simple Windows workflow for opening, previewing, editing, and saving Markdown files. <a href="/blog/how-to-open-preview-edit-md-files-windows/">Open .md files</a>.</p></article>
    <article><h3>AI agent instruction files</h3><p>Every .md and rules file AI agents read: README, AGENTS, CLAUDE, GEMINI, Cursor, Copilot, and more. <a href="/blog/ai-agent-instruction-files-explained/">Read the full guide</a>.</p></article>
  </div>
</section>

<section class="band">
  <div>
    <h2>Built for opening Markdown files quickly.</h2>
    <p>Install <?= e($appName) ?>, associate it with Markdown files, then open documents directly from Windows Explorer.</p>
  </div>
  <a class="btn primary" href="/download/">Get the installer</a>
</section>

<section class="section faq-preview">
  <div class="section-head">
    <p class="eyebrow">FAQ</p>
    <h2>Markdown editor questions</h2>
  </div>
  <details open>
    <summary>Can <?= e($appName) ?> open Markdown files by double-click?</summary>
    <p>Yes. The installer registers Markdown file types so Windows can open `.md` files with <?= e($appName) ?>.</p>
  </details>
  <details>
    <summary>Does <?= e($appName) ?> autosave?</summary>
    <p>Saved documents autosave back to the same file. Untitled documents are saved locally as drafts until you choose Save As.</p>
  </details>
  <details>
    <summary>Can I insert tables, images, and videos?</summary>
    <p>Yes. The toolbar inserts table syntax, image syntax, and a safe video directive that renders in preview.</p>
  </details>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
