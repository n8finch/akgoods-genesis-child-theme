<?php

/**
 * Footer Functions
 *
 * This file controls the footer on the site. The standard Genesis footer
 * has been replaced with one that has menu links on the right side and
 * copyright and credits on the left side.
 *
 * @category     Jessica
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 *
 */

remove_action( 'genesis_footer', 'genesis_do_footer' );

add_action( 'genesis_footer', 'jessica_do_footer' );
function jessica_do_footer() {

	$copyright = genesis_get_option( 'wsm_copyright', 'jessica-settings' );
	$credit= genesis_get_option( 'wsm_credit', 'jessica-settings' );

	if ( !empty($credit ) ) {
		echo '<p class="credit">' . do_shortcode( genesis_get_option( 'wsm_credit', 'jessica-settings' ) ) . '</p>';
	}

	if ( !empty( $copyright ) ) {
		echo '<p class="copyright">' . do_shortcode( genesis_get_option( 'wsm_copyright', 'jessica-settings' ) ) . '</p>';
	}

}