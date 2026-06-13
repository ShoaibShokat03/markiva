<?php
require_once __DIR__ . '/../includes/config.php';
$appName = $site['app_name'];
$email = $site['contact_email'];
$title = $appName . ' Privacy Policy - Cookies and Data';
$description = 'Privacy policy for ' . $appName . ': what data we collect, how cookies and Google Analytics are used, how Google AdSense advertising works, and your choices.';
$canonical = page_url('privacy/');
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'WebPage',
  'name' => $appName . ' Privacy Policy',
  'description' => $description,
  'url' => $canonical
];
$breadcrumbs = [
  ['name' => 'Home', 'url' => page_url('')],
  ['name' => 'Privacy Policy', 'url' => $canonical]
];
include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero">
  <p class="eyebrow">Privacy</p>
  <h1>Privacy Policy</h1>
  <p>This policy explains what information <?= e($appName) ?> collects, how cookies and advertising work on this site, and the choices you have. Last updated <?= date('F j, Y') ?>.</p>
</section>
<section class="section policy">
  <h2>Overview</h2>
  <p><?= e($appName) ?> is a Markdown editor and previewer with a desktop app and an online editor. We aim to collect as little personal data as possible. This website is informational and supported in part by advertising. This page describes the data practices for the website at <?= e($site['domain']) ?>.</p>

  <h2>Your Markdown files stay local</h2>
  <p>The online editor processes Markdown in your browser. Files you open or edit there stay on your device and are not uploaded to our servers unless you choose to download or share them. The Windows app opens and saves files locally, and untitled drafts are stored on your own device for recovery. We do not require an account, and we do not collect the contents of your documents.</p>

  <h2>Information we collect</h2>
  <ul>
    <li><strong>Usage data:</strong> like most websites, our hosting may record standard server log data such as IP address, browser type, referring page, and the time of your visit.</li>
    <li><strong>Analytics data:</strong> we use Google Analytics to understand how visitors use the site, in aggregate.</li>
    <li><strong>Local storage:</strong> the online editor may use your browser's local storage to keep a draft on your device. This stays in your browser and is not sent to us.</li>
  </ul>
  <p>We do not ask for your name, address, or payment details on this website.</p>

  <h2>Cookies</h2>
  <p>Cookies are small files stored on your device. This site and its partners use cookies to measure traffic and to serve and personalize advertising. You can control or delete cookies through your browser settings. Blocking some cookies may affect how parts of the site work.</p>

  <h2>Google Analytics</h2>
  <p>We use Google Analytics, a service provided by Google, to collect anonymous, aggregated statistics about site usage. Google Analytics uses cookies to help analyze how visitors use the site. You can opt out using the <a href="https://tools.google.com/dlpage/gaoptout" rel="nofollow noopener" target="_blank">Google Analytics Opt-out Browser Add-on</a>.</p>

  <h2>Advertising and Google AdSense</h2>
  <p>This site may display advertising served by Google, including through Google AdSense. Third-party vendors, including Google, use cookies to serve ads based on your prior visits to this and other websites.</p>
  <ul>
    <li>Google's use of advertising cookies enables it and its partners to serve ads to you based on your visit to this site and other sites on the internet.</li>
    <li>You may opt out of personalized advertising by visiting <a href="https://www.google.com/settings/ads" rel="nofollow noopener" target="_blank">Google Ads Settings</a>.</li>
    <li>You can opt out of third-party vendor cookies for personalized advertising at <a href="https://www.aboutads.info/choices/" rel="nofollow noopener" target="_blank">aboutads.info/choices</a>.</li>
    <li>Third-party vendors and ad networks may also use cookies under their own privacy policies.</li>
  </ul>
  <p>If you are in a region that requires consent for advertising cookies, we rely on a consent mechanism to ask for your choice before non-essential cookies are set.</p>

  <h2>Website downloads</h2>
  <p>The website provides a setup installer for the Windows app. We keep a basic count of downloads for our own statistics. This count does not identify individual users.</p>

  <h2>Third-party links</h2>
  <p>Our guides link to third-party websites such as documentation and reference sites. We are not responsible for the privacy practices of those sites. Please review their policies when you visit them.</p>

  <h2>Children's privacy</h2>
  <p>This site is not directed to children under 13, and we do not knowingly collect personal information from children.</p>

  <h2>Your choices</h2>
  <p>You can manage cookies and advertising through your browser settings and the opt-out links above. You can also use the desktop app, which works offline and keeps your files on your device.</p>

  <h2>Changes to this policy</h2>
  <p>We may update this policy from time to time. We will update the date at the top of this page when we do. Continued use of the site after changes means you accept the updated policy.</p>

  <h2>Contact</h2>
  <p>If you have questions about this privacy policy, contact us at <a href="mailto:<?= e($email) ?>"><?= e($email) ?></a> or through our <a href="/contact/">contact page</a>.</p>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
