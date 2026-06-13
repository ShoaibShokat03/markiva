  </main>
  <footer class="site-footer">
    <div class="footer-card footer-summary">
      <a class="footer-brand" href="/">
        <img src="<?= e($site['logo_url']) ?>" width="30" height="30" alt="">
        <strong><?= e($site['app_name']) ?></strong>
      </a>
      <p>Compact Markdown editing, preview, and file-open workflow for Windows.</p>
    </div>
    <div class="footer-card">
      <strong>Product</strong>
      <nav aria-label="Footer product navigation">
        <a href="/features/">Features</a>
        <a href="/editor/">Online editor</a>
        <a href="/download/">Download</a>
        <a href="/blog/">Blog</a>
      </nav>
    </div>
    <div class="footer-card">
      <strong>Resources</strong>
      <nav aria-label="Footer resource navigation">
        <a href="/faq/">FAQ</a>
        <a href="/about/">About</a>
        <a href="/contact/">Contact</a>
        <a href="/privacy/">Privacy</a>
        <a href="/terms/">Terms</a>
      </nav>
    </div>
    <p class="copyright">Copyright &copy; <?= date('Y') ?> <?= e($site['app_name']) ?>. All rights reserved.</p>
  </footer>
  <?php $jsVer = @filemtime(__DIR__ . '/../assets/js/site.js') ?: '1'; ?>
  <script src="/assets/js/site.js?v=<?= $jsVer ?>" defer></script>
</body>
</html>
