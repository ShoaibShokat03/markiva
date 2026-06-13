<?php
require_once __DIR__ . '/../includes/config.php';
$appName = $site['app_name'];
$title = 'About ' . $appName . ' - Compact Markdown Editor for Windows';
$description = 'Learn about ' . $appName . ', a compact Windows Markdown editor designed for fast editing, live preview, autosave, and open-with file workflows.';
$canonical = page_url('about/');
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'AboutPage',
  'name' => 'About ' . $appName,
  'description' => $description,
  'url' => $canonical
];
include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero">
  <p class="eyebrow">About</p>
  <h1>A focused Markdown app with a compact desktop feel.</h1>
  <p><?= e($appName) ?> is built for people who need to open, read, edit, and save Markdown without a bulky writing environment.</p>
</section>
<section class="section split-text">
  <div><h2>Why <?= e($appName) ?> exists</h2><p>Markdown files are everywhere: project notes, documentation, changelogs, readmes, release plans, prompts, and drafts. Heavy writing apps feel like too much for a quick `.md` file, and plain Notepad shows no formatting. <?= e($appName) ?> sits in between, giving those files a quick native-feeling editor and live preview workflow on Windows.</p></div>
  <div><h2>Design direction</h2><p>The interface mirrors the app itself: compact, structured, light in motion, and direct. Tools stay visible without taking over the document, so the content is always the focus.</p></div>
</section>
<section class="section split-text">
  <div><h2>Who it is for</h2><p>Developers, writers, and AI users who work with Markdown daily: editing <a href="/blog/what-is-readme-md/">README.md</a> files, drafting <a href="/blog/how-to-use-markdown-files-with-ai/">AI documentation and prompts</a>, reviewing notes, or previewing tables and code before sharing.</p></div>
  <div><h2>What you can do</h2><p>Open and edit local files on Windows, preview Markdown live, autosave your work, and insert tables, links, images, and code. Try the <a href="/editor/">online editor</a> in the browser or <a href="/download/">download the Windows app</a>.</p></div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
