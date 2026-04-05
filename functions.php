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
