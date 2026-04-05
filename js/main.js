$(function () {
  // ==========================================
  // Hamburger menu
  // ==========================================
  const $hamburger = $(".js-hamburger");
  const $nav = $(".js-nav");

  $hamburger.on("click", function () {
    const isOpen = $hamburger.hasClass("is-open");

    $hamburger.toggleClass("is-open");
    $nav.toggleClass("is-open");
    $hamburger.attr("aria-expanded", !isOpen);
    $hamburger.attr(
      "aria-label",
      !isOpen ? "メニューを閉じる" : "メニューを開く",
    );
    $("body").css("overflow", !isOpen ? "hidden" : "");
  });

  $(".js-nav-link").on("click", function () {
    $hamburger.removeClass("is-open");
    $nav.removeClass("is-open");
    $hamburger.attr("aria-expanded", "false");
    $hamburger.attr("aria-label", "メニューを開く");
    $("body").css("overflow", "");
  });

  // ==========================================
  // 左右サイド（著作権・SNS）：ページ最下部付近で非表示
  // ==========================================
  const $sideLeft = $(".l-side-left");
  const $sideRight = $(".l-side-right");

  function updateSidebarsAtBottom() {
    if (!$sideLeft.length && !$sideRight.length) return;

    const scrollY = $(window).scrollTop();
    const windowH = $(window).height();
    const docH = $(document).height();
    const thresholdPx = 80;

    const atBottom = scrollY + windowH >= docH - thresholdPx;

    if (atBottom) {
      $sideLeft.addClass("is-hidden-at-bottom");
      $sideRight.addClass("is-hidden-at-bottom");
    } else {
      $sideLeft.removeClass("is-hidden-at-bottom");
      $sideRight.removeClass("is-hidden-at-bottom");
    }
  }

  $(window).on("scroll resize", updateSidebarsAtBottom);
  updateSidebarsAtBottom();

  // ==========================================
  // Page top button
  // ==========================================
  const $pageTop = $(".js-page-top");

  if ($pageTop.length) {
    const $aboutTitle = $(".p-about__title");
    const $footer = $(".l-footer");

    // About タイトルのページ先頭からの距離（初期値）
    let showThreshold = $aboutTitle.length ? $aboutTitle.offset().top : 400;

    function updatePageTop() {
      const scrollY = $(window).scrollTop();
      const windowH = $(window).height();

      // 表示判定: About タイトルが見え始めたら表示、先頭付近では非表示
      if (scrollY >= showThreshold - windowH && scrollY > 100) {
        $pageTop.addClass("is-visible");
      } else {
        $pageTop.removeClass("is-visible");
      }

      // フッターが見え始めたらボタンをフッター上部に追従させる
      if ($footer.length) {
        // フッター上端がビューポート下端からどれだけ見えているか（px）
        const footerDistFromBottom = windowH - ($footer.offset().top - scrollY);

        if (footerDistFromBottom > 0) {
          // フッターが見えている → ボタンをフッターの40px上に固定
          $pageTop.css("bottom", footerDistFromBottom + 40 + "px");
        } else {
          // フッターが見えていない → デフォルト位置に戻す
          $pageTop.css("bottom", "");
        }
      }
    }

    $(window).on("scroll", updatePageTop);
    updatePageTop(); // 初期化

    // クリックで先頭へスムーズスクロール
    $pageTop.on("click", function () {
      $("html, body").animate({ scrollTop: 0 }, 600);
    });
  }

  // ==========================================
  // Works フィルター トグル（tab以下）
  // ==========================================
  const $filterToggle = $(".js-filter-toggle");
  const $filterBody = $(".js-filter-body");

  if ($filterToggle.length) {
    $filterToggle.on("click", function () {
      $filterBody.addClass("is-open");
      $filterToggle.addClass("is-hidden");
      $filterToggle.attr("aria-expanded", "true");
    });
  }

  // ==========================================
  // Member slider（無限ループ：クローン方式）
  // ==========================================
  const $memberList = $(".js-member-list");

  if ($memberList.length) {
    const $originalItems = $memberList.find(".p-member__item");
    const $nextBtn = $(".js-member-next");
    const total = $originalItems.length; // 本物のアイテム数（7枚）
    const cloneCount = 4; // 先頭から複製する枚数（表示枚数分）

    // 先頭アイテムを末尾にクローンして追加
    // 例: [1][2][3][4][5][6][7] → [1][2][3][4][5][6][7][clone:1][clone:2][clone:3][clone:4]
    for (let i = 0; i < cloneCount; i++) {
      $memberList.append(
        $originalItems.eq(i).clone().attr("aria-hidden", "true"),
      );
    }

    let current = 0;
    let isAnimating = false;

    $nextBtn.on("click", function () {
      if (isAnimating) return; // アニメーション中は多重クリックを無視
      isAnimating = true;

      current++;

      // クローン含む全アイテムの offsetLeft でスライド量を算出
      const $allItems = $memberList.find(".p-member__item");
      const offset = $allItems.eq(current)[0].offsetLeft;
      $memberList.css("transform", "translateX(-" + offset + "px)");

      // CSSのtransition duration（500ms）後に処理
      setTimeout(function () {
        if (current >= total) {
          // クローン領域に到達 → トランジションを切って先頭に瞬時リセット
          $memberList.css("transition", "none");
          current -= total; // 例: 7 - 7 = 0、8 - 7 = 1
          const $allItems2 = $memberList.find(".p-member__item");
          const resetOffset =
            current === 0 ? 0 : $allItems2.eq(current)[0].offsetLeft;
          $memberList.css("transform", "translateX(-" + resetOffset + "px)");

          // ブラウザが新しい位置で描画してからトランジションを再有効化
          requestAnimationFrame(function () {
            requestAnimationFrame(function () {
              $memberList.css("transition", "");
              isAnimating = false;
            });
          });
        } else {
          isAnimating = false;
        }
      }, 500); // _member.scss の transition duration に合わせる
    });
  }
});
