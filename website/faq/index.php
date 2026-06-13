<?php
require_once __DIR__ . '/../includes/config.php';
$appName = $site['app_name'];
$title = $appName . ' FAQ - Markdown Editor Questions and Answers';
$description = 'Answers about ' . $appName . ' Markdown editor features, autosave, Windows file associations, tables, images, video embeds, and preview modes.';
$canonical = page_url('faq/');
$faqs = [
  ['Can ' . $appName . ' edit Markdown files?', 'Yes. ' . $appName . ' edits Markdown files and shows a live preview side by side or in full preview mode. It supports standard Markdown and common GitHub Flavored Markdown syntax.'],
  ['Does ' . $appName . ' support autosave?', 'Yes. Existing files autosave to their path on disk. Untitled files are saved locally as recoverable drafts until you choose Save As.'],
  ['What file types can it open?', $appName . ' opens .md, .markdown, .mdown, and .mkd files. The installer registers these types so you can open them from Windows Explorer.'],
  ['Can I rename an untitled document?', 'Yes. Click the document name in the header and type a new name before saving.'],
  ['Does the toolbar support tables and media?', 'Yes. ' . $appName . ' can insert tables, links, images, code blocks, and a safe video directive that renders in preview.'],
  ['Is ' . $appName . ' free to use?', 'Yes. ' . $appName . ' is free to download and use, and the online editor is free in the browser with no account required.'],
  ['Does ' . $appName . ' work offline?', 'Yes. The desktop app edits and saves Markdown files locally without an internet connection. Your files stay on your device.'],
  ['Is ' . $appName . ' portable or installable?', $appName . ' is provided as an installable Windows setup package that runs on Windows 10 and Windows 11.']
];
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'FAQPage',
  'mainEntity' => array_map(fn($faq) => [
    '@type' => 'Question',
    'name' => $faq[0],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]]
  ], $faqs)
];
include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero">
  <p class="eyebrow">FAQ</p>
  <h1>Questions about <?= e($appName) ?>.</h1>
  <p>Short answers for Markdown editing, preview, autosave, install, and file workflows.</p>
</section>
<section class="section faq-list">
  <?php foreach ($faqs as $faq): ?>
    <details open>
      <summary><?= e($faq[0]) ?></summary>
      <p><?= e($faq[1]) ?></p>
    </details>
  <?php endforeach; ?>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
