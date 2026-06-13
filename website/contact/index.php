<?php
require_once __DIR__ . '/../includes/config.php';
$appName = $site['app_name'];
$email = $site['contact_email'];
$title = 'Contact ' . $appName . ' - Get in Touch';
$description = 'Contact the ' . $appName . ' team with questions, feedback, bug reports, or partnership requests. We read every message and reply as soon as we can.';
$canonical = page_url('contact/');
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'ContactPage',
  'name' => 'Contact ' . $appName,
  'description' => $description,
  'url' => $canonical
];
$breadcrumbs = [
  ['name' => 'Home', 'url' => page_url('')],
  ['name' => 'Contact', 'url' => $canonical]
];
include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero">
  <p class="eyebrow">Contact</p>
  <h1>Get in touch with <?= e($appName) ?>.</h1>
  <p>Questions, feedback, bug reports, or a partnership idea? We would love to hear from you and read every message.</p>
</section>
<section class="section split-text">
  <div>
    <h2>Email us</h2>
    <p>The fastest way to reach us is by email. Write to <a href="mailto:<?= e($email) ?>"><?= e($email) ?></a> and we will reply as soon as we can, usually within a few business days.</p>
    <p><a class="btn primary" href="mailto:<?= e($email) ?>">Email <?= e($appName) ?></a></p>
  </div>
  <div>
    <h2>What to include</h2>
    <p>To help us respond quickly, please include:</p>
    <ul>
      <li>A clear subject line</li>
      <li>What you were trying to do</li>
      <li>Your Windows version, if the message is about the desktop app</li>
      <li>Steps to reproduce, for a bug report</li>
    </ul>
  </div>
</section>
<section class="section split-text">
  <div>
    <h2>Common questions</h2>
    <p>Many answers are already covered in our <a href="/faq/">FAQ</a> and our <a href="/blog/">Markdown guides</a>. You can also try the product directly with the <a href="/editor/">online editor</a> or <a href="/download/">download for Windows</a>.</p>
  </div>
  <div>
    <h2>About this site</h2>
    <p><?= e($appName) ?> is an independent project by <?= e($site['author']) ?>. Learn more on the <a href="/about/">about page</a>, or review our <a href="/privacy/">privacy policy</a> and <a href="/terms/">terms of service</a>.</p>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
