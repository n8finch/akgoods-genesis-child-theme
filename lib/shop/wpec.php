<?php

/*
 * Jessica Child File
 *
 * This file calls the WP Ecommerce
 *
 * @category     jessica
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0

*/

add_action('init' , 'wsm_wpec_genesis_add_layout_support');
function wsm_wpec_genesis_add_layout_support() {
	add_post_type_support('wpsc-product', 'genesis-layouts' );
}

add_action( 'genesis_header', 'wsm_wpec_do_theme');
function wsm_wpec_do_theme() {

	if ( wpsc_is_single_product() ) {
		//* Remove the entry title (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

		//* Remove the entry meta in the entry header (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

		//* Remove the author box on single posts HTML5 Themes
		remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );

		//* Remove the entry meta in the entry footer (requires HTML5 theme support)
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

		add_action( 'genesis_before_loop', 'wsm_wpec_do_breadcrumbs' );
	}
}

function wsm_wpec_do_breadcrumbs() {
	wpsc_output_breadcrumbs();
}

//* Remove the breadcrumbs
add_action( 'genesis_header', 'wsm_genesis_wpsc_breadcrumbs' );
function wsm_genesis_wpsc_breadcrumbs() {
	if ( wpsc_has_pages_bottom() || wpsc_is_product() || wpsc_is_in_category() || wpsc_is_product() || wpsc_is_single_product() ) {
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
	}
}
