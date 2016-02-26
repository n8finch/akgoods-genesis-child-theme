<?php

/**
 * Header Functions
 *
 * This file controls the header display on the site to allow
 * social media icons in the header
 *
 * @category     Jessica
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 *
 */

add_action( 'genesis_before_header', 'jessica_do_before_header' );

function jessica_do_before_header() {

	echo '<aside class="before-header"><div class="wrap">';

	//	Adding Contact Values

	$phone = genesis_get_option( 'wsm_header_phone', 'jessica-settings' );
	$fax   = genesis_get_option( 'wsm_header_fax', 'jessica-settings' );
	$email = genesis_get_option( 'wsm_header_email', 'jessica-settings' );
	$facebook = genesis_get_option( 'wsm_header_facebook', 'jessica-settings' );
	$twitter = genesis_get_option( 'wsm_header_twitter', 'jessica-settings' );
	$pinterest = genesis_get_option( 'wsm_header_pinterest', 'jessica-settings' );
	$houzz = genesis_get_option( 'wsm_header_houzz', 'jessica-settings' );
	$google_plus = genesis_get_option( 'wsm_header_google_plus', 'jessica-settings' );
	$instagram = genesis_get_option( 'wsm_header_instagram', 'jessica-settings' );
	$youtube = genesis_get_option( 'wsm_header_youtube', 'jessica-settings' );

	//Left Header Info Section

	echo '<div class="header-conact-left">' .
	     '<span class="fa fa-phone"></span> ' .
	     $phone .
	     ' | <span class="fa fa-fax""></span> ' .
	     $fax .
	     ' | <span class="fa fa-envelope"></span> ' .
	     $email .
	     '</div>';

	//Right Header Social Media Icons

	echo '<div class="header-social-right">' .
	     '<a href="'. $pinterest .'" target="_blank"><span class="fa fa-pinterest"></span></a> ' .
	     '<a href="'. $instagram .'" target="_blank"><span class="fa fa-instagram"></span></a> ' .
	     '<a href="'. $houzz .'" target="_blank"><span class="fa fa-houzz"></span></a> ' .
	     '<a href="'. $google_plus .'" target="_blank"><span class="fa fa-google-plus"></span></a> ' .
	     '<a href="'. $facebook .'" target="_blank"><span class="fa fa-facebook"></span></a> ' .
	     '<a href="'. $twitter .'" target="_blank"><span class="fa fa-twitter"></span></a> ' .
	     '<a href="'. $youtube .'" target="_blank"><span class="fa fa-youtube"></span></a> ' .
	     '</div>';


//	if ( has_nav_menu( 'secondary' ) ) {
//
//			$args = array(
//				'theme_location' => 'secondary',
//				'container' => '',
//				'menu_class' => genesis_get_option('nav_superfish') ? 'nav genesis-nav-menu superfish' : 'nav genesis-nav-menu',
//				'echo' => 0
//			);
//
//			$nav = wp_nav_menu( $args );
//
//			$nav_output = sprintf( '<nav class="nav-secondary">%1$s</nav>', $nav);
//
//			echo apply_filters( 'jessica_do_secondary_nav', $nav_output, $nav, $args );
//
//		}

	echo '</div></aside>';

}


add_filter( 'genesis_nav_items', 'wsm_top_search_form', 10, 2 );
add_filter( 'wp_nav_menu_items', 'wsm_top_search_form', 10, 2 );

/**
 * Secondary Nav Search Form
 */
function wsm_top_search_form( $menu, $args ) {


	$args = (array) $args;
	if ( 'secondary' !== $args['theme_location'] ) {
		return $menu;
	}

	$hide_search = genesis_get_option( 'wsm_top_search', 'jessica-settings' );

	ob_start();
	get_search_form();
	$search = ob_get_clean();

	$menu_right = '';

	if ( empty( $hide_search ) ) {
		$menu_right .= '<li class="right search">' . $search . '</li>';
	}

	return $menu . $menu_right;


}

function do_subheader_area() {

	$leadtext = genesis_get_option( 'wsm_subheader_leadtext', 'jessica-settings' );
	$hovertext1 = genesis_get_option( 'wsm_subheader_hovertext1', 'jessica-settings' );
	$hovertext2 = genesis_get_option( 'wsm_subheader_hovertext2', 'jessica-settings' );
	$hovertext3 = genesis_get_option( 'wsm_subheader_hovertext3', 'jessica-settings' );


	echo '<div class="wrap"><div class="subheader-area wrap">';

	echo '	<div class="subheader-text-area">' .
				$leadtext .
			'</div>';
	echo '	<div class="hover-tile-outer">
				<div class="hover-tile-container">
					<div class="hover-tile hover-tile-visible"></div>
					<div class="hover-tile hover-tile-hidden">' .
	                    $hovertext1 .
					'</div>
				</div>
			</div>';
	echo '	<div class="hover-tile-outer">
				<div class="hover-tile-container">
					<div class="hover-tile hover-tile-visible"></div>
					<div class="hover-tile hover-tile-hidden">' .
					     $hovertext2 .
	                '</div>
				</div>
			</div>';
	echo '	<div class="hover-tile-outer">
				<div class="hover-tile-container">
					<div class="hover-tile hover-tile-visible"></div>
					<div class="hover-tile hover-tile-hidden">' .
				        $hovertext3 .
	                '</div>
				</div>
			</div>';

	echo '</div></div>';
}

add_action( 'genesis_after_header', 'do_subheader_area');