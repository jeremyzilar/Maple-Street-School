<?php

function scripts_styles() {
	global $wp_styles;
	$q = 'v112';
	// Le JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('color-js', get_template_directory_uri() . '/js/jquery-color.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('moment-js', get_template_directory_uri() . '/js/moment.min.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('psfc', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), $q, true );

	// Le CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',array(), $q);
	wp_enqueue_style( 'openwebicons', get_template_directory_uri() . '/css/openwebicons-bootstrap.css',array(), $q);
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css',array(), $q);
	wp_enqueue_style( 'psfc', get_stylesheet_uri(),array(), $q);
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css',array(), $q);
}
add_action( 'wp_enqueue_scripts', 'scripts_styles' );

// function load_admin_style() {
//   $v = date('d');
//   wp_enqueue_script( 'admin_js', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ), $v, 'all' );
//   wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/css/admin.css', false, $v, 'all' );
// }
// add_action( 'admin_enqueue_scripts', 'load_admin_style' );


function nyt_media_popup_init() {
  $v = date('d');
  wp_enqueue_script( 'admin-media', get_template_directory_uri() . '/js/media.js', array( 'media-editor' ), $v, 'all');
}
add_action( 'load-post.php', 'nyt_media_popup_init' );
add_action( 'load-post-new.php', 'nyt_media_popup_init' );

?>
