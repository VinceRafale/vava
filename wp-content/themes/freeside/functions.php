<?php

if ( ! isset( $content_width ) )
	$content_width = 604;
/** 
 * Paths for Chimera Framework and theme related functions
 */

$chimera_path = TEMPLATEPATH . '/chimera/';
$chimera_admin_path = $chimera_path . 'admin/';
$chimera_theme_path = $chimera_path . 'theme/';

/**
 * Include Chimera Framework
 */
require_once($chimera_admin_path . 'languages.php');
require_once($chimera_admin_path . 'framework_options.php');
require_once($chimera_admin_path . 'setup.php');
require_once($chimera_admin_path . 'pages-functions.php');
require_once($chimera_admin_path . 'posts-functions.php');
require_once($chimera_admin_path . 'categories-functions.php');
require_once($chimera_admin_path . 'sidebar-functions.php');
require_once($chimera_admin_path . 'meta_boxes.php');
require_once($chimera_admin_path . 'sidebar_generator.php');
require_once($chimera_admin_path . 'shortcodes.php');
require_once($chimera_admin_path . 'widgets.php');
require_once($chimera_admin_path . 'breadcrumb.php');
require_once($chimera_admin_path . 'page_navi.php');
require_once($chimera_admin_path . 'functions.php');
require_once($chimera_admin_path . 'interface.php');
require_once($chimera_admin_path . 'comments-functions.php');
require_once($chimera_admin_path . 'tinymce/tinymce.php');

/**
 * Include theme related functions
 */
require_once($chimera_theme_path . 'options.php');
require_once($chimera_theme_path . 'meta_boxes.php');
require_once($chimera_theme_path . 'sidebars.php');
require_once($chimera_theme_path . 'filters.php');
require_once($chimera_theme_path . 'head_meta.php');

require_once('aq_resizer.php');

/**
 * Load functions
 */
add_action('admin_menu', 'chimera_admin_menu');
add_action('admin_head', 'chimera_admin_head');

add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
	
	add_theme_support( 'post-thumbnails' );
	
	function freeside_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'freeside_body_class' );

/**
 * Page navi
 */
update_option('pagenavi_options', array(
       'pages_text' => __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','wp-pagenavi'),
       'current_text' => '%PAGE_NUMBER%',
       'page_text' => '%PAGE_NUMBER%',
               'dotright_text' => __('...','wp-pagenavi'),
       'dotleft_text' => __('...','wp-pagenavi'),
       'style' => 1,
       'num_pages' => 5,
       'always_show' => 0,
       'num_larger_page_numbers' => 3,
       'larger_page_numbers_multiple' => 10,
       'use_pagenavi_css' => 1,
   ));
