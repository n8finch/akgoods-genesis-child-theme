<?php

/*
 * Jessica Child File
 *
 * This file calls Ithemes Exchange
 *
 * @category     jessica
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0

*/


add_action( 'genesis_header', 'exchange_do_theme');

function exchange_do_theme() {

	if ( it_exchange_is_page() ) {

		// Remove the entry meta in the entry header (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

		// Remove the author box on single posts HTML5 Themes
		remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );

		// Remove the entry meta in the entry footer (requires HTML5 theme support)
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

	}

}


