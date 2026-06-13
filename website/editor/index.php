<?php
require_once __DIR__ . '/../includes/config.php';
$appName = $site['app_name'];
$title = 'Online Markdown Editor - ' . $appName . ' Web Preview Tool';
$description = 'Use the ' . $appName . ' online Markdown editor to upload, edit, and preview .md files in your browser, then download clean Markdown instantly.';
$canonical = page_url('editor/');
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'WebApplication',
  'name' => $appName . ' Online Markdown Editor',
  'applicationCategory' => 'ProductivityApplication',
  'operatingSystem' => 'Any',
  'url' => $canonical,
  'description' => $description
];
$bodyClass = 'editor-page';
include __DIR__ . '/../includes/header.php';
?>

<section class="web-editor-shell">
  <div class="web-editor-top">
    <div class="web-doc-title">
      <p class="eyebrow">Online editor</p>
      <button id="editorTitle" class="web-title-button" title="Rename document">Untitled.md</button>
      <input id="editorTitleInput" class="web-title-input" type="text" value="Untitled" aria-label="Document name">
      <span data-web-status>Ready</span>
    </div>
    <div class="web-header-actions">
      <div class="web-view-toggle" aria-label="Editor view mode">
        <button data-view-mode="edit" title="Editor only">Edit</button>
        <button data-view-mode="split" class="active" title="Editor and preview">Split</button>
        <button data-view-mode="preview" title="Preview only">Preview</button>
        <button data-view-mode="fullscreen" title="Fullscreen preview">Full</button>
      </div>
      <button class="btn" data-web-open>Upload</button>
      <button class="btn primary" data-web-download>Download .md</button>
      <input class="hidden-file" type="file" accept=".md,.markdown,.mdown,.mkd,text/markdown,text/plain" data-web-file>
    </div>
  </div>

  <div class="web-toolbar" aria-label="Markdown editing toolbar">
    <div class="toolCluster">
      <select data-md-heading title="Heading">
        <option value="">Text</option>
        <option value="# ">Heading 1</option>
        <option value="## ">Heading 2</option>
        <option value="### ">Heading 3</option>
        <option value="#### ">Heading 4</option>
      </select>
      <button data-wrap="**|**" title="Bold">B</button>
      <button data-wrap="_|_" title="Italic"><i>I</i></button>
      <button data-wrap="~~|~~" title="Strikethrough">S</button>
      <button data-wrap="`|`" title="Inline code">{ }</button>
    </div>
    <div class="toolCluster">
      <button data-prefix="- " title="Bullet list">List</button>
      <button data-prefix="1. " title="Numbered list">1.</button>
      <button data-prefix="- [ ] " title="Task">Task</button>
      <button data-insert="\n- [ ] Task one\n- [ ] Task two\n" title="Checklist">Checks</button>
    </div>
    <div class="toolCluster">
      <button data-prefix="> " title="Quote">Quote</button>
      <button data-insert="\n> **Note:** Write your note here.\n" title="Callout">Note</button>
      <button data-wrap="```\n|\n```" title="Code block">Code</button>
      <button data-insert="\n---\n" title="Horizontal rule">Rule</button>
    </div>
    <div class="toolCluster">
      <button data-link title="Link">Link</button>
      <button data-image title="Image">Image</button>
      <button data-video title="Video">Video</button>
      <button data-table title="Table">Table</button>
    </div>
  </div>

  <div class="web-editor-grid">
    <textarea id="markdownInput" spellcheck="true"></textarea>
    <article id="markdownPreview" class="markdown web-preview"></article>
  </div>

  <div class="web-editor-status">
    <span data-web-mode-label>Split editor and preview</span>
    <span data-web-count>0 words / 1 line</span>
  </div>
</section>

<section class="section">
  <div class="section-head">
    <p class="eyebrow">Markdown workflows</p>
    <h2>Use the online editor for AI drafts, README files, and live preview.</h2>
  </div>
  <div class="feature-grid">
    <article><h3>Online live preview</h3><p>Preview Markdown in your browser before saving or sharing. <a href="/blog/online-markdown-editor-live-preview/">Learn online preview</a>.</p></article>
    <article><h3>AI Markdown files</h3><p>Clean up AI-generated Markdown for prompts, agents, docs, and project context. <a href="/blog/how-to-use-markdown-files-with-ai/">Use Markdown with AI</a>.</p></article>
    <article><h3>README.md</h3><p>Write project introductions that humans and AI tools can understand. <a href="/blog/what-is-readme-md/">README.md guide</a>.</p></article>
    <article><h3>AGENTS.md</h3><p>Prepare coding-agent instructions with setup, tests, and style rules. <a href="/blog/what-is-agents-md/">AGENTS.md guide</a>.</p></article>
  </div>
</section>

<script src="/assets/js/editor.js" defer></script>
<?php include __DIR__ . '/../includes/footer.php'; ?>
