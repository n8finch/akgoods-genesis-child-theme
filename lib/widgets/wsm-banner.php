<?php
/**
 * Modification of the Genesis Featured Page Widget
 * to add customizable text area option.
 *
 */


add_action( 'widgets_init', create_function( '', "register_widget('WSM_Banner_Widget');" ) );


class WSM_Banner_Widget extends WP_Widget {

	/**
	 * Constructor. Set the default widget options and create widget.
	 */
	function __construct() {
		$widget_ops = array( 'classname' => 'wsm-banner', 'description' => __ ('Displays backgrounds and customizable headline and Link', 'jessica' ) );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'wsm-banner-widget' );
		parent::__construct( 'wsm-banner-widget', __( 'Web Savvy - On Sale Widget', 'jessica' ), $widget_ops, $control_ops );
	}

	/**
	 * Echo the widget content.
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	function widget($args, $instance) {
		extract($args);

		$instance = wp_parse_args( (array) $instance, array(
			'wsm-title1' => '',
			'wsm-moretext1' => '',
			'wsm-morelink1' => '',
			'wsm-banner-text' => '',
			'wsm-img-url' => '',
		) );


		// WMPL
		/**
		 * Filter strings for WPML translation
     	 */
     	$instance['wsm-title1'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-title1'], 'Widgets', 'Web Savvy - On Sale Widget - % Off' );
     	$instance['wsm-moretext1'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-moretext1'], 'Widgets', 'Web Savvy - On Sale Widget - More Text' );
     	$instance['wsm-morelink1'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-morelink1'], 'Widgets', 'Web Savvy - On Sale Widget - More URL' );
     	$instance['wsm-banner-text'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-banner-text'], 'Widgets', 'Web Savvy - On Sale Widget - Custom Text' );
     	$instance['wsm-img-url'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-img-url'], 'Widgets', 'Web Savvy - On Sale Widget - Image URL' );
     	// WPML

		echo $before_widget;

		// Set up the Banner Top

			echo '<div class="banner-box" style="background-image: url('. esc_attr( $instance['wsm-img-url'] ) . ');"> ';

		echo '<div class="banner-content">';
				if (!empty( $instance['wsm-title1'] ) ) {
						$title1 = wp_kses_post($instance['wsm-title1']);
						echo '<h3 class="banner-title">';
						echo'<b>';
						echo $title1;
						echo'</b>';
						echo '<span><span class="percent">%</span><br /> ' . __( 'off', 'jessica' ) . '</span>';
						echo '</h3>';
				}

			echo '<div class="custom-text">';

				if (!empty( $instance['wsm-banner-text'] ) ) {
						$text = wp_kses_post($instance['wsm-banner-text']);
						echo $text;
				}

			if (!empty( $instance['wsm-moretext1'] ) ) {
			if (!empty( $instance['wsm-morelink1'] ) ) :
				echo '<span class="more-link">';
					echo '<a href="'. esc_attr( $instance['wsm-morelink1'] ) . '" title="">'.esc_attr( $instance['wsm-moretext1'] ) .'</a>';
				echo '</span>';
			else :

			echo '<span class="more-link">';
					echo '<a href="#" title="">'.esc_attr( $instance['wsm-moretext1'] ) .'</a>';
				echo '</span>';

			endif;

			}

			echo '</div>';
			echo '</div>';
			echo '</div><!--end .banner-box -->';



		echo "\n\n";


		echo $after_widget;
		wp_reset_query();
	}

	/** Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update($new_instance, $old_instance) {

		$new_instance['wsm-title1'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm-title1']) ) );
		$new_instance['wsm-banner-text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm-banner-text']) ) );
		$new_instance['wsm-moretext1'] = strip_tags( $new_instance['wsm-moretext1'] );
		$new_instance['wsm-morelink1'] = strip_tags( $new_instance['wsm-morelink1'] );
		$new_instance['wsm-img-url'] = strip_tags( $new_instance['wsm-img-url'] );

		// WMPL
		/**
		 * register strings for translation
     	 */
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - On Sale Widget - % Off', $new_instance['wsm-title1'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - On Sale Widget - Custom Text', $new_instance['wsm-banner-text'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - On Sale Widget - More Text', $new_instance['wsm-moretext1'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - On Sale Widget - More Link', $new_instance['wsm-morelink1'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - On Sale Widget - Image URL', $new_instance['wsm-img-url'] );
	 	// WMPL

		return $new_instance;
	}

	/** Echo the settings update form.
	 *
	 * @param array $instance Current settings
	 */
	function form($instance) {

		$instance = wp_parse_args( (array)$instance, array(
			'wsm-title1' => '',
			'wsm-banner-text' => '',
			'wsm-moretext1' => '',
			'wsm-morelink1' => '',
			'wsm-img-url' => '',
		) );

		$title1 = esc_attr($instance['wsm-title1']);
			$text = esc_textarea($instance['wsm-banner-text']);



		echo '<p><input type="text" id="' . $this->get_field_id( 'wsm-title1' ) . '" name="' . $this->get_field_name( 'wsm-title1' ) , '" value="' . $title1 . '" size="2" /> ' . __( '% OFF', 'jessica' ) . '</p>';

		echo '<p><label for="' . $this->get_field_id( 'wsm-banner-text' ) . '">' . __( 'Custom Text:', 'jessica' ) . '</label>';
		echo '<textarea class="widefat" rows="4" cols="20" id="' . $this->get_field_id( 'wsm-banner-text' ) . '" name="' . $this->get_field_name( 'wsm-banner-text' ) . '">' . $text . '</textarea></p>';

		echo '<p><label for="' . $this->get_field_id('wsm-moretext1') . '">' . __( 'More Text:', 'jessica' ) . '</label>';
		echo '<input type="text" id="' . $this->get_field_id('wsm-moretext1') . '" name="' . $this->get_field_name('wsm-moretext1') . '" value="' . esc_attr( $instance['wsm-moretext1'] ) . '" class="widefat" /></p>';

		echo '<p><label for="' . $this->get_field_id('wsm-morelink1') . '">' .__( 'More URL:', 'jessica' ) . '</label>';
		echo '<input type="text" id="' . $this->get_field_id('wsm-morelink1') . '" name="' . $this->get_field_name('wsm-morelink1') . '" value="' . esc_attr( $instance['wsm-morelink1'] ) . '" class="widefat" /></p>';

		echo '<p><label for="' . $this->get_field_id('wsm-img-url') . '">' .__( 'Image URL:', 'jessica' ) . '</label>';
		echo '<input type="text" id="' . $this->get_field_id('wsm-img-url') . '" name="' . $this->get_field_name('wsm-img-url') . '" value="' . esc_attr( $instance['wsm-img-url'] ) . '" class="widefat" /></p>';

	}

}