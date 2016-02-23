<?php
/**
 * Social Widget
 *
 * Displays links to Facebook, Twitter and Youtube
 *
 */
class wsm_Social_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
	function __construct() {
		$widget_ops = array( 'classname' => 'widget-social', 'description' => __( 'Social icon widget', 'jessica' ) );
		parent::__construct( 'social-widget', __( 'Web Savvy - Social Widget', 'jessica'), $widget_ops );
	}

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		// WMPL
		/**
		 * Filter strings for WPML translation
     	 */
     	$instance['wsm_custom_text'] = apply_filters( 'wpml_translate_single_string', $instance['wsm_custom_text'], 'Widgets', 'Web Savvy - Social Widget - Custom Text' );
     	$instance['wsm_twitter'] = apply_filters( 'wpml_translate_single_string', $instance['wsm_twitter'], 'Widgets', 'Web Savvy - Social Widget - Twitter' );
     	$instance['wsm_youtube'] = apply_filters( 'wpml_translate_single_string', $instance['wsm_youtube'], 'Widgets', 'Web Savvy - Social Widget - YouTube' );
     	$instance['wsm_facebook'] = apply_filters( 'wpml_translate_single_string', $instance['wsm_facebook'], 'Widgets', 'Web Savvy - Social Widget - Facebook' );
     	$instance['wsm_linkedin'] = apply_filters( 'wpml_translate_single_string', $instance['wsm_linkedin'], 'Widgets', 'Web Savvy - Social Widget - LinkedIn' );
     	$instance['wsm_googleplus'] = apply_filters( 'wpml_translate_single_string', $instance['wsm_googleplus'], 'Widgets', 'Web Savvy - Social Widget - Google+' );
     	$instance['wsm_pinterest'] = apply_filters( 'wpml_translate_single_string', $instance['wsm_pinterest'], 'Widgets', 'Web Savvy - Social Widget - Pinterest' );
     	$instance['wsm_instagram'] = apply_filters( 'wpml_translate_single_string', $instance['wsm_instagram'], 'Widgets', 'Web Savvy - Social Widget - Instagram' );
     	// WPML

		echo $before_widget;

		if (!empty( $instance['wsm_custom_text'] ) ) {
		$text = wp_kses_post($instance['wsm_custom_text']);
		echo '<div class="social-custom-text">';
		echo $text;
		echo '</div>';
		}
		if (!empty( $instance['wsm_twitter'] ) ) { echo '<a href="'. $instance['wsm_twitter'] .'" class="genericon genericon-twitter" target="_blank" title="Twitter">Twitter</a>'; }
		if (!empty( $instance['wsm_youtube'] ) ) { echo '<a href="'. $instance['wsm_youtube'] .'" class="genericon genericon-youtube" target="_blank" title="Youtube">Youtube</a>'; }
		if (!empty( $instance['wsm_facebook'] ) ) { echo '<a href="'. $instance['wsm_facebook'] .'" class="genericon genericon-facebook-alt" target="_blank" title="Facebook">Facebook</a>';}
		if (!empty( $instance['wsm_linkedin'] ) ) { echo '<a href="'. $instance['wsm_linkedin'] .'" class="genericon genericon-linkedin" target="_blank" title="Linkedin">Linkedin</a>'; }
		if (!empty( $instance['wsm_googleplus'] ) ) { echo '<a href="'. $instance['wsm_googleplus'] .'" class="genericon genericon-googleplus-alt" target="_blank" title="Google+">Google +</a>';}
		if (!empty( $instance['wsm_pinterest'] ) ) { echo '<a href="'. $instance['wsm_pinterest'] .'" class="genericon genericon-pinterest" target="_blank" title="Pinterest">Pinterest</a>';}
		if (!empty( $instance['wsm_instagram'] ) ) { echo '<a href="'. $instance['wsm_instagram'] .'" class="genericon genericon-instagram" target="_blank" title="Instagram">Instagram</a>';}
		echo $after_widget;
	}

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['wsm_custom_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm_custom_text']) ) );
		$instance['wsm_facebook'] = esc_url( $new_instance['wsm_facebook'] );
		$instance['wsm_twitter'] = esc_url( $new_instance['wsm_twitter'] );
		$instance['wsm_linkedin'] = esc_url( $new_instance['wsm_linkedin'] );
		$instance['wsm_youtube'] = esc_url( $new_instance['wsm_youtube'] );
		$instance['wsm_googleplus'] = esc_url( $new_instance['wsm_googleplus'] );
		$instance['wsm_pinterest'] = esc_url( $new_instance['wsm_pinterest'] );
		$instance['wsm_instagram'] = esc_url( $new_instance['wsm_instagram'] );;

		// WMPL
		/**
		 * register strings for translation
     	 */
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Social Widget - Custom Text', $new_instance['wsm_custom_text'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Social Widget - Twitter', $new_instance['wsm_twitter'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Social Widget - YouTube', $new_instance['wsm_youtube'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Social Widget - Facebook', $new_instance['wsm_facebook'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Social Widget - LinkedIn', $new_instance['wsm_linkedin'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Social Widget - Google+', $new_instance['wsm_googleplus'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Social Widget - Pinterest', $new_instance['wsm_pinterest'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Social Widget - Instagram', $new_instance['wsm_instagram'] );
	 	// WMPL

		return $instance;
	}

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
	function form( $instance ) {

		$defaults = array( 'wsm_custom_text'=> '', 'wsm_facebook' => '', 'wsm_twitter' => '', 'wsm_youtube' => '', 'wsm_linkedin' => '', 'wsm_googleplus' => '','wsm_pinterest' => '','wsm_instagram' => '', );

		$text = esc_textarea($instance['wsm_custom_text']);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p><label for="<?php echo $this->get_field_id('wsm_custom_text'); ?>"><?php _e( 'Custom Text:' ); ?></label>
		<textarea class="widefat" rows="2" cols="20" id="<?php echo $this->get_field_id('wsm_custom_text'); ?>" name="<?php echo $this->get_field_name('wsm_custom_text'); ?>"><?php echo $text; ?></textarea></p>


		<p><label for="<?php echo $this->get_field_id( 'wsm_facebook' ); ?>"><?php _e( 'Facebook URL:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'wsm_facebook' ); ?>" name="<?php echo $this->get_field_name( 'wsm_facebook' ); ?>" value="<?php echo $instance['wsm_facebook']; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'wsm_twitter' ); ?>"><?php _e( 'Twitter URL:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'wsm_twitter' ); ?>" name="<?php echo $this->get_field_name( 'wsm_twitter' ); ?>" value="<?php echo $instance['wsm_twitter']; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'wsm_linkedin' ); ?>"><?php _e( 'LinkedIn URL:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'wsm_linkedin' ); ?>" name="<?php echo $this->get_field_name( 'wsm_linkedin' ); ?>" value="<?php echo $instance['wsm_linkedin']; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'wsm_youtube' ); ?>"><?php _e( 'Youtube URL:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'wsm_youtube' ); ?>" name="<?php echo $this->get_field_name( 'wsm_youtube' ); ?>" value="<?php echo $instance['wsm_youtube']; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'wsm_googleplus' ); ?>"><?php _e( 'Google+ URL:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'wsm_googleplus' ); ?>" name="<?php echo $this->get_field_name( 'wsm_googleplus' ); ?>" value="<?php echo $instance['wsm_googleplus']; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'wsm_pinterest' ); ?>"><?php _e( 'Pinterest URL:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'wsm_pinterest' ); ?>" name="<?php echo $this->get_field_name( 'wsm_pinterest' ); ?>" value="<?php echo $instance['wsm_pinterest']; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'wsm_instagram' ); ?>"><?php _e( 'Instagram URL:' ); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'wsm_instagram' ); ?>" name="<?php echo $this->get_field_name( 'wsm_instagram' ); ?>" value="<?php echo $instance['wsm_instagram']; ?>" /></label></p>

		<?php

	}
}

add_action( 'widgets_init', create_function( '', "register_widget('wsm_Social_Widget');" ) );