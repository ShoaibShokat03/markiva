<?php
require_once __DIR__ . '/../includes/config.php';
$appName = $site['app_name'];
$email = $site['contact_email'];
$title = 'Terms of Service - ' . $appName;
$description = 'The terms of service for ' . $appName . ', covering acceptable use of the website, the online Markdown editor, the Windows app, disclaimers, and liability.';
$canonical = page_url('terms/');
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'WebPage',
  'name' => 'Terms of Service',
  'description' => $description,
  'url' => $canonical
];
$breadcrumbs = [
  ['name' => 'Home', 'url' => page_url('')],
  ['name' => 'Terms of Service', 'url' => $canonical]
];
include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero">
  <p class="eyebrow">Legal</p>
  <h1>Terms of Service</h1>
  <p>These terms govern your use of the <?= e($appName) ?> website, online editor, and Windows app. Last updated <?= date('F j, Y') ?>.</p>
</section>
<section class="section policy">
  <h2>1. Acceptance of terms</h2>
  <p>By accessing <?= e($appName) ?> at <?= e($site['domain']) ?>, using the online Markdown editor, or installing the Windows app, you agree to these terms. If you do not agree, please do not use the service.</p>

  <h2>2. Use of the service</h2>
  <p><?= e($appName) ?> provides a Markdown editor and previewer plus related guides. You may use it for lawful personal and commercial purposes. You agree not to misuse the service, attempt to disrupt it, or use it to create or distribute unlawful, harmful, or infringing content.</p>

  <h2>3. The online editor and your content</h2>
  <p>The online editor processes Markdown in your browser. Files you open or edit in the browser editor stay on your device unless you choose to download or share them. You keep all rights to the content you create. You are responsible for your content and for keeping your own backups.</p>

  <h2>4. The Windows app</h2>
  <p>The <?= e($appName) ?> desktop app is provided for Windows. It edits and saves files locally on your device. You are responsible for using a trusted download source and for the files you open and save with the app.</p>

  <h2>5. Intellectual property</h2>
  <p>The <?= e($appName) ?> name, website design, text, and software are owned by <?= e($site['author']) ?> or licensed to us, and are protected by applicable laws. You may not copy, resell, or redistribute the site or app except as allowed by law or with written permission. Markdown content you write remains yours.</p>

  <h2>6. Third-party links and advertising</h2>
  <p>This site may link to third-party websites and may display advertising provided by third parties such as Google AdSense. We do not control third-party sites or ads and are not responsible for their content or practices. Your use of third-party services is subject to their own terms and policies. See our <a href="/privacy/">privacy policy</a> for how advertising cookies are handled.</p>

  <h2>7. Disclaimer of warranties</h2>
  <p>The service is provided "as is" and "as available" without warranties of any kind, whether express or implied, including fitness for a particular purpose and non-infringement. We do not warrant that the service will be uninterrupted, error free, or free of harmful components.</p>

  <h2>8. Limitation of liability</h2>
  <p>To the maximum extent permitted by law, <?= e($appName) ?> and its author will not be liable for any indirect, incidental, or consequential damages, or for loss of data or profits, arising from your use of or inability to use the service. Because the editor and app work with your files, you are responsible for keeping backups.</p>

  <h2>9. Changes to these terms</h2>
  <p>We may update these terms from time to time. We will revise the date at the top of this page when we do. Continued use of the service after changes means you accept the updated terms.</p>

  <h2>10. Contact</h2>
  <p>If you have questions about these terms, contact us at <a href="mailto:<?= e($email) ?>"><?= e($email) ?></a> or through our <a href="/contact/">contact page</a>.</p>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
