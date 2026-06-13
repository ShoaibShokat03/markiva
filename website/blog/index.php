<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/blog-data.php';

$appName = $site['app_name'];
$title = 'Markdown Docs Blog - Markdown, .md Files, and AI Docs';
$description = 'Read Markdown Docs guides about .md files, Markdown editors for Windows, live preview, AI documentation, and Markdown workflows.';
$canonical = page_url('blog/');
$schema = [
  '@context' => 'https://schema.org',
  '@graph' => [
    [
      '@type' => 'Blog',
      'name' => 'Markdown Docs Blog',
      'description' => $description,
      'url' => $canonical,
      'publisher' => ['@type' => 'Organization', 'name' => $appName]
    ],
    [
      '@type' => 'ItemList',
      'itemListElement' => array_map(fn($post, $index) => [
        '@type' => 'ListItem',
        'position' => $index + 1,
        'url' => page_url('blog/' . $post['slug'] . '/'),
        'name' => $post['title']
      ], $blogPosts, array_keys($blogPosts))
    ]
  ]
];
include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero blog-hero">
  <p class="eyebrow">Markdown guides</p>
  <h1>Markdown files, editors, and AI-ready documentation.</h1>
  <p>Guides for opening `.md` files, choosing a Markdown editor for Windows, building AI-readable docs, and using <?= e($appName) ?> for fast local editing.</p>
  <div class="actions">
    <a class="btn primary" href="/editor/">Try the online editor</a>
    <a class="btn" href="/download/">Download for Windows</a>
  </div>
</section>

<section class="section blog-search-section" aria-label="Search articles">
  <form class="blog-search" role="search" onsubmit="return false;">
    <svg class="blog-search-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
      <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
      <line x1="16.5" y1="16.5" x2="21" y2="21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
    </svg>
    <input type="search" id="blogSearch" class="blog-search-input" placeholder="Search guides, .md files, AI agent topics..." aria-label="Search blog posts" autocomplete="off" data-blog-total="<?= count($blogPosts) ?>">
    <button type="button" class="blog-search-clear" data-blog-clear aria-label="Clear search" hidden>&times;</button>
  </form>
  <p class="blog-search-count" data-blog-count aria-live="polite" hidden></p>
</section>

<section class="section blog-grid" aria-label="Markdown Docs articles">
  <?php foreach ($blogPosts as $post): ?>
    <article class="blog-card" data-search="<?= e(strtolower($post['title'] . ' ' . $post['excerpt'] . ' ' . $post['primary_keyword'])) ?>">
      <p class="eyebrow"><?= e($post['primary_keyword']) ?></p>
      <h2><a href="/blog/<?= e($post['slug']) ?>/"><?= e($post['title']) ?></a></h2>
      <p><?= e($post['excerpt']) ?></p>
      <div class="blog-card-foot">
        <span><?= e(date('M j, Y', strtotime($post['date']))) ?> · <?= e($post['reading_time']) ?></span>
        <a class="btn small-btn" href="/blog/<?= e($post['slug']) ?>/">View</a>
      </div>
    </article>
  <?php endforeach; ?>
  <p class="blog-search-empty" data-blog-empty hidden>No guides match your search. Try another keyword like "AGENTS.md", "cheat sheet", or "Windows".</p>
</section>

<section class="band">
  <div>
    <h2>Need a Markdown editor right now?</h2>
    <p>Use the browser editor for quick previews, or install <?= e($appName) ?> to open `.md` files directly from Windows.</p>
  </div>
  <a class="btn primary" href="/download/">Get Markdown Docs</a>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
