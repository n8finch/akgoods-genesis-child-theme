<?php
/*
*
* This is the archive page to show the product-categories for a layout similar to the store page.
*
*/


remove_action( 'genesis_entry_content', 'genesis_do_post_content', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_header', 'genesis_do_post_image', 5 );
add_action( 'genesis_entry_content', 'jessica_do_post_tag_content', 8 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title');
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


function jessica_do_post_tag_content() {

	global $post;

	if ( ! is_tax( 'it_exchange_tag') )
	return;

	it_exchange_set_product( $post->ID );

	if ( it_exchange( 'product', 'has-images' ) ) { ?>
		<a class="it-exchange-product-feature-image align-none" href="<?php it_exchange( 'product', 'permalink', array( 'format' => 'url' ) ); ?>">
			<?php it_exchange( 'product', 'featured-image', array( 'size' => 'store' ) ); ?>
		</a>
	<?php
	} ?>

	<h2 class="it-exchange-product-title entry-title">
		<a href="<?php it_exchange( 'product', 'permalink', array( 'format' => 'url' ) ); ?>">
			<?php it_exchange( 'product', 'title', array( 'format' => 'text' ) ); ?>
		</a>
	</h2>

	<div class="it-exchange-product-price">
		<?php it_exchange( 'product', 'base-price' ); ?>
	</div>


	<a class="it-exchange-product-permalink" href="<?php it_exchange( 'product', 'permalink', array( 'format' => 'url' ) ); ?>">
		<?php _e( 'View Details', 'jessica' ); ?>
	</a>

<?php

}


genesis();