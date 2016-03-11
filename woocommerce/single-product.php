<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

	<?php
	/**
	 * woocommerce_sidebar hook.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	do_action( 'akg_woocommerce_footer' );
	?>

<?php
	if ( is_product() ) {
		global $wp_query;
		$cat = $wp_query->query['product_cat']; //gets current product's category

		$args = array(
			'posts_per_page' => 4,
			'product_cat'    => $cat,
			'post_type'      => 'product',
			'orderby'        => 'rand',
		);

		$the_query = new WP_Query( $args );
		// The Loop
		echo '<div class="you-may-also-like-section">' .
			 '<h2>You May Also Like</h2>' .
		     '<div class="you-may-also-like-items">' ;
		while ( $the_query->have_posts() ) {


			$the_query->the_post();
			echo '<a href="' . get_post_permalink() .'">' .
				 '<div class="you-may-also-like-item">' .
			     '<img class="you-may-also-like-images" src="'.get_the_post_thumbnail_url() . '">' .
			     '<h3>' . get_the_title() . '</h3>' .
			     '</div></a>';

			wp_reset_postdata();
		}
		echo '</div></div> <!--end Related Products Loop-->';
	}


?>



<?php get_footer( 'shop' ); ?>
