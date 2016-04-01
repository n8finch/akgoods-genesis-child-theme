<?php
/**
 * Template Name: Materials Page 4 Columns
 * Description: Used to display Materials in 4 Columns
 */


add_action( 'genesis_loop', 'get_the_materials_columns_4' );

function get_the_materials_columns_4() {

	echo '<div class="materials-page-repeater-outer">';
	// check if the repeater field has rows of data
	if ( have_rows( 'material_information' ) ):

		$i = 1;

		// loop through the rows of data
		while ( have_rows( 'material_information' ) ) : the_row();

			$button_text_holder = '';

			$title       = get_sub_field( 'material_title' );
			$image       = get_sub_field( 'material_image' );
			$content     = get_sub_field( 'material_paragraph' );
			$link        = get_sub_field( 'material_link' );
			$button_text = get_sub_field( 'material_button_text' );

			echo '<div class="materials-page-repeater-inner-4-col">';

			echo '<a href="' . $link .'"><img src="' . $image . '" ></a>';

			if ( $button_text_holder !== $button_text) {
			echo '<a href="' . $link .'"><button>' . $button_text . '</button></a>';
			}

			echo '<h3>' . $title . '</h3>';

			echo $content;

			echo '</div>';// end materials-page-repeater-inner

			if ( $i%4 === 0 ) {
//				echo '<div class="materials-column-page-clearfix"></div>';
			}

			$i++;

		endwhile;

	else :

		// no rows found

	endif;

	echo '</div>';// end materials-page-repeater-outer

}


genesis();