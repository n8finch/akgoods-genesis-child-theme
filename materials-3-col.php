<?php
/**
 * Template Name: Materials Page 3 Columns
 * Description: Used to display Materials in 3 Columns
 */


add_action( 'genesis_loop', 'get_the_materials_columns_3' );

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_entry_header', 'replace_page_title_centered' );

function replace_page_title_centered() {
	$title = get_the_title();
	echo '<h1 class="materials-page-title">' . $title . '</h1>';
}

function get_the_materials_columns_3() {

	echo '<div class="materials-page-repeater-outer">';
	// check if the repeater field has rows of data
	if ( have_rows( 'material_information' ) ):

		$i = 1;

		// loop through the rows of data
		while ( have_rows( 'material_information' ) ) : the_row();


			$title       = get_sub_field( 'material_title' );
			$image       = get_sub_field( 'material_image' );
			$content     = get_sub_field( 'material_paragraph' );
			$link        = get_sub_field( 'material_link' );
			$button_text = get_sub_field( 'material_button_text' );

			echo '<div class="materials-page-repeater-inner-3-col">';

			echo '<a href="' . $link . '"><img src="' . $image . '" ></a>';

			echo '<a href="' . $link . '"><button>' . $button_text . '</button></a>';

			echo '<a href="'.$link.'"><h3>' . $title . '</h3></a>';

			echo '<a href="'.$link.'">' . $content . '</a>';

			echo '</div>';// end materials-page-repeater-inner

			if ( $i % 3 === 0 ) {
//				echo '<div class="materials-column-page-clearfix"></div>';
			}

			$i ++;

		endwhile;

	else :

		// no rows found

	endif;

	echo '</div>';// end materials-page-repeater-outer

}


genesis();