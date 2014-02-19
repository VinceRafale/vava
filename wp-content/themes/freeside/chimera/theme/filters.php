<?php

/**
 * Content filter
 */
remove_filter('the_content', 'wpautop');

/**
 * Remove menu container
 */
function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
}

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

/**
 * Register theme menus
 */
function chimera_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}

add_action( 'init', 'chimera_menus' );