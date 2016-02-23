<?php

add_action( 'after_setup_theme', 'jessica_i18n' );
/**
 * Load the child theme textdomain for internationalization.
 *
 * Must be loaded before Genesis Framework /lib/init.php is included.
 * Translations can be filed in the /languages/ directory.
 *
 * @since 1.2.0
 */
function jessica_i18n() {
    load_child_theme_textdomain( 'jessica', get_stylesheet_directory() . '/languages' );
}

add_action( 'wp_enqueue_scripts', 'wsm_enqueue_assets' );
/**
 * Enqueue theme assets.
 */
function wsm_enqueue_assets() {
	wp_enqueue_style( 'jessica', get_stylesheet_uri() );
	wp_style_add_data( 'jessica', 'rtl', 'replace' );
}

// Start the engine
require_once(TEMPLATEPATH.'/lib/init.php');
require_once( 'lib/init.php' );

// Calls the theme's constants & files
jessica_init();

// Editor Styles
add_editor_style( 'editor-style.css' );

// Create additional color style options

add_theme_support( 'genesis-style-selector',
	array(
		'jessica-pink' => __( 'Pink', 'jessica' ),
		'jessica-red' => __( 'Red', 'jessica' ),
		'jessica-brown' => __( 'Brown', 'jessica' ),
		'jessica-green' => __( 'Green', 'jessica' ),
		'jessica-purple' => __( 'Purple', 'jessica' ),
	)
);

// Force Stupid IE to NOT use compatibility mode
add_filter( 'wp_headers', 'jessica_keep_ie_modern' );
function jessica_keep_ie_modern( $headers ) {
	if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
		$headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
	}
	return $headers;
}

// Accessibility features.
add_theme_support( 'genesis-accessibility', array(
	'headings',
	'drop-down-menu',
	'search-form',
	'skip-links',
	'rems',
) );

// Add new image sizes
add_image_size( 'Blog Thumbnail', 162, 159, TRUE );
add_image_size( 'store', 217, 312, TRUE );

//* Reposition the post image (requires HTML5 theme support)
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 5 );

// Customize the Search Box
add_filter( 'genesis_search_button_text', 'custom_search_button_text' );
function custom_search_button_text( $text ) {
    return esc_attr( __( 'Go', 'jessica' ) );
}

// Modify the author box display
add_filter( 'genesis_author_box', 'jessica_author_box' );
function jessica_author_box() {
	$authinfo = '';
	$authdesc = get_the_author_meta('description');

	if( !empty( $authdesc ) ) {
		$authinfo .= sprintf( '<section %s>', genesis_attr( 'author-box' ) );
		$authinfo .= '<h3 class="author-box-title">' . __( 'About the Author', 'jessica' ) . '</h3>';
		$authinfo .= get_avatar( get_the_author_meta( 'ID' ) , 90, '', get_the_author_meta( 'display_name' ) . '\'s avatar' ) ;
		$authinfo .= '<div class="author-box-content" itemprop="description">';
		$authinfo .= '<p>' . get_the_author_meta( 'description' ) . '</p>';
		$authinfo .= '</div>';
		$authinfo .= '</section>';
	}
	if ( is_author() || is_single() ) {
		echo $authinfo;
	}
}

//* Customize the entry meta in the entry header (requires HTML5 theme support)
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter( $post_info ) {
$post_info = '[post_date] [post_comments]';
return $post_info;
}


// Customize the post meta function
add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter( $post_meta ) {
	if ( is_single() ) {
    	$post_meta = '[post_tags sep=", " before="' . __( 'Tags:', 'jessica' ) . ' "] [post_categories sep=", " before="' . __( 'Categories:', 'jessica' ) . ' "]';
    	return $post_meta;
	}
}

// Add Read More button to blog page and archives
add_filter( 'excerpt_more', 'jessica_add_excerpt_more' );
add_filter( 'get_the_content_more_link', 'jessica_add_excerpt_more' );
add_filter( 'the_content_more_link', 'jessica_add_excerpt_more' );
function jessica_add_excerpt_more( $more ) {
    return '<span class="more-link"><a href="' . get_permalink() . '" rel="nofollow">' . __( '[Read More]', 'jessica' ) . '</a></span>';
}

/*
 * Add support for targeting individual browsers via CSS
 * See readme file located at /lib/js/css_browser_selector_readm.html
 * for a full explanation of available browser css selectors.
 */
