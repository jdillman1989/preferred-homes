<?php
/**
 *	Ensure We are loading all Timber dependencies
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber has not been activated within the theme. Run `composer install` within theme folder to load Timber dependencies.</p></div>';
		}
	);
	return;
}

/**
 * Define constants for general use.
 */
if (!defined('TPL_PATH')) define('TPL_PATH', get_template_directory());
if (!defined('TPL_URL')) define('TPL_URL', get_template_directory_uri());

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

/**
 *	Method for rendering complied assets with hash to ensure
 *	users download latest versions
 */
require_once 'library/render-compiled.php';

/**
 *	Modify theme support for the WordPress build/
 */
require_once 'library/theme-support.php';

/**
 * Add theme utilities
 */
require_once 'library/theme-utils.php';

/**
 *  Advanced Custom Fields Related
 */
require_once 'library/advanced-custom-fields.php';

/**
 *	Add elements to the Timber Context
 */
require_once 'library/context.php';

/**
 *	Declare and build out content types and ACF fields
 */
require_once 'model/model-init.php';

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

function bb_dequeue_script() {

	if (get_post_type() == 'listing'){
		return;
	}

	if (basename(get_page_template()) == 'page.php'){
		if (!is_front_page()){
			return;
		}
	}

	wp_dequeue_script( 'sticky_script' );
	wp_dequeue_script( 'jquery-throttle' );
	wp_dequeue_script( 'jquery-magnificpopup' );
	wp_dequeue_script( 'jquery-fitvids' );
	wp_dequeue_script( 'fl-automator' );
}
add_action( 'wp_print_scripts', 'bb_dequeue_script', 1000 );

function bb_dequeue_style() {

	if (get_post_type() == 'listing'){
		return;
	}

	if (basename(get_page_template()) == 'page.php'){
		if (!is_front_page()){
			return;
		}
	}

	wp_dequeue_style('wp-block-library');
	wp_deregister_style('wp-block-library');

	wp_dequeue_style('wp-block-library-theme');
	wp_deregister_style('wp-block-library-theme');

	wp_dequeue_style('sticky_style');
	wp_deregister_style('sticky_style');

	wp_dequeue_style('jquery-magnificpopup');
	wp_deregister_style('jquery-magnificpopup');

	wp_dequeue_style('base');
	wp_deregister_style('base');

	wp_dequeue_style('fl-automator-skin');
	wp_deregister_style('fl-automator-skin');

	wp_dequeue_style('fl-child-theme');
	wp_deregister_style('fl-child-theme');

	wp_dequeue_style('pp-animate');
	wp_deregister_style('pp-animate');
}
add_action('wp_enqueue_scripts', 'bb_dequeue_style', 1000);
