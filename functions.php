<?php

/**
 * テーマの初期設定（アイキャッチ、フィード、title タグ、HTML5 マークアップなど）。
 */
function sado_architects_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'sado_architects_setup' );

/**
 * メニューの登録
 */
function sado_architects_register_nav_menus() {
	register_nav_menus(
		array(
			'global' => 'ヘッダーメニュー',
			'footer' => 'フッターメニュー',
		)
	);
}
add_action( 'after_setup_theme', 'sado_architects_register_nav_menus' );

/**
 * ヘッダー / フッターの wp_nav_menu に既存マークアップ用クラスを付与する。
 *
 * @param string[] $classes メニュー項目のクラス配列。
 * @param WP_Post  $item    メニュー項目。
 * @param stdClass $args    wp_nav_menu の引数。
 * @param int      $depth   階層の深さ。
 * @return string[]
 */
function sado_architects_nav_menu_item_classes( $classes, $item, $args, $depth ) {
	if ( ! isset( $args->theme_location ) ) {
		return $classes;
	}
	if ( 'global' === $args->theme_location ) {
		$classes[] = 'l-header__nav__item';
	} elseif ( 'footer' === $args->theme_location ) {
		$classes[] = 'l-footer__nav-item';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'sado_architects_nav_menu_item_classes', 10, 4 );

/**
 * @param array    $atts  a タグの属性。
 * @param WP_Post  $item  メニュー項目。
 * @param stdClass $args  wp_nav_menu の引数。
 * @param int      $depth 階層の深さ。
 * @return array
 */
function sado_architects_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
	if ( ! isset( $args->theme_location ) ) {
		return $atts;
	}
	$existing = isset( $atts['class'] ) ? $atts['class'] . ' ' : '';
	if ( 'global' === $args->theme_location ) {
		$atts['class'] = trim( $existing . 'l-header__nav__link js-nav-link' );
	} elseif ( 'footer' === $args->theme_location ) {
		$atts['class'] = trim( $existing . 'l-footer__nav-link' );
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'sado_architects_nav_menu_link_attributes', 10, 4 );

/**
 * フロント用の CSS / JS を読み込む。
 */
function sado_architects_enqueue_assets() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' ) ?: '1.0.0';

	wp_enqueue_style(
		'sado-architects-font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
		array(),
		'6.5.1',
		'all'
	);

	$css_path = get_theme_file_path( 'css/style.css' );
	$css_ver  = ( $css_path && file_exists( $css_path ) ) ? (string) filemtime( $css_path ) : $version;

	wp_enqueue_style(
		'sado-architects-main',
		get_template_directory_uri() . '/css/style.css',
		array(),
		$css_ver,
		'all'
	);

	$js_path = get_theme_file_path( 'js/main.js' );
	$js_ver  = ( $js_path && file_exists( $js_path ) ) ? (string) filemtime( $js_path ) : $version;

	wp_enqueue_script(
		'sado-architects-main',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' ),
		$js_ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'sado_architects_enqueue_assets' );
