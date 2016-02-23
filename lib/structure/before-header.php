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

add_action( 'genesis_before_header' , 'jessica_do_before_header' );

function jessica_do_before_header() {

	echo '<aside class="before-header"><div class="wrap">';

	if ( has_nav_menu( 'secondary' ) ) {

			$args = array(
				'theme_location' => 'secondary',
				'container' => '',
				'menu_class' => genesis_get_option('nav_superfish') ? 'nav genesis-nav-menu superfish' : 'nav genesis-nav-menu',
				'echo' => 0
			);

			$nav = wp_nav_menu( $args );

			$nav_output = sprintf( '<nav class="nav-secondary">%1$s</nav>', $nav);

			echo apply_filters( 'jessica_do_secondary_nav', $nav_output, $nav, $args );

		}

	echo '</div></aside>';

}


add_filter( 'genesis_nav_items', 'wsm_top_search_form', 10, 2 );
add_filter( 'wp_nav_menu_items', 'wsm_top_search_form', 10, 2 );

/**
 * Secondary Nav Search Form
 */
function wsm_top_search_form($menu, $args) {


	$args = (array)$args;
	if ( 'secondary' !== $args['theme_location']  )

	return $menu;

	$hide_search= genesis_get_option( 'wsm_top_search', 'jessica-settings' );

			ob_start();
			get_search_form();
			$search = ob_get_clean();

	$menu_right = '';

	if ( empty( $hide_search ) ) {
		$menu_right .= '<li class="right search">' . $search . '</li>';
	}

			return $menu . $menu_right;


}