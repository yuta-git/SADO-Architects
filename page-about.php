<?php get_header(); ?>

<main class="l-main">
  <!-- About page main content -->
  <section class="p-about-page">
    <div class="p-about-page__inner l-container">
      <!-- Col 1 / Row 1: テキストコンテンツ -->
      <div class="p-about-page__content">
        <h1 class="p-about-page__title">ABOUT US</h1>
        <p class="p-about-page__text">
          美しい木組みの家。そのために、まず必要なのは本物の自然素材。私たち佐渡建築設計スタジオでは、私たちは自ら山に入り木を選ぶところから家づくりを始めます。素性がわかる素材を使用することは、住まい手の健康や暮らしやすさ、さらにはメンテナンスのしやすさにも繋がります。私たち佐渡建築設計スタジオは、年を経るごとに美しさと深みを増す、美しい木組の家をつくります。
        </p>
      </div>

      <!-- Col 2 / Row 1: 画像 -->
      <figure class="p-about-page__image">
        <img
          src="<?php echo get_template_directory_uri(); ?>/img/about/about_kv@2x.webp"
          alt="SADO Architects"
          width="280"
          height="420"
          loading="eager" />
      </figure>

      <!-- Bottom: 会社概要 + アクセス -->
      <div class="p-about-page__bottom">
        <!-- 会社概要 -->
        <section class="p-company">
          <h2 class="p-company__title">会社概要</h2>
          <dl class="p-company__list">
            <div class="p-company__item">
              <dt class="p-company__term">会社名</dt>
              <dd class="p-company__desc">佐渡建築設計スタジオ</dd>
            </div>
            <div class="p-company__item">
              <dt class="p-company__term">住所</dt>
              <dd class="p-company__desc">〒123-4567 新潟県佐渡市○○○○○○</dd>
            </div>
            <div class="p-company__item">
              <dt class="p-company__term">連絡先</dt>
              <dd class="p-company__desc">
                <p>TEL　012-3456-7890（代表）</p>
                <p>FAX　012-3456-7890</p>
              </dd>
            </div>
            <div class="p-company__item">
              <dt class="p-company__term">創業</dt>
              <dd class="p-company__desc">2000年（平成12年）1月</dd>
            </div>
            <div class="p-company__item">
              <dt class="p-company__term">役員</dt>
              <dd class="p-company__desc">代表取締役社長　佐渡 太郎</dd>
            </div>
            <div class="p-company__item">
              <dt class="p-company__term">業務内容</dt>
              <dd class="p-company__desc">
                <p>○ 建築の企画・意匠・監理</p>
                <p>○ 地域・都市計画に関する企画・調査・研究</p>
              </dd>
            </div>
          </dl>
        </section>

        <!-- アクセス -->
        <section class="p-access">
          <h2 class="p-access__title">アクセス</h2>
          <div class="p-access__map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50000!2d138.3694!3d38.0181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5ff4818d32b24bcf%3A0x50b3f22c1697d50!2z5L2Q5bedQOOCueOCv-OCuuOCqeOCreOCpuODjeOCo-ODlg!5e0!3m2!1sja!2sjp!4v1700000000000"
              width="100%"
              height="360"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="佐渡建築設計スタジオ アクセスマップ"></iframe>
          </div>
        </section>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>