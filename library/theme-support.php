<?php
/**
 *	Let WordPress manage the document.title
 */
add_theme_support( 'title-tag' );

/**
 *	Enable support for Post Thumbnails on Posts and Pages
 */
add_theme_support( 'post-thumbnails' );

/**
 *	Enable support for menus
 */
add_theme_support( 'menus' );
register_nav_menu('primary', 'Primary');
register_nav_menu('social', 'Social');

/**
 *  Enable RSS Support
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Enable Support for the Admin Bar
 */
function admin_bar(){

	if(is_user_logged_in()){
		add_filter( 'show_admin_bar', '__return_true' , 1000 );
	}
}
add_action('init', 'admin_bar' );
