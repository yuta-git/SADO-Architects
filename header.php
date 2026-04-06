<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/common/favicon.ico" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Noto+Sans+JP:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <?php wp_head(); ?>
  </head>
  <body>
    <?php get_sidebar(); ?>

    <header class="l-header">
      <div class="l-header__inner">
        <div class="l-header__title">
          <a href="<?php echo home_url('/'); ?>">
            <img
              src="<?php echo get_template_directory_uri(); ?>/img/common/logo_b_pc.svg"
              alt="SADO Architects"
              width="120"
              height="38"
              loading="lazy"
            />
          </a>
        </div>
        <nav class="l-header__nav js-nav">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'global',
              'depth'            => 1,
              'container'        => false,
              'menu_class'       => 'l-header__nav__list',
              'fallback_cb'      => false,
            )
          );
          ?>
          <div class="l-header__nav__footer">
            <ul class="l-header__nav__sns">
              <li class="l-header__nav__sns-item">
                <a
                  href="#"
                  class="l-header__nav__sns-link"
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/img/common/Icon_twitter.svg"
                    alt="Twitter"
                    width="28"
                    height="28"
                  />
                </a>
              </li>
              <li class="l-header__nav__sns-item">
                <a
                  href="#"
                  class="l-header__nav__sns-link"
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/img/common/Icon_instagram.svg"
                    alt="Instagram"
                    width="28"
                    height="28"
                  />
                </a>
              </li>
              <li class="l-header__nav__sns-item">
                <a
                  href="#"
                  class="l-header__nav__sns-link"
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/img/common/Icon_facebook.svg"
                    alt="Facebook"
                    width="28"
                    height="28"
                  />
                </a>
              </li>
            </ul>
            <p class="l-header__nav__copyright">©2024 SADO Architects</p>
          </div>
        </nav>
        <button
          class="l-header__hamburger js-hamburger"
          aria-expanded="false"
          aria-controls="global-nav"
        >
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </header>