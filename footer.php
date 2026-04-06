<!-- Footer -->
<footer class="l-footer">
      <div class="l-footer__inner">
        <!-- Left: ロゴ -->
        <a href="/" class="l-footer__logo">
          <img
            src="<?php echo get_template_directory_uri(); ?>/img/common/logo_w.svg"
            alt="SADO ARCHITECTURE"
            width="140"
            height="50"
            loading="lazy"
          />
        </a>

        <!-- Center: キャッチ + CONTACTボタン -->
        <div class="l-footer__contact">
          <p class="l-footer__catch">お気軽にお問い合わせください</p>
          <a href="contact.html" class="c-btn c-btn--white">CONTACT</a>
        </div>

        <!-- Right: ナビ -->
        <nav class="l-footer__nav" aria-label="フッターナビゲーション">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer',
              'depth'            => 1,
              'container'        => false,
              'menu_class'       => 'l-footer__nav-list',
              'fallback_cb'      => false,
            )
          );
          ?>
        </nav>
      </div>
    </footer>

    <!-- Page top button -->
    <button
      class="c-page-top js-page-top"
      aria-label="ページの先頭へ戻る"
    ></button>

    <?php wp_footer(); ?>
  </body>
</html>