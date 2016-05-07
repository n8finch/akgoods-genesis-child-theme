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

add_action( 'genesis_before_footer', 'ak_social_icon_footer', 1 );

function ak_social_icon_footer() {
	//	Adding Contact Values
	$facebook    = genesis_get_option( 'wsm_header_facebook', 'jessica-settings' );
	$twitter     = genesis_get_option( 'wsm_header_twitter', 'jessica-settings' );
	$pinterest   = genesis_get_option( 'wsm_header_pinterest', 'jessica-settings' );
	$houzz       = genesis_get_option( 'wsm_header_houzz', 'jessica-settings' );
	$google_plus = genesis_get_option( 'wsm_header_google_plus', 'jessica-settings' );
	$instagram   = genesis_get_option( 'wsm_header_instagram', 'jessica-settings' );
	$youtube     = genesis_get_option( 'wsm_header_youtube', 'jessica-settings' );


	echo '<div class="footer-social-icons">' .
	     '<span class="footer-follow-us">Follow Us </span>' .
	     '<a href="' . $pinterest . '" target="_blank"><span class="fa fa-pinterest"></span></a> ' .
	     '<a href="' . $instagram . '" target="_blank"><span class="fa fa-instagram"></span></a> ' .
	     '<a href="' . $houzz . '" target="_blank"><span class="fa fa-houzz"></span></a> ' .
	     '<a href="' . $google_plus . '" target="_blank"><span class="fa fa-google-plus"></span></a> ' .
	     '<a href="' . $facebook . '" target="_blank"><span class="fa fa-facebook"></span></a> ' .
	     '<a href="' . $twitter . '" target="_blank"><span class="fa fa-twitter"></span></a> ' .
	     //	     '<a href="' . $youtube . '" target="_blank"><span class="fa fa-youtube"></span></a>' .
	     '</div>';

}

//add_action( 'genesis_footer', 'ak_custom_logo_footer', 1 );

//function ak_custom_logo_footer() {
//	//	Adding Contact Values
//	$facebook    = genesis_get_option( 'wsm_header_facebook', 'jessica-settings' );
//
//	echo '<div class="wrap footer-social-icons">' .
//	     '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . CHILD_URL . '/images/logo.png"></a> ' .
//	     '</div>';
//
//}


add_action( 'genesis_before_footer', 'jessica_bottom_widgets', 5 );
function jessica_bottom_widgets() {
	echo '<div class="bottom-widgets">';
	echo '<div class="wrap">';

	echo '<div id="footer-left-half">';
	genesis_widget_area( 'bottom1', array(
		'before' => '<div id="bottom-widget-1" class="bottom1 widget-area">',
		'after'  => '</div>'
	) );
	genesis_widget_area( 'bottom2', array(
		'before' => '<div id="bottom-widget-2" class="bottom2 widget-area">',
		'after'  => '</div>'
	) );
	genesis_widget_area( 'bottom3', array(
		'before' => '<div id="bottom-widget-3" class="bottom3 widget-area">',
		'after'  => '</div>'
	) );
	echo '</div>';


	echo '<div id="footer-right-half">';
	genesis_widget_area( 'bottom4', array(
		'before' => '<div id="bottom-widget-4" class="bottom4 widget-area">',
		'after'  => '</div>'
	) );
	genesis_widget_area( 'bottom5', array(
		'before' => '<div id="bottom-widget-5" class="bottom5 widget-area">',
		'after'  => '</div>'
	) );
	echo '</div>';

	echo '</div >';
	echo '</div >';
}


add_action( 'genesis_footer', 'jessica_do_footer' );
function jessica_do_footer() {

	$copyright = genesis_get_option( 'wsm_copyright', 'jessica-settings' );
	$credit    = genesis_get_option( 'wsm_credit', 'jessica-settings' );

	if ( ! empty( $credit ) ) {
		echo '<p class="wrap">' . do_shortcode( genesis_get_option( 'wsm_credit', 'jessica-settings' ) ) . '</p>';
	}

	if ( ! empty( $copyright ) ) {
		echo '<p class="wrap">' . do_shortcode( genesis_get_option( 'wsm_copyright', 'jessica-settings' ) ) . '</p>';
	}

}