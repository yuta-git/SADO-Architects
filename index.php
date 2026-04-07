<?php get_header(); ?>

<main class="l-main">
  <!-- KV -->
  <section class="p-kv">
    <div class="p-kv__head">
      <div class="p-kv__text">
        <h1 class="p-kv__title">
          <span class="p-kv__subtitle">佐渡建築設計スタジオ</span>
          SADO Architects
        </h1>
      </div>
      <figure class="p-kv__illust" aria-hidden="true">
        <img
          src="<?php echo get_template_directory_uri(); ?>/img/home/KV_Illust.svg"
          alt=""
          width="293"
          height="154" />
      </figure>
    </div>
    <figure class="p-kv__image">
      <img
        src="<?php echo get_template_directory_uri(); ?>/img/home/home_kv01@2x.webp"
        alt="SADO Architects"
        width="700"
        height="310"
        loading="eager" />
    </figure>
  </section>

  <!-- About -->
  <section class="p-about">
    <div class="p-about__inner">
      <div class="p-about__content">
        <h2 class="p-about__title c-section-title">ABOUT US</h2>
        <p class="p-about__text">
          日本では昔から安らぎと温かみのある木組みの家が愛されてきました。庭度の高い日本の気候と上手につきあい、住まいの居心地を整えてくれる、木組みの家。その魅力を最大限に引き出すために、私たちは、選りすぐりの自然素材のみを使用します。長く愛される、美しい木組の家を建てることが、私たち佐渡建築設計スタジオの仕事です。
        </p>
      </div>
      <figure class="p-about__image">
        <img
          src="<?php echo get_template_directory_uri(); ?>/img/home/home_about@2x.webp"
          alt="About SADO Architects"
          width="500"
          height="332"
          loading="lazy" />
      </figure>
      <!-- ボタン：PCは content 列の2行目、SPは画像の下 -->
      <div class="p-about__more">
        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="c-btn">MORE</a>
      </div>
    </div>
  </section>

  <!-- Works -->
  <section class="p-works">
    <div class="p-works__inner l-section-inner">
      <h2 class="p-works__title c-section-title">WORKS</h2>
      <ul class="p-works__list">
        <?php
        $args = array(
          'post_type' => 'works',
          'posts_per_page' => 2,
        );

        $works = new WP_Query($args);

        if ($works->have_posts()) :
          while ($works->have_posts()) :
            $works->the_post();
        ?>
            <li class="p-works__item">
              <a href="<?php the_permalink(); ?>" class="p-works__link">
                <figure class="p-works__image">
                  <?php
                  if (has_post_thumbnail()) :
                    the_post_thumbnail('post-thumbnail');
                  else :
                    echo '<img src="' . get_template_directory_uri() . '/img/home/work01@2x.webp" alt="古民家再生" width="500" height="332" loading="lazy" />';
                  endif;
                  ?>
                </figure>
                <div class="p-works__body">
                  <p class="p-works__category">
                    <?php
                    $terms = get_the_terms($post->ID, 'workscat');
                    foreach ($terms as $term) {
                      echo $term->name;
                    }
                    ?>
                  </p>
                  <p class="p-works__text">
                    <?php the_title(); ?>
                  </p>
                  <time datetime="2026-01-01" class="p-works__date"><?php the_time('Y.m.d'); ?></time>
                </div>
              </a>
            </li>
        <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </ul>
      <div class="p-works__more">
        <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="c-btn">MORE</a>
      </div>
    </div>
  </section>

  <!-- Member -->
  <section class="p-member">
    <div class="l-section-inner">
      <h2 class="p-member__title c-section-title">MEMBER</h2>
    </div>
    <div class="p-member__slider">
      <div class="p-member__track">
        <ul class="p-member__list js-member-list">
          <li class="p-member__item">
            <figure class="p-member__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/home/member_Illust01@2x.webp"
                alt="Taro Sado"
                width="180"
                height="200"
                loading="lazy" />
            </figure>
            <p class="p-member__role">CEO</p>
            <p class="p-member__name">Taro Sado</p>
          </li>
          <li class="p-member__item">
            <figure class="p-member__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/home/member_Illust02@2x.webp"
                alt="Ichiko Yamada"
                width="180"
                height="200"
                loading="lazy" />
            </figure>
            <p class="p-member__role">一級建築士</p>
            <p class="p-member__name">Ichiko Yamada</p>
          </li>
          <li class="p-member__item">
            <figure class="p-member__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/home/member_Illust03@2x.webp"
                alt="Jiro Tanaka"
                width="180"
                height="200"
                loading="lazy" />
            </figure>
            <p class="p-member__role">一級建築士</p>
            <p class="p-member__name">Jiro Tanaka</p>
          </li>
          <li class="p-member__item">
            <figure class="p-member__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/home/member_Illust04@2x.webp"
                alt="Yuto Sakai"
                width="180"
                height="200"
                loading="lazy" />
            </figure>
            <p class="p-member__role">一級建築士</p>
            <p class="p-member__name">Yuto Sakai</p>
          </li>
          <li class="p-member__item">
            <figure class="p-member__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/home/member_Illust05@2x.webp"
                alt="Hime Nakata"
                width="180"
                height="200"
                loading="lazy" />
            </figure>
            <p class="p-member__role">二級建築士</p>
            <p class="p-member__name">Hime Nakata</p>
          </li>
          <li class="p-member__item">
            <figure class="p-member__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/home/member_Illust06@2x.webp"
                alt="Kenji Sato"
                width="180"
                height="200"
                loading="lazy" />
            </figure>
            <p class="p-member__role">一級建築士</p>
            <p class="p-member__name">Kenji Sato</p>
          </li>
          <li class="p-member__item">
            <figure class="p-member__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/home/member_Illust07@2x.webp"
                alt="Yuki Abe"
                width="180"
                height="200"
                loading="lazy" />
            </figure>
            <p class="p-member__role">二級建築士</p>
            <p class="p-member__name">Yuki Abe</p>
          </li>
        </ul>
      </div>
      <button
        class="p-member__btn js-member-next"></button>
    </div>
    <div class="l-section-inner">
      <div class="p-member__more">
        <a href="<?php echo esc_url( home_url( '/member/' ) ); ?>" class="c-btn">MORE</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>