<?php
/*Template Name: AK Home Page*/

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action( 'genesis_before_loop', 'doingthedo');

function doingthedo() {
	echo 'yeah!';
}


genesis();