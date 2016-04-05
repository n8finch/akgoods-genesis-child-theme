<?php
/**
 * Template Name: Blog Page Template
 * Description: Use with query_args to show the featured medium image only of all called posts/pages. Works in Genesis 2.0 but not ideal for HTML5 because of the new classes. Use this in 1.9 or 2.0 without HTML5.
 */

remove_action( 'genesis_loop', 'genesis_do_loop' ); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_loop', 10 ); // Add custom loop

function custom_do_loop() {

	// Intro Text (from page content)
	echo '<div class="page hentry entry">';
	echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
	echo '<div class="blog-page-entry-content">';
	the_content();
	echo '</div><!-- end .entry-content -->';


	$args = array(
		'post_type'      => 'post',
		'orderby'        => 'date',
		'order'          => 'desc',
		'posts_per_page' => 4,
		'paged'          => get_query_var( 'paged' )
	);


	global $wp_query;
	$wp_query = new WP_Query( $args );

	if ( have_posts() ) :


		echo '<div class="blog-page-entries">';

		while ( have_posts() ) : the_post();

			$the_content     = get_the_content();

			if ( strlen( $the_content ) > 300 ) {
				$the_content = substr( $the_content, 0, 300 ) . '...';
			}

			$paged = $wp_query->get( 'paged' );

			if ( ! $paged || $paged < 2 ) {
				// This is not a paginated page (or it's simply the first page of a paginated page/post)

				echo '<div class="blog-page-single-entries-first-page-only">';
				echo '<h2 class="blog-page-first-post-only"> <a href="' . get_permalink() . '"> ' . get_the_title() . ' </a> </h2>'; // show the title
				echo '<div class="blog-page-single-entries-left">';
				echo '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">'; // Original Grid
				echo get_the_post_thumbnail( $thumbnail->ID, 'portfolio' );
				echo '</a>';
				echo '</div>';
				echo '<div class="blog-page-single-entries-right">';
				echo '<h2> <a href="' . get_permalink() . '"> ' . get_the_title() . ' </a> </h2>'; // show the title
				echo '<div class="blog-post-categories">';
				the_category( ' | ' );
				echo '</div>';
				echo '<p>' . $the_content . '</p>';
				echo '<p class="blog-page-date-posted">' . get_the_date() . '</p>';

				echo '<a class="blog-page-read-more-link" href="' . get_permalink() . '"><span class="fa fa-caret-right"></span> Read More</a>'; // show the title
				echo '</div>';
				echo '</div>';

			} else {
				// This is a paginated page.

				echo '<div class="blog-page-single-entries">';
				echo '<div class="blog-page-single-entries-left">';
				echo '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">'; // Original Grid
				echo get_the_post_thumbnail( $thumbnail->ID, 'portfolio' );
				echo '</a>';
				echo '</div>';
				echo '<div class="blog-page-single-entries-right">';
				echo '<h2> <a href="' . get_permalink() . '"> ' . get_the_title() . ' </a> </h2>'; // show the title
				echo '<div class="blog-post-categories">';
				the_category( ' | ' );
				echo '</div>';
				echo '<p>' . $the_content . '</p>';
				echo '<p class="blog-page-date-posted">' . get_the_date() . '</p>';

				echo '<a class="blog-page-read-more-link" href="' . get_permalink() . '"><span class="fa fa-caret-right"></span> Read More</a>'; // show the title
				echo '</div>';
				echo '</div>';

			}


		endwhile;
		do_action( 'genesis_after_endwhile' );
		echo '</div>'; //end <div class="blog-page-entries">
	endif;

	wp_reset_query();
}

/**
 * Reposition sidebar on categories
 */

add_action( 'genesis_loop', 'akgoods_blog_sidebar', 11 );

function akgoods_blog_sidebar() {

	echo '<div class="akgoods-blog-sidebar desktop-only">';
	genesis_widget_area( 'blog-sidebar' );
	echo '</div>';

}


genesis();