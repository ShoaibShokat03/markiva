<?php
require_once __DIR__ . '/config.php';

$title = $title ?? $site['app_name'] . ' - ' . $site['tagline'];
$description = $description ?? $site['description'];
$canonical = $canonical ?? page_url(trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/'));
$schema = $schema ?? [];
$bodyClass = $bodyClass ?? '';

// Sitewide Organization + WebSite schema (rendered on every page for knowledge-graph signals).
$globalSchema = [
  '@context' => 'https://schema.org',
  '@graph' => [
    [
      '@type' => 'Organization',
      '@id' => page_url('') . '#organization',
      'name' => $site['app_name'],
      'url' => page_url(''),
      'logo' => page_url(ltrim($site['logo_url'], '/')),
      'description' => $site['description'],
      'founder' => ['@type' => 'Person', 'name' => $site['author']]
    ],
    [
      '@type' => 'WebSite',
      '@id' => page_url('') . '#website',
      'name' => $site['app_name'],
      'url' => page_url(''),
      'publisher' => ['@id' => page_url('') . '#organization'],
      'inLanguage' => 'en'
    ]
  ]
];

// Optional per-page breadcrumb trail: pages may set $breadcrumbs = [['name'=>..,'url'=>..], ...].
$breadcrumbs = $breadcrumbs ?? [];
if (!empty($breadcrumbs)) {
  $globalSchema['@graph'][] = [
    '@type' => 'BreadcrumbList',
    'itemListElement' => array_map(fn($crumb, $i) => [
      '@type' => 'ListItem',
      'position' => $i + 1,
      'name' => $crumb['name'],
      'item' => $crumb['url']
    ], $breadcrumbs, array_keys($breadcrumbs))
  ];
}
?>
<!doctype html>
<html lang="en">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NRDJ1ZFD40"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NRDJ1ZFD40');
</script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($title) ?></title>
  <meta name="description" content="<?= e($description) ?>">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <link rel="canonical" href="<?= e($canonical) ?>">
  <meta name="theme-color" content="#20252b">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e($site['app_name']) ?>">
  <meta property="og:title" content="<?= e($title) ?>">
  <meta property="og:description" content="<?= e($description) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
  <meta property="og:image" content="<?= e(page_url(ltrim($site['og_image_url'], '/'))) ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($title) ?>">
  <meta name="twitter:description" content="<?= e($description) ?>">
  <link rel="icon" type="image/svg+xml" href="<?= e($site['icon_url']) ?>">
  <?php $cssVer = @filemtime(__DIR__ . '/../assets/css/styles.css') ?: '1'; ?>
  <link rel="preload" href="/assets/css/styles.css?v=<?= $cssVer ?>" as="style">
  <link rel="stylesheet" href="/assets/css/styles.css?v=<?= $cssVer ?>">
  <script type="application/ld+json">
<?= json_encode($globalSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
  </script>
<?php if (!empty($schema)): ?>
  <script type="application/ld+json">
<?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
  </script>
<?php endif; ?>
</head>
<body class="<?= e($bodyClass) ?>">
  <header class="site-header">
    <a class="brand" href="/" aria-label="<?= e($site['app_name']) ?> home">
      <img src="<?= e($site['logo_url']) ?>" width="40" height="40" alt="">
      <span>
        <strong><?= e($site['app_name']) ?></strong>
        <small>Markdown editor</small>
      </span>
    </a>
    <nav id="siteNav" class="nav" aria-label="Primary navigation">
      <a class="<?= is_current('') ? 'active' : '' ?>" href="/">Home</a>
      <a class="<?= is_current('features') ? 'active' : '' ?>" href="/features/">Features</a>
      <a class="<?= is_current('editor') ? 'active' : '' ?>" href="/editor/">Editor</a>
      <a class="<?= is_current('download') ? 'active' : '' ?>" href="/download/">Download</a>
      <a class="<?= is_section('blog') ? 'active' : '' ?>" href="/blog/">Blog</a>
      <a class="<?= is_current('faq') ? 'active' : '' ?>" href="/faq/">FAQ</a>
      <a class="<?= is_current('about') ? 'active' : '' ?>" href="/about/">About</a>
    </nav>
    <a class="header-cta" href="/editor/">Try editor</a>
    <button class="menu-toggle" type="button" aria-controls="siteNav" aria-expanded="false" aria-label="Open menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <button class="nav-backdrop" type="button" aria-label="Close menu"></button>
  </header>
  <main>
