<?php
/**
 * Modification of the Genesis Featured Page Widget
 * to add customizable text area option.
 *
 */


add_action( 'widgets_init', create_function( '', "register_widget('WSM_CTA_Widget');" ) );


class WSM_CTA_Widget extends WP_Widget {

	/**
	 * Constructor. Set the default widget options and create widget.
	 */
	function __construct() {
		$widget_ops = array( 'classname' => 'wsm-cta', 'description' => __( 'Displays backgrounds and customizable headline and Link', 'jessica' ) );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'wsm-cta-widget' );
		parent::__construct( 'wsm-cta-widget', __( 'Web Savvy - CTA Widget', 'jessica' ), $widget_ops, $control_ops );
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
			'wsm-title' => '',
			'wsm-moretext' => '',
			'wsm-morelink' => '',
			'wsm-target' => '',
			'wsm-cta-image-url' => '',

		) );

		// WMPL
		/**
		 * Filter strings for WPML translation
     	 */
     	$instance['wsm-title'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-title'], 'Widgets', 'Web Savvy - CTA Widget - Title' );
     	$instance['wsm-moretext'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-moretext'], 'Widgets', 'Web Savvy - CTA Widget - More Text' );
     	$instance['wsm-morelink'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-morelink'], 'Widgets', 'Web Savvy - CTA Widget - Link' );
     	$instance['wsm-target'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-target'], 'Widgets', 'Web Savvy - CTA Widget - Target' );
     	$instance['wsm-cta-image-url'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-cta-image-url'], 'Widgets', 'Web Savvy - Image' );
     	// WPML


		echo $before_widget;

			// Set up the CTA


			echo '<div class="cta-box">';


				if (!empty( $instance['wsm-cta-image-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta-image-url'] ) .'" alt="" />';
				}

					if (!empty( $instance['wsm-title'] ) ) {
					$title = wp_kses_post($instance['wsm-title']);
						echo '<h4 class="cta-title">';
						echo $title ;
						echo '</h4>';
					}

					if (!empty( $instance['wsm-moretext'] ) ) {
					if (!empty( $instance['wsm-morelink'] ) ) :
						echo '<span class="more-link"><a href="'. esc_attr( $instance['wsm-morelink'] ) . '"  target="'. esc_attr( $instance['wsm-target'] ) . '">'. esc_attr( $instance['wsm-moretext'] ) . '</a></span>';
					else:
						echo '<span class="more-link"><a href="#"  target="'. esc_attr( $instance['wsm-target'] ) . '">'. esc_attr( $instance['wsm-moretext'] ) . '</a></span>';
					endif;

					}

				echo '</div><!--end .cta-box-->';

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
		$new_instance['wsm-title'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm-title']) ) );
		$new_instance['wsm-moretext'] = strip_tags( $new_instance['wsm-moretext'] );
		$new_instance['wsm-morelink'] = strip_tags( $new_instance['wsm-morelink'] );
		$new_instance['wsm-cta-image-url'] = strip_tags( $new_instance['wsm-cta-image-url'] );
		$new_instance['wsm-target'] = strip_tags( $new_instance['wsm-target'] );

		// WMPL
		/**
		 * register strings for translation
     	 */
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - Title', $new_instance['wsm-title'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - More Text', $new_instance['wsm-moretext'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - Link', $new_instance['wsm-morelink'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - Image', $new_instance['wsm-cta-image-url'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - Target', $new_instance['wsm-target'] );
	 	// WMPL

		return $new_instance;
	}

	/** Echo the settings update form.
	 *
	 * @param array $instance Current settings
	 */
	function form($instance) {

		$instance = wp_parse_args( (array)$instance, array(

			'wsm-title' => '',
			'wsm-moretext' => '',
			'wsm-morelink' => '',
			'wsm-target' => '',
			'wsm-cta-image-url' => '',

		) );

		$title = esc_attr($instance['wsm-title']);

?>

		<p><label for="<?php echo $this->get_field_id('wsm-title'); ?>"><?php _e( 'Title ', 'jessica' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-title'); ?>" name="<?php echo $this->get_field_name('wsm-title'); ?>" value="<?php echo $title; ?>" class="widefat" /></p>

		<p><label for="<?php echo $this->get_field_id('wsm-moretext'); ?>"><?php _e( 'More Text ', 'jessica' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-moretext'); ?>" name="<?php echo $this->get_field_name('wsm-moretext'); ?>" value="<?php echo esc_attr( $instance['wsm-moretext'] ); ?>" class="widefat" /></p>

		<p><label for="<?php echo $this->get_field_id('wsm-morelink'); ?>"><?php _e( 'Link ', 'jessica' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-morelink'); ?>" name="<?php echo $this->get_field_name('wsm-morelink'); ?>" value="<?php echo esc_attr( $instance['wsm-morelink'] ); ?>" class="widefat" /></p>

		<p><label for="<?php echo $this->get_field_id('wsm-cta-image-url'); ?>"><?php _e( 'Image ', 'jessica' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta-image-url'); ?>" name="<?php echo $this->get_field_name('wsm-cta-image-url'); ?>" value="<?php echo esc_attr( $instance['wsm-cta-image-url'] ); ?>" class="widefat" /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'wsm-target' ); ?>"><?php _e( 'Target', 'jessica' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'wsm-target' ); ?>" name="<?php echo $this->get_field_name( 'wsm-target' ); ?>">
				<option value="_blank" <?php selected( '_blank', $instance['wsm-target'] ); ?>><?php _e( '_blank', 'jessica' ); ?></option>
				<option value="_parent" <?php selected( '_parent', $instance['wsm-target'] ); ?>><?php _e( '_parent', 'jessica' ); ?></option>
				<option value="_self" <?php selected( '_self', $instance['wsm-target'] ); ?>><?php _e( '_self', 'jessica' ); ?></option>
				<option value="_top" <?php selected( '_top', $instance['wsm-target'] ); ?>><?php _e( '_top', 'jessica' ); ?></option>
			</select>
		</p>

	<?php
	}
}