<?php
do_action( 'genesis_home' );

//* Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action( 'genesis_after_header', 'jessica_home_top' );
function jessica_home_top() {
	echo '<div class="home-top">';

	genesis_widget_area( 'rotator', array( 'before' => '<div class="home-slider"><div class="wrap">', 'after' => '</div></div>') );
	genesis_widget_area( 'home-nav', array( 'before' => '<div class="home-mid-nav"><div class="wrap">', 'after' => '</div></div>') );

	echo '</div>';
}


// Remove the standard loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Execute custom child loop
add_action( 'genesis_loop', 'jessica_home_loop_helper' );
function jessica_home_loop_helper() {

	echo'<div class="home-cta">';

	genesis_widget_area( 'home-cta-left', array( 'before' => '<div class="home-cta-left widget-area">', 'after' => '</div>') );
	genesis_widget_area( 'home-cta-right', array( 'before' => '<div class="home-cta-right widget-area">', 'after' => '</div>') );

	echo'</div >';

	echo'<div class="home-mid">';

	genesis_widget_area( 'home-mid-left', array( 'before' => '<div class="home-mid-left widget-area">', 'after' => '</div>') );
	genesis_widget_area( 'home-mid-right', array( 'before' => '<div class="home-mid-right widget-area">', 'after' => '</div>') );

	echo'</div >';

	genesis_widget_area( 'home-bottom-ad', array( 'before' => '<div class="home-bottom-ad widget-area">', 'after' => '</div>') );

}

add_action('genesis_before_footer', 'jessica_bottom_widgets', 5 );
function jessica_bottom_widgets() {
	echo'<div class="bottom-widgets">';
	echo'<div class="wrap">';

		genesis_widget_area( 'bottom1', array( 'before' => '<div class="bottom1 widget-area">', 'after' => '</div>') );
		genesis_widget_area( 'bottom2', array( 'before' => '<div class="bottom2 widget-area">', 'after' => '</div>') );
		genesis_widget_area( 'bottom3', array( 'before' => '<div class="bottom3 widget-area">', 'after' => '</div>') );
		genesis_widget_area( 'bottom4', array( 'before' => '<div class="bottom4 widget-area">', 'after' => '</div>') );

	echo'</div >';
	echo'</div >';
}


genesis();