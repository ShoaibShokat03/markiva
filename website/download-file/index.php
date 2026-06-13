<?php
require_once __DIR__ . '/../includes/config.php';

$fileName = $site['setup_download_file'];
$downloadPath = realpath(__DIR__ . '/../downloads/' . $fileName);
$downloadsDir = realpath(__DIR__ . '/../downloads');

if (!$downloadPath || !$downloadsDir || !str_starts_with($downloadPath, $downloadsDir) || !is_file($downloadPath)) {
  http_response_code(404);
  header('Content-Type: text/plain; charset=utf-8');
  echo 'Download file was not found.';
  exit;
}

function track_download($statsPath, $fileName) {
  $dir = dirname($statsPath);
  if (!is_dir($dir)) {
    mkdir($dir, 0775, true);
  }

  $handle = fopen($statsPath, 'c+');
  if (!$handle) {
    return;
  }

  if (flock($handle, LOCK_EX)) {
    rewind($handle);
    $raw = stream_get_contents($handle);
    $stats = json_decode($raw ?: '{}', true);
    if (!is_array($stats)) {
      $stats = [];
    }

    $now = gmdate('c');
    $today = gmdate('Y-m-d');
    $stats['total_downloads'] = (int)($stats['total_downloads'] ?? 0) + 1;
    $stats['last_downloaded_at'] = $now;
    $stats['files'] = is_array($stats['files'] ?? null) ? $stats['files'] : [];
    $stats['files'][$fileName] = is_array($stats['files'][$fileName] ?? null) ? $stats['files'][$fileName] : [];
    $stats['files'][$fileName]['downloads'] = (int)($stats['files'][$fileName]['downloads'] ?? 0) + 1;
    $stats['files'][$fileName]['last_downloaded_at'] = $now;
    $stats['daily'] = is_array($stats['daily'] ?? null) ? $stats['daily'] : [];
    $stats['daily'][$today] = (int)($stats['daily'][$today] ?? 0) + 1;

    rewind($handle);
    ftruncate($handle, 0);
    fwrite($handle, json_encode($stats, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
    fflush($handle);
    flock($handle, LOCK_UN);
  }

  fclose($handle);
}

track_download($site['download_stats_file'], $fileName);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . rawurlencode($fileName) . '"');
header('Content-Length: ' . filesize($downloadPath));
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
readfile($downloadPath);
exit;
