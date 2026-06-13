<?php
$appName = $site['app_name'];
$title = $article['seo_title'];
$description = $article['description'];
$canonical = page_url('blog/' . $article['slug'] . '/');
$faqs = $article['faqs'] ?? [];
$breadcrumbs = [
  ['name' => 'Home', 'url' => page_url('')],
  ['name' => 'Blog', 'url' => page_url('blog/')],
  ['name' => $article['title'], 'url' => $canonical]
];
$schema = [
  '@context' => 'https://schema.org',
  '@graph' => [
    [
      '@type' => 'BlogPosting',
      'headline' => $article['title'],
      'description' => $description,
      'datePublished' => $article['date'],
      'dateModified' => $article['date'],
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
include __DIR__ . '/header.php';
?>

<article class="article">
  <nav class="breadcrumbs" aria-label="Breadcrumb">
    <a href="/">Home</a> <span aria-hidden="true">/</span>
    <a href="/blog/">Blog</a> <span aria-hidden="true">/</span>
    <span><?= e($article['title']) ?></span>
  </nav>
  <header class="article-head">
    <p class="eyebrow"><?= e($article['eyebrow']) ?></p>
    <h1><?= e($article['h1']) ?></h1>
    <p class="lead"><?= e($article['lead']) ?></p>
    <div class="article-meta"><?= e(date('M j, Y', strtotime($article['date']))) ?> · <?= e($article['reading_time']) ?></div>
  </header>

  <?php foreach ($article['sections'] as $section): ?>
    <h2><?= e($section['heading']) ?></h2>
    <?= $section['body'] ?>
  <?php endforeach; ?>

  <?php if (!empty($article['sources'])): ?>
    <h2>Related references</h2>
    <ul>
      <?php foreach ($article['sources'] as $source): ?>
        <li><a href="<?= e($source['url']) ?>"><?= e($source['label']) ?></a><?= !empty($source['note']) ? ' ' . e($source['note']) : '' ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <?php if ($faqs): ?>
    <section class="faq-list article-faq">
      <h2>FAQ</h2>
      <?php foreach ($faqs as $faq): ?>
        <details>
          <summary><?= e($faq[0]) ?></summary>
          <p><?= e($faq[1]) ?></p>
        </details>
      <?php endforeach; ?>
    </section>
  <?php endif; ?>
</article>

<?php include __DIR__ . '/footer.php'; ?>
