<?php
/**
 * Jessica Settings
 *
 * This file registers all of Jessica's specific Theme Settings, accessible from
 * Genesis --> Jessica Settings.
 *
 * NOTE: Change out "Jessica" in this file with name of theme and delete this note
 */

/**
 * Registers a new admin page, providing content and corresponding menu item
 * for the Child Theme Settings page.
 *
 * @since 1.0.0
 *
 * @package jessica
 * @subpackage Jessica_Settings
 */
class Jessica_Settings extends Genesis_Admin_Boxes {

	/**
	 * Create an admin menu item and settings page.
	 * @since 1.0.0
	 */
	function __construct() {

		// Specify a unique page ID.
		$page_id = 'jessica';

		// Set it as a child to genesis, and define the menu and page titles
		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => __( 'Jessica Settings', 'jessica' ),
				'menu_title'  => __( 'Jessica Settings', 'jessica' ),
				'capability' => 'manage_options',
			)
		);

		// Set up page options. These are optional, so only uncomment if you want to change the defaults
		$page_ops = array(
		//	'screen_icon'       => 'options-general',
		//	'save_button_text'  => 'Save Settings',
		//	'reset_button_text' => 'Reset Settings',
		//	'save_notice_text'  => 'Settings saved.',
		//	'reset_notice_text' => 'Settings reset.',
		);

		// Give it a unique settings field.
		// You'll access them from genesis_get_option( 'option_name', 'jessica-settings' );
		$settings_field = 'jessica-settings';

		// Set the default values
		$default_settings = array(
			'wsm_top_search' => 0,
			'wsm_copyright' => 'My Name, All Rights Reserved',
			'wsm_credit' => 'WordPress Theme by Web Savvy Marketing',
		);

		// Create the Admin Page
		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		// Initialize the Sanitization Filter
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );

	}

	/**
	 * Set up Sanitization Filters
	 * @since 1.0.0
	 *
	 * See /lib/classes/sanitization.php for all available filters.
	 */
	function sanitization_filters() {

		genesis_add_option_filter( 'safe_html', $this->settings_field,
			array(
				'wsm_copyright',
				'wsm_credit',
			) );
	}

	/**
	 * Set up Help Tab
	 * @since 1.0.0
	 *
	 * Genesis automatically looks for a help() function, and if provided uses it for the help tabs
	 * @link http://wpdevel.wordpress.com/2011/12/06/help-and-screen-api-changes-in-3-3/
	 */
	 function help() {
	 	$screen = get_current_screen();

		$screen->add_help_tab( array(
			'id'      => 'sample-help',
			'title'   => 'Sample Help',
			'content' => '<p>Help content goes here.</p>',
		) );
	 }

	/**
	 * Register metaboxes on Child Theme Settings page
	 * @since 1.0.0
	 */
	function metaboxes() {

		add_meta_box('wsm_header_metabox', __( 'Header Info', 'jessica' ), array( $this, 'wsm_header_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_subheader_metabox', __( 'Sub Header', 'jessica' ), array( $this, 'wsm_subheader_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_footer_info_metabox', __( 'Footer Info', 'jessica' ), array( $this, 'wsm_footer_info_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_upate_notifications_metabox', __( 'Update Notifications', 'jessica' ), array( $this, 'wsm_upate_notifications_metabox' ), $this->pagehook, 'main', 'high');

	}


	/**
	 * Header Search Metabox
	 * @since 1.0.0
	 */
	function wsm_header_metabox() {

		echo '<p><strong>' . __( 'Header Search:', 'jessica' ) . '</strong><br/><input type="checkbox" name="' . $this->get_field_name( 'wsm_top_search' ) . '" id="' . $this->get_field_id( 'wsm_top_search' ) . '" value="1"';
        checked( 1, $this->get_field_value( 'wsm_top_search' ) ); echo '/>';
		echo '<em>' . __( 'By default, leaving this unchecked will display header search', 'jessica' ) . '</em></p>';
		// Add Contact Information
		echo '<p><strong>' . __( 'Phone:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_phone' ) . '" id="' . $this->get_field_id( 'wsm_header_phone' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_phone' ) ) . '" size="70" /></p>';
		echo '<p><strong>' . __( 'Fax:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_fax' ) . '" id="' . $this->get_field_id( 'wsm_header_fax' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_fax' ) ) . '" size="70" /></p>';
		echo '<p><strong>' . __( 'Email:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_email' ) . '" id="' . $this->get_field_id( 'wsm_header_email' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_email' ) ) . '" size="70" /></p>';
		// Add Social Media Information
		echo '<h3><strong>' . __( 'Social Media Links:', 'jessica' ) . '</strong></h3>';
		echo '<p><strong>' . __( 'Pinterest:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_pinterest' ) . '" id="' . $this->get_field_id( 'wsm_header_pinterest' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_pinterest' ) ) . '" size="70" /></p>';
		echo '<p><strong>' . __( 'Houzz:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_houzz' ) . '" id="' . $this->get_field_id( 'wsm_header_houzz' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_houzz' ) ) . '" size="70" /></p>';
		echo '<p><strong>' . __( 'Instagram:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_instagram' ) . '" id="' . $this->get_field_id( 'wsm_header_instagram' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_instagram' ) ) . '" size="70" /></p>';
		echo '<p><strong>' . __( 'Google+:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_google_plus' ) . '" id="' . $this->get_field_id( 'wsm_header_google_plus' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_google_plus' ) ) . '" size="70" /></p>';
		echo '<p><strong>' . __( 'Facebook:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_facebook' ) . '" id="' . $this->get_field_id( 'wsm_header_facebook' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_facebook' ) ) . '" size="70" /></p>';
		echo '<p><strong>' . __( 'Twiter:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_twitter' ) . '" id="' . $this->get_field_id( 'wsm_header_twitter' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_twitter' ) ) . '" size="70" /></p>';
		echo '<p><strong>' . __( 'YouTube:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_youtube' ) . '" id="' . $this->get_field_id( 'wsm_header_youtube' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_youtube' ) ) . '" size="70" /></p>';

	}

	/**
	 * Sub Header Metabox
	 * @since 1.0.0
	 */

	function wsm_subheader_metabox() {
		echo '<p><strong>' . __( 'Lead Text:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_leadtext' ) . '" id="' . $this->get_field_id( 'wsm_subheader_leadtext' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_leadtext' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Hover Text 1:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_hovertext1' ) . '" id="' . $this->get_field_id( 'wsm_subheader_hovertext1' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_hovertext1' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Image 1:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_image1' ) . '" id="' . $this->get_field_id( 'wsm_subheader_image1' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_image1' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Link 1:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_link1' ) . '" id="' . $this->get_field_id( 'wsm_subheader_link1' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_link1' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Hover Text 2:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_hovertext2' ) . '" id="' . $this->get_field_id( 'wsm_subheader_hovertext2' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_hovertext2' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Image 2:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_image2' ) . '" id="' . $this->get_field_id( 'wsm_subheader_image2' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_image2' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Link 2:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_link2' ) . '" id="' . $this->get_field_id( 'wsm_subheader_link2' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_link2' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Hover Text 3:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="texta" name="' . $this->get_field_name( 'wsm_subheader_hovertext3' ) . '" id="' . $this->get_field_id( 'wsm_subheader_hovertext3' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_hovertext3' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Image 3:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_image3' ) . '" id="' . $this->get_field_id( 'wsm_subheader_image3' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_image3' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Link 3:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_subheader_link3' ) . '" id="' . $this->get_field_id( 'wsm_subheader_link3' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_subheader_link3' ) ) . '" size="70" /></p>';
	}

	/**
	 * Footer Info Metabox
	 * @since 1.0.0
	 */
	function wsm_footer_info_metabox() {

		echo '<p><strong>' . __( 'Credit Info:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_credit' ) . '" id="' . $this->get_field_id( 'wsm_credit' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_credit' ) ) . '" size="70" /></p>';

		echo '<p><strong>' . __( 'Copyright Info:', 'jessica' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_copyright' ) . '" id="' . $this->get_field_id( 'wsm_copyright' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_copyright' ) ) . '" size="70" /></p>';

	}

	/**
	 * Update Notifications Metabox
	 * @since 1.0.0
	 */
	function wsm_upate_notifications_metabox() {

		echo '<p>' . __( 'Please check the box below if you wish to ignore/hide the theme update notification.<br/>Uncheck the box if you wish to be notified of theme updates.', 'jessica' ) . '</p>';

		echo '<input type="checkbox" name="' . $this->get_field_name( 'wsm_ignore_updates' ) . '" id="' .  $this->get_field_id( 'wsm_ignore_updates' ) . '" value="1" ';
		checked( 1, $this->get_field_value( 'wsm_ignore_updates' ) );
		echo '/> <label for="' . $this->get_field_id( 'wsm_ignore_updates' ) . '">' . __( 'Ignore Theme Updates?', 'jessica' ) . '</label>';

	}

}

/**
 * Add the Theme Settings Page
 * @since 1.0.0
 */
function jessica_add_settings() {
	global $_child_theme_settings;
	$_child_theme_settings = new Jessica_Settings;
}
add_action( 'genesis_admin_menu', 'jessica_add_settings' );