add_action( 'get_header', 'jessica_load_scripts' );
function jessica_load_scripts() {
    wp_enqueue_script( 'browserselect', CHILD_URL . '/lib/js/css_browser_selector.js', array('jquery'), '0.4.0', TRUE );
}

// Structural Wrap
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer',
) );


// Set menu areas
add_theme_support ( 'genesis-menus' ,
	array (
		'primary' =>  __( 'Primary Navigation Menu', 'jessica' ) ,
		'secondary' => __( 'Secondary Navigation Menu', 'jessica' ),
	)
);


//* Add menu description
add_filter( 'walker_nav_menu_start_el', 'be_add_description', 10, 2 );
function be_add_description( $item_output, $item ) {
	$description = $item->post_content;
	if ( ' ' !== $description )
		return preg_replace( '/(<a.*?>[^<]*?)</', '$1' . '<span class="menu-description">' . $description . '</span><', $item_output);
	else
	return $item_output;
}

//* Remove the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );

//* Unregister Layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

// Setup Sidebars
unregister_sidebar( 'sidebar-alt' );

genesis_register_sidebar( array(
	'id'			=> 'rotator',
	'name'			=> __( 'Rotator', 'jessica' ),
	'description'	=> __( 'This is the image rotator section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-nav',
	'name'			=> __( 'Home Categories Menu', 'jessica' ),
	'description'	=> __( 'This is the home middle navigation section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-cta-left',
	'name'			=> __( 'Home CTA Left', 'jessica' ),
	'description'	=> __( 'This is the home call to action section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-cta-right',
	'name'			=> __( 'Home CTA Right', 'jessica' ),
	'description'	=> __( 'This is the home call to action section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-mid-left',
	'name'			=> __( 'Home Mid Left', 'jessica' ),
	'description'	=> __( 'This is the home middle section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-mid-right',
	'name'			=> __( 'Home Mid Right', 'jessica' ),
	'description'	=> __( 'This is the home middle section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-bottom-ad',
	'name'			=> __( 'Home Bottom Ad', 'jessica' ),
	'description'	=> __( 'This is the home page ad section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'bottom1',
	'name'			=> __( 'Home Bottom 1', 'jessica' ),
	'description'	=> __( 'This is the before footer section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'bottom2',
	'name'			=> __( 'Home Bottom 2', 'jessica' ),
	'description'	=> __( 'This is the before footer section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'bottom3',
	'name'			=> __( 'Home Bottom 3', 'jessica' ),
	'description'	=> __( 'This is the before footer section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'bottom4',
	'name'			=> __( 'Home Bottom 4', 'jessica' ),
	'description'	=> __( 'This is the before footer section.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'blog-sidebar',
	'name'			=> __( 'Blog Sidebar', 'jessica' ),
	'description'	=> __( 'This is the Blog Page Sidebar.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'page-sidebar',
	'name'			=> __( 'Page Sidebar', 'jessica' ),
	'description'	=> __( 'This is the Page Sidebar.', 'jessica' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'store-sidebar',
	'name'			=> __( 'Store Sidebar', 'jessica' ),
	'description'	=> __( 'This is the Store Page Sidebar.', 'jessica' ),
) );

// Remove edit link from TablePress tables for logged in users
add_filter( 'tablepress_edit_link_below_table', '__return_false' );


// Display Category Title
add_filter( 'genesis_term_meta_headline', 'be_default_category_title', 10, 2 );
function be_default_category_title( $headline, $term ) {
	if( ( is_category() || is_tag() || is_tax() ) && empty( $headline ) )
		$headline = $term->name;
	return $headline;
}

//* Modify breadcrumb arguments.
add_filter( 'genesis_breadcrumb_args', 'sp_breadcrumb_args' );
function sp_breadcrumb_args( $args ) {
	$args['home'] = 'Home';
	$args['sep'] = ' <sep>|</sep> ';
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = '';
	$args['labels']['category'] = ''; // Genesis 1.6 and later
	$args['labels']['tag'] = '';
	$args['labels']['date'] = '';
	$args['labels']['search'] = '';
	$args['labels']['tax'] = '';
	$args['labels']['post_type'] = '';

	return $args;
}

//* Insert SPAN tag into widgettitle
add_filter( 'dynamic_sidebar_params', 'wsm_wrap_widget_titles', 20 );
function wsm_wrap_widget_titles( array $params ) {
	$widget =& $params[0];
	$widget['before_title'] = '<h4 class="widgettitle widget-title"><span class="sidebar-title">';
	$widget['after_title'] = '</span></h4>';

	return $params;
}
