<?php
// SEO measurement harness - fetches rendered pages from local dev server and reports metrics.
$base = 'http://127.0.0.1:8765';
$paths = [
  '/', '/features/', '/editor/', '/download/', '/faq/', '/about/', '/privacy/', '/blog/',
  '/blog/markdown-cheat-sheet/',
  '/blog/what-is-llms-txt/',
  '/blog/ai-agent-instruction-files-explained/',
  '/blog/what-is-gemini-md/',
  '/blog/what-is-copilot-instructions-md/',
  '/blog/what-are-cursor-rules/',
  '/blog/what-are-windsurf-rules/',
  '/blog/what-is-conventions-md/',
  '/blog/what-is-skill-md/',
  '/blog/what-is-changelog-md/',
  '/blog/what-is-contributing-md/',
  '/blog/what-is-todo-md/',
  '/blog/what-is-prompts-md/',
  '/blog/what-is-api-md/',
  '/blog/why-markdown-files-matter-in-the-ai-age/',
  '/blog/best-markdown-editor-for-windows-live-preview/',
  '/blog/how-to-open-preview-edit-md-files-windows/',
  '/blog/markdown-vs-word-for-ai-documentation/',
  '/blog/online-markdown-editor-live-preview/',
  '/blog/how-to-use-markdown-files-with-ai/',
  '/blog/what-is-readme-md/',
  '/blog/what-is-agents-md/',
  '/blog/what-is-claude-md/',
  '/blog/what-is-design-md/',
  '/blog/common-md-files-for-ai-projects/',
];

function grab($html, $re) { return preg_match($re, $html, $m) ? trim(html_entity_decode($m[1], ENT_QUOTES)) : ''; }

printf("%-52s | %3s T | %3s D | %4s words | %2s h2 | %2s links\n", 'PATH', 'len', 'len', 'body', '#', 'int');
echo str_repeat('-', 110), "\n";
$rows = [];
foreach ($paths as $p) {
  $html = @file_get_contents($base . $p);
  if ($html === false) { echo "FAIL $p\n"; continue; }
  $title = grab($html, '/<title>(.*?)<\/title>/s');
  $desc  = grab($html, '/<meta name="description" content="(.*?)">/s');
  $h1    = grab($html, '/<h1[^>]*>(.*?)<\/h1>/s');
  // visible body word count: strip scripts/styles/tags
  $body = preg_replace('/<script\b[^>]*>.*?<\/script>/is', ' ', $html);
  $body = preg_replace('/<style\b[^>]*>.*?<\/style>/is', ' ', $body);
  // only count inside <main>...</main> if present
  if (preg_match('/<main\b[^>]*>(.*?)<\/main>/is', $body, $mm)) $body = $mm[1];
  $text = trim(preg_replace('/\s+/', ' ', strip_tags($body)));
  $words = $text === '' ? 0 : str_word_count($text);
  $h2 = preg_match_all('/<h2[^>]*>/i', $html);
  $intlinks = preg_match_all('/<a [^>]*href="\/(?!\/)[^"]*"/i', $html);
  $rows[] = [$p, mb_strlen($title), mb_strlen($desc), $words, $h2, $intlinks, $title, $desc, strip_tags($h1)];
  printf("%-52s | %3d T | %3d D | %4d words | %2d h2 | %2d links\n", $p, mb_strlen($title), mb_strlen($desc), $words, $h2, $intlinks);
}
echo "\n\n=== TITLES / DESCRIPTIONS (flag: T>60, D>160, D<120) ===\n";
foreach ($rows as $r) {
  $tf = $r[1] > 60 ? ' [TITLE TOO LONG]' : ($r[1] < 30 ? ' [title short]' : '');
  $df = $r[2] > 160 ? ' [DESC TOO LONG]' : ($r[2] < 120 ? ' [DESC TOO SHORT]' : '');
  echo "\n{$r[0]}\n  T({$r[1]}){$tf}: {$r[6]}\n  D({$r[2]}){$df}: {$r[7]}\n";
}
