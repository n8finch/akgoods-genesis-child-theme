<?php
/**
 * Template Name: Gallery Page
 * Description: Used to display Gallery Pages
 */

add_action( 'genesis_loop', 'get_the_gallery_page_content');

function get_the_gallery_page_content() {

	$galleryID = get_field('gallery_slider_alias');
	$top_right_content = get_field('top_right_content');
	$gallery_main_content = get_field('gallery_main_content');

	echo '<div class="gallery-page-outer">';

		echo '<div class="gallery-container">'.

		        '<div>' . masterslider( $galleryID ) . '</div>' .

		     '</div>';

		echo '<div class="gallery-top-right-text">'. $top_right_content . '</div>';

	echo '</div>';// end gallery-page-outer

	echo '<div class="gallery-main-content">'. $gallery_main_content . '</div>';

}







genesis();