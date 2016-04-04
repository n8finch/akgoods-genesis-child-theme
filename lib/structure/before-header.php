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

	$phone       = genesis_get_option( 'wsm_header_phone', 'jessica-settings' );
	$fax         = genesis_get_option( 'wsm_header_fax', 'jessica-settings' );
	$email       = genesis_get_option( 'wsm_header_email', 'jessica-settings' );
	$facebook    = genesis_get_option( 'wsm_header_facebook', 'jessica-settings' );
	$twitter     = genesis_get_option( 'wsm_header_twitter', 'jessica-settings' );
	$pinterest   = genesis_get_option( 'wsm_header_pinterest', 'jessica-settings' );
	$houzz       = genesis_get_option( 'wsm_header_houzz', 'jessica-settings' );
	$google_plus = genesis_get_option( 'wsm_header_google_plus', 'jessica-settings' );
	$instagram   = genesis_get_option( 'wsm_header_instagram', 'jessica-settings' );
	$youtube     = genesis_get_option( 'wsm_header_youtube', 'jessica-settings' );

	//Left Header Info Section

	echo '<div class="header-conact-left">' .
	     '<span class="fa fa-phone"></span> ' .
	     $phone .
	     '<span class="fa fa-fax""></span> ' .
	     $fax .
//	     '<span class="fa fa-envelope"></span> ' .
//	     $email .
	     '</div>';

//	//Right Header Cart and Social Media Icons
//
//	global $woocommerce;
//
//	// get cart quantity
//	$qty = $woocommerce->cart->get_cart_contents_count();
//
//	// get cart url
//	$cart_url = $woocommerce->cart->get_cart_url();
//
//	// if multiple products in cart
//	if ( $qty > 1 ) {
//		echo '<div class="header-social-right"><a class="header-cart-items" href="' . $cart_url . '"> <span class="fa fa-cart-plus"> - ' . $qty . ' items</span></a></div>';
//	} elseif ( $qty < 1 ) {
//		echo '<div class="header-social-right"><a class="header-cart-items" href="' . $cart_url . '"> <span class="fa fa-cart-plus"> - empty</span></a></div>';
//	} elseif ( $qty = 1 ) {
//		echo '<div class="header-social-right"><a class="header-cart-items" href="' . $cart_url . '"> <span class="fa fa-cart-plus"> - ' . $qty . ' item</span></a></div>';
//	}

	echo '<div class="header-social-right" id="social-icons-header">' .
	     '<span class="fa fa-envelope"></span> ' .
	     $email .
	     '</div>';

//	echo '<div class="header-social-right" id="social-icons-header">' .
//	     '<a href="' . $pinterest . '" target="_blank"><span class="fa fa-pinterest"></span></a> ' .
//	     '<a href="' . $instagram . '" target="_blank"><span class="fa fa-instagram"></span></a> ' .
//	     '<a href="' . $houzz . '" target="_blank"><span class="fa fa-houzz"></span></a> ' .
//	     '<a href="' . $google_plus . '" target="_blank"><span class="fa fa-google-plus"></span></a> ' .
//	     '<a href="' . $facebook . '" target="_blank"><span class="fa fa-facebook"></span></a> ' .
//	     '<a href="' . $twitter . '" target="_blank"><span class="fa fa-twitter"></span></a> ' .
//	     '<a href="' . $youtube . '" target="_blank"><span class="fa fa-youtube"></span></a> | ' .
//	     '</div>';


	if ( has_nav_menu( 'secondary' ) ) {

		$args = array(
			'theme_location' => 'secondary',
			'container'      => '',
			'menu_class'     => genesis_get_option( 'nav_superfish' ) ? 'nav genesis-nav-menu superfish' : 'nav genesis-nav-menu',
			'echo'           => 0
		);

		$nav = wp_nav_menu( $args );

		$nav_output = sprintf( '<nav class="nav-secondary">%1$s</nav>', $nav );

		echo apply_filters( 'jessica_do_secondary_nav', $nav_output, $nav, $args );

	}

	echo '</div></aside>';

}


add_action( 'genesis_header_right', 'add_cart_to_header_right');
function add_cart_to_header_right() {
	//Right Header Cart and Social Media Icons

	global $woocommerce;

	// get cart quantity
	$qty = $woocommerce->cart->get_cart_contents_count();

	// get cart url
	$cart_url = $woocommerce->cart->get_cart_url();

	// if multiple products in cart
	if ( $qty > 1 ) {
		echo '<div class="header-cart-items"><a class="header-cart-items" href="' . $cart_url . '"> <span class="fa fa-shopping-cart fa-2x"> ' . $qty . '</span></a></div>';
	} elseif ( $qty < 1 ) {
		echo '<div class="header-cart-items"><a class="header-cart-items" href="' . $cart_url . '"> <span class="fa fa-shopping-cart fa-2x"> 0</span></a></div>';
	} elseif ( $qty = 1 ) {
		echo '<div class="header-cart-items"><a class="header-cart-items" href="' . $cart_url . '"> <span class="fa fa-shopping-cart fa-2x"> ' . $qty . '</span></a></div>';
	}
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

	$leadtext   = genesis_get_option( 'wsm_subheader_leadtext', 'jessica-settings' );
	$hovertext1 = genesis_get_option( 'wsm_subheader_hovertext1', 'jessica-settings' );
	$image1     = esc_url( genesis_get_option( 'wsm_subheader_image1', 'jessica-settings' ) );
	$link1      = genesis_get_option( 'wsm_subheader_link1', 'jessica-settings' );
	$hovertext2 = genesis_get_option( 'wsm_subheader_hovertext2', 'jessica-settings' );
	$image2     = genesis_get_option( 'wsm_subheader_image2', 'jessica-settings' );
	$link2      = genesis_get_option( 'wsm_subheader_link2', 'jessica-settings' );
	$hovertext3 = genesis_get_option( 'wsm_subheader_hovertext3', 'jessica-settings' );
	$image3     = genesis_get_option( 'wsm_subheader_image3', 'jessica-settings' );
	$link3      = genesis_get_option( 'wsm_subheader_link3', 'jessica-settings' );


	echo '<div class="wrap desktop-only"><div class="subheader-area wrap">';

	echo '	<div class="subheader-text-area">' .
	     $leadtext .
	     '</div>';

	echo '<div class="hover-tile-outer mainpage-hover-tile-top" style="background-image: url(' . $image1 . ');">
				  <a href="' . $link1 . '">
				  <div class="hover-tile-container">
				  		<h3 class="hide-title-on-hover">' . $hovertext1 . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $hovertext1 . '</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>';
	echo '<div class="hover-tile-outer mainpage-hover-tile-top" style="background-image: url(' . $image2 . ');">
				  <a href="' . $link2 . '"><div class="hover-tile-container">
				  		<h3 class="hide-title-on-hover">' . $hovertext2 . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $hovertext2 . '</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>';
	echo '<div class="hover-tile-outer mainpage-hover-tile-top" style="background-image: url(' . $image3 . ');">
				  <a href="' . $link3 . '"><div class="hover-tile-container">
				  		<h3 class="hide-title-on-hover">' . $hovertext3 . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $hovertext3 . '</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>';

	echo '</div></div>';
}

add_action( 'genesis_after_header', 'do_subheader_area' );


/**
 * Add Search form to primary menu
 */

add_filter( 'wp_nav_menu_items', 'ak_genesis_search_primary_nav_menu', 10, 2 );
function ak_genesis_search_primary_nav_menu( $menu, stdClass $args ) {
	if ( 'primary' != $args->theme_location ) {
		return $menu;
	}
	if ( genesis_get_option( 'nav_extras' ) ) {
		return $menu;
	}
	$menu .= sprintf( '<li id="primary-search-box" class="nav-custom-search menu-item">%s</li>', __( genesis_search_form( $echo ) ) );

	return $menu;
}

add_action( 'genesis_after_header', 'mobile_only_lead_text_subheader', 2);

function mobile_only_lead_text_subheader() {

	$leadtext   = genesis_get_option( 'wsm_subheader_leadtext', 'jessica-settings' );
	
	echo '	<div class="mobile-only mobile-lead-text">' .
	     $leadtext .
	     '</div>';
}