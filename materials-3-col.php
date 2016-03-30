<?php
/**
 * Template Name: Materials Page 3 Columns
 * Description: Used to display Materials in 3 Columns
 */



add_action( 'genesis_loop', 'get_the_materials_columns_3');

function get_the_materials_columns_3() {

	echo '<div class="materials-page-repeater-outer">';
	// check if the repeater field has rows of data
	if( have_rows('material_information') ):

		// loop through the rows of data
		while ( have_rows('material_information') ) : the_row();

			$title       = get_sub_field( 'material_title' );
			$image       = get_sub_field( 'material_image' );
			$content     = get_sub_field( 'material_paragraph' );
			$link        = get_sub_field( 'material_link' );
			$button_text = get_sub_field( 'material_button_text' );

			echo '<div class="materials-page-repeater-inner-4-col">';

			echo '<a href="' . $link .'"><img src="' . $image . '" ></a>';

			echo '<a href="' . $link .'"><button>' . $button_text . '</button>';

			echo '<h2>' . $title . '</h2>';

			echo $content;

			echo '</div>';// end materials-page-repeater-inner

		endwhile;

	else :

		// no rows found

	endif;

	echo '</div>';// end materials-page-repeater-outer

}











genesis();