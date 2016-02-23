<?php
/**
 * Jessica Child Init File
 *
 * This file calls the Child and Genesis init.php files.
 *
 * @category     jessica
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 */

/**
 * This function defines the Genesis Child theme constants
 * and calls necessary theme files
 *
 */
function jessica_init() {
	// Child theme (do not remove)
	define( 'CHILD_THEME_NAME', 'Jessica' );
	define( 'CHILD_THEME_URL', 'http://www.web-savvy-marketing.com/store/' );
	define( 'CHILD_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
	define( 'JESSICA_SETTINGS_FIELD', 'jessica-settings' );
	define( 'SOLILOQUY_LICENSE_KEY', 'YinP3ZMcnSl0kc+QbvQnzyXBfKRYyPm8p1DJfsC5nLY=' );

	// Developer Information (do not remove)
	define( 'CHILD_DEVELOPER', 'Web Savvy Marketing' );
	define( 'CHILD_DEVELOPER_URL', 'http://www.web-savvy-marketing.com/'  );

	/** Define Directory Location Constants */
	if ( ! defined( 'CHILD_DIR' ) )
		define( 'CHILD_DIR', get_stylesheet_directory() );

	/** Define URL Location Constants */
	if ( ! defined( 'CHILD_URL' ) )
	define( 'CHILD_URL', get_stylesheet_directory_uri() );
	define( 'Jessica_LIB', CHILD_URL . '/lib' );
	define( 'Jessica_IMAGES', CHILD_URL . '/images' );
	define( 'Jessica_ADMIN', CHILD_DIR . '/admin' );
	define( 'Jessica_ADMIN_IMAGES', CHILD_DIR . '/images' );
	define( 'Jessica_JS' , CHILD_URL .'/js' );
	define( 'Jessica_CSS' , CHILD_URL .'/css' );

	// Load admin files when necessary
	if ( is_admin() ) {
		// Plugins
		include_once( CHILD_DIR . '/lib/plugins/plugins.php' );

		// Theme Settings
		require_once( CHILD_DIR . '/lib/admin/jessica-theme-settings.php' );

		// Update Notification
		include_once( CHILD_DIR . '/lib/functions/update.php' );

	}

	// Add HTML5 markup structure
	add_theme_support( 'html5' );

	// Add Viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	//Structure
	include_once( CHILD_DIR . '/lib/structure/before-header.php');
	include_once( CHILD_DIR . '/lib/structure/sidebar.php');
	include_once( CHILD_DIR . '/lib/structure/comment-form.php');
	include_once( CHILD_DIR . '/lib/structure/footer.php');

	// Shortcodes
	include_once( CHILD_DIR . '/lib/functions/shortcodes.php');

	// Enable Gravity Forms setting to hide form labels
	add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

	// Setup Widgets
	include_once( CHILD_DIR . '/lib/widgets/call-to-action.php');
	include_once( CHILD_DIR . '/lib/widgets/widget-social.php');
	include_once( CHILD_DIR . '/lib/widgets/wsm-featured-page.php');
	include_once( CHILD_DIR . '/lib/widgets/wsm-featured-post.php');
	include_once( CHILD_DIR . '/lib/widgets/wsm-banner.php');

	// Remove Edit link
	add_filter( 'edit_post_link', '__return_false' );

	// Enqueue Genericons font
	add_action( 'wp_enqueue_scripts', 'jessica_load_fonts' );

	// Mobile menu
	include_once( CHILD_DIR . '/lib/functions/mobilemenu.php');

	// Include WooCommerce specific code
	if( class_exists( 'Woocommerce' ) ) {
		include_once( CHILD_DIR . '/lib/shop/woocommerce.php' );
	}

	// Include iThemes Exchange specific code
	if( class_exists( 'IT_Exchange' ) ) {
		include_once( CHILD_DIR . '/lib/shop/exchange.php' );
	}

	// Include WP eCommerce specific code
	if( class_exists( 'WP_eCommerce' ) ) {
		include_once( CHILD_DIR . '/lib/shop/wpec.php' );
	}

}

function jessica_load_fonts() {
	// Add Genericons font
	wp_enqueue_style( 'genericons', CHILD_URL . '/lib/genericons/genericons.css', array(), CHILD_THEME_VERSION );
	// Add Google Fonts: Roboto, Roboto Slab
	wp_enqueue_style( 'google-font-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700|Roboto+Slab:400,700,300', array(), CHILD_THEME_VERSION );
}

add_filter( 'http_request_args', 'jessica_dont_update_theme', 5, 2 );
/**
 * Don't Update Theme
 * If there is a theme in the repo with the same name,
 * this prevents WP from prompting an update.
 *
 * @author Mark Jaquith
 * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 *
 * @param array $r Request arguments
 * @param string $url Request url
 * @return array $r Request arguments
 */
function jessica_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}