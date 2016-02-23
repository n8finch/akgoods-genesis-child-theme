<?php
/**
 * Modifies the default template to use the thumbnail instead of the large
 * image size for the content-store template part's product-images loop
 *
 * @since 1.2.0
 * @package Jessica
 *
*/
?>

<?php if ( it_exchange( 'product', 'has-featured-image' ) ) : ?>
	<?php do_action( 'it_exchange_content_store_before_featured_image_element' ); ?>
	<a class="it-exchange-product-feature-image" href="<?php it_exchange( 'product', 'permalink', array( 'format' => 'url' ) ); ?>">
		<?php it_exchange( 'product', 'featured-image', array( 'size' => 'thumbnail' ) ); ?>
	</a>
	<?php do_action( 'it_exchange_content_store_after_featured_image_element' ); ?>
<?php endif; ?>