<?php
$site = [
  'app_name' => 'Markdown Docs',
  'name' => 'Markdown Docs',
  'tagline' => 'Fast Markdown editor and previewer for Windows',
  'domain' => 'markdowndocs.online',
  'url' => 'https://markdowndocs.online',
  'description' => 'Markdown Docs is a compact Windows Markdown editor and viewer with live preview, autosave, full editing toolbar, open-with support, and an installable desktop setup.',
  'setup_download_url' => '/download-file/',
  'setup_direct_download_url' => '/downloads/extract-makrdowndocs-setup.bat',
  'setup_download_file' => 'extract-makrdowndocs-setup.bat',
  'setup_download_text' => 'Download Markdown Docs',
  'download' => '/download-file/',
  'download_stats_file' => __DIR__ . '/../data/downloads.json',
  'version' => '1.0.0',
  'author' => 'Muhammad Shoaib',
  'contact_email' => 'contact@markdowndocs.online',
  'logo_url' => '/assets/img/markiva-logo.svg',
  'icon_url' => '/favicon.svg',
  'og_image_url' => '/assets/img/markiva-og.svg',
  'logo' => '/assets/img/markiva-logo.svg',
];

function e($value) {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function page_url($path = '') {
  global $site;
  return rtrim($site['url'], '/') . '/' . ltrim($path, '/');
}

function is_current($path) {
  $current = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
  return trim($path, '/') === $current;
}

function is_section($path) {
  $current = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
  $path = trim($path, '/');
  return $current === $path || strpos($current, $path . '/') === 0;
}
