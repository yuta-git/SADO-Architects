<?php get_header(); ?>

<main class="l-main">
  <section class="p-news-detail">
    <div class="p-news-detail__inner l-container">
      <h1 class="p-news-detail__title c-section-title">NEWS</h1>

      <article class="p-news-detail__article">
        <h2 class="p-news-detail__headline">
          【見学会】「無垢材の色と素材感をそのまま生かした平家の家。」の完成見学会を開催いたします。
        </h2>
        <time datetime="2026-04-01" class="p-news-detail__date">20XX.mo.day</time>

        <div class="p-news-detail__content">
          <p>
            新築戸建「無垢材の色と素材感をそのまま生かした平家の家。」の完成を記念して、見学会を開催いたします。無垢材の色と素材感をそのまま生かした平家の家。リビングを中心にした間取りで、どこにいても家族の気配に安心できる、そんな住まいに仕上げました。新潟県佐渡市をご検討の方も、リフォームの参考にしたい方も、お気軽にご連絡ください。
          </p>
          <p>
            また、スペースに限りがあるため、ご来場の際はご予約をお願いしております。予約多数の場合は抽選になります。ご了承ください。
          </p>
        </div>

        <dl class="p-news-detail__meta">
          <div class="p-news-detail__meta-row">
            <dt>日程：</dt>
            <dd>20XX年00月00日(祝)、00日(土)、00日(日)</dd>
          </div>
          <div class="p-news-detail__meta-row">
            <dt>時間：</dt>
            <dd>13時〜17時(最終受付)</dd>
          </div>
          <div class="p-news-detail__meta-row">
            <dt>予約：</dt>
            <dd>メールまたはお電話にて　※お電話での予約受付は、10:00〜18:00となっております。</dd>
          </div>
          <div class="p-news-detail__meta-row">
            <dt>場所：</dt>
            <dd>〒123-4567 新潟県佐渡市○○○○○○○</dd>
          </div>
        </dl>

        <div class="p-news-detail__images">
          <figure class="p-news-detail__image">
            <img
              src="<?php echo get_template_directory_uri(); ?>/img/home/work01@2x.webp"
              alt="見学会会場の外観"
              width="560"
              height="350"
              loading="lazy" />
          </figure>
          <figure class="p-news-detail__image">
            <img
              src="<?php echo get_template_directory_uri(); ?>/img/home/work02@2x.webp"
              alt="見学会会場の内観"
              width="560"
              height="350"
              loading="lazy" />
          </figure>
        </div>

        <nav class="c-pager" aria-label="ニュース詳細ページ送り">
          <a href="news-detail.html" class="c-pager__link c-pager__link--prev">
            <span class="c-pager__arrow">←</span> BACK
          </a>
          <a href="news.html" class="c-pager__link c-pager__link--all">ALL</a>
          <a href="#" class="c-pager__link c-pager__link--next">
            NEXT <span class="c-pager__arrow">→</span>
          </a>
        </nav>
      </article>
    </div>
  </section>
</main>

<?php get_footer(); ?>