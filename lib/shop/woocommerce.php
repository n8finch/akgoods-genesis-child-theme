<?php

/*
 * Jessica Child File
 *
 * This file calls the WooCommerce Specific Code
 *
 * @category     jessica
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0

*/


// Explicitly declare WooCommerce Support
add_action( 'after_setup_theme', 'wsm_woocommerce_support' );
function wsm_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_theme_support( 'genesis-connect-woocommerce' );

// Change number or products per row to 3
add_filter( 'loop_shop_columns', 'wsm_woo_loop_columns' );
function wsm_woo_loop_columns() {
	return 3;
}

add_filter ( 'woocommerce_product_thumbnails_columns', 'wsm_woo_thumb_cols' );
function wsm_woo_thumb_cols() {
	return 3;
}

// Remove WooCommerce Related Commerce
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// Change add to cart button text
add_filter( 'add_to_cart_text', 'wsm_woo_custom_cart_button_text' ); // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'wsm_woo_custom_cart_button_text' ); // 2.1+ Single
add_filter( 'woocommerce_product_add_to_cart_text', 'wsm_woo_custom_cart_button_text' ); // 2.1 + Archives
function wsm_woo_custom_cart_button_text() {
	return __( 'Buy', 'jessica' );
}

// Add Demo & Details Link to Theme store page
add_action('woocommerce_before_shop_loop_item_title' , 'wsm_add_demo_link_button',10 );
function wsm_add_demo_link_button() {
	global $post;
	echo '</a><a href="'.get_permalink().'" class="button-details button">' . __( 'Info', 'jessica' ) . '</a>';
}

//  Reposition add to cart button
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart' ,20);

// Remove product ordering
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Reposition result count
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 5 );

// Display 6 products per page.
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 6;' ), 20 );

//* Force full-width-content product layout setting
add_filter( 'genesis_site_layout', 'jessica_woo_product_layout' );
function jessica_woo_product_layout() {
	if ( is_singular( 'product' ) ) {
    	if( 'product' == get_post_type() ) {
        	return 'full-width-content';
    	}
	}
}

//  Reposition products star rating
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );

add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );

/**
 * woo_custom_product_searchform
*/
function woo_custom_product_searchform( $form ) {

	if( version_compare( PARENT_THEME_VERSION, '2.2.0', '>=' ) && get_theme_support( 'genesis-accessibility', 'search-form' ) ) {

		$search_text = get_search_query() ? apply_filters( 'the_search_query', get_search_query() ) : apply_filters( 'genesis_search_text', __( 'Search Here', 'jessica' ) . ' &#x02026;' );

		$button_text = apply_filters( 'genesis_search_button_text', esc_attr__( 'Go', 'jessica' ) );

		$onfocus = "if ('" . esc_js( $search_text ) . "' === this.value) {this.value = '';}";
		$onblur  = "if ('' === this.value) {this.value = '" . esc_js( $search_text ) . "';}";

		//* Empty label, by default. Filterable.
		$label = apply_filters( 'genesis_search_form_label', '' );

		$value_or_placeholder = ( get_search_query() == '' ) ? 'placeholder' : 'value';

		$form  = sprintf( '<form %s>', genesis_attr( 'search-form' ) );

		if ( '' == $label )  {
			$label = apply_filters( 'genesis_search_text', __( 'Search Here', 'jessica' ) );
		}

		$form_id = uniqid( 'searchform-' );

		$form .= sprintf(
			'<div><meta itemprop="target" content="%s"/><label class="search-form-label screen-reader-text" for="%s">%s</label><input itemprop="query-input" type="search" name="s" id="%s" %s="%s" /><input type="submit" value="%s" /><input type="hidden" name="post_type" value="product" /></div></form>',
			home_url( '/?s={s}' ),
			esc_attr( $form_id ),
			esc_html( $label ),
			esc_attr( $form_id ),
			$value_or_placeholder,
			esc_attr( $search_text ),
			esc_attr( $button_text )
		);

	} else {

		$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
			<div>
				<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search Here...', 'jessica' ) . '" />
				<input type="submit" id="searchsubmit" value="'. esc_attr__( 'GO', 'jessica' ) .'" />
				<input type="hidden" name="post_type" value="product" />
				</div>
		</form>';
	}

	return $form;

}