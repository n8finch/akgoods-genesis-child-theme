<?php
/**
 * Provides a notification everytime the theme is updated
 *
 */

function update_notifier_menu() {

	$ignore = genesis_get_option( 'wsm_ignore_updates', 'jessica-settings' );
	if ( 1 == $ignore )
			return;
	$update_check_int = 24; // Time in hours to check file for new version
	$update_check_int_seconds = $update_check_int * 3600;
	$xml = get_latest_theme_version( $update_check_int_seconds );
	$theme_data = wp_get_theme();

	if( isset( $xml->latest ) && version_compare( $theme_data->get( 'Version' ), $xml->latest ) == -1 ) {
		add_dashboard_page( $theme_data->get( 'Name' ) . 'Theme Updates', $theme_data->get( 'Name' ) . ' <span class="update-plugins count-1"><span class="update-count">Update</span></span>', 'administrator', strtolower( trim( preg_replace( '/[^A-Za-z0-9-]+/', '-', $theme_data->get( 'Name' ) ) ) ) . '-updates', 'update_notifier' );
	}
}

add_action('admin_menu', 'update_notifier_menu');

function update_notifier() {
	global $update_check_int, $update_check_int_seconds;
	$xml = get_latest_theme_version( $update_check_int_seconds ); // This tells the function to cache the remote call for 21600 seconds (6 hours)
	$theme_data = wp_get_theme(); ?>

	<style>
		.update-nag {display: none;}
		#instructions {max-width: 800px;}
		h3.title {margin: 30px 0 0 0; padding: 30px 0 0 0; border-top: 1px solid #ddd;}
		ul {line-height:1;list-style: disc inside;}
		p span {font-weight:bold;padding-left:20px;}
	</style>

	<div class="wrap">

		<div id="icon-tools" class="icon32"></div>
		<h2><?php echo $theme_data->get( 'Name' ); ?> Theme Updates</h2>
	    <div id="message" class="updated below-h2"><p><strong>There is a new version of the <?php echo $theme_data->get( 'Name' ); ?> theme available.</strong> You have version <?php echo $theme_data->get( 'Version' ); ?> installed. Update to version <?php echo $xml->latest; ?>.</p></div>

        <img style="float: left; margin: 0 20px 20px 0; border: 1px solid #ddd; width:300px;" src="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/screenshot.png'; ?>" />

        <div id="instructions" style="max-width: 800px;">
            <h3>Update Download and Instructions</h3>
            <p><strong>Please note:</strong> make a <strong>backup</strong> of your <?php echo $theme_data->get( 'Name' ); ?> Theme prior to upgrading.</p>
            <p>To update the Theme, login to your <a href="http://www.web-savvy-marketing.com/my-account/" target="_blank">My Account</a> page and re-download the theme like you did when you bought it.</p>
            <p>Extract the <strong><?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $theme_data->get( 'Name' )))); ?>-<?php echo $xml->latest; ?>.zip</strong> file's contents, look for the extracted theme folder, upload the folder's contents using FTP to the <strong>/wp-content/themes/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $theme_data->get( 'Name' )))); ?>/</strong> folder overwriting the old files (this is why it's important to backup any changes you've made to the theme files).</p>
            <p>If you didn't make any changes to the theme files, you are free to overwrite them with the new ones without the risk of losing theme settings, pages, posts, etc.</p>
            <p>If you have made any changes to the theme files <strong>updating will overwrite your customizations</strong>. In that case you may elect not to update your theme. You may go to the <a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=jessica"><?php echo $theme_data->get( 'Name' ); ?> Settings</a> page to disable this update notification.</p>
        </div>

            <div class="clear"></div>

	    <h3 class="title">Changelog</h3>
	    <?php echo $xml->changelog; ?>

	</div>

<?php }

// This function retrieves a remote xml file on my server to see if there's a new update
// For performance reasons this function caches the xml content in the database for XX seconds ($interval variable)
function get_latest_theme_version( $interval ) {
	// remote xml file location
	$notifier_file_url = 'https://www.web-savvy-marketing.com/files/theme-versions/jessica.xml';

	$db_cache_field = 'contempo-notifier-cache';
	$db_cache_field_last_updated = 'contempo-notifier-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	// check the cache
	if ( !$last || (( $now - $last ) > $interval ) ) {

		$response = wp_remote_get( $notifier_file_url );
		$cache = ! is_wp_error( $response ) && ! empty( $response['body'] ) ? $response['body'] : false;

		if ($cache) {
			// we got good results
			update_option( $db_cache_field, $cache );
			update_option( $db_cache_field_last_updated, time() );
		}
	}

	// read from the cache file
	$notifier_data = get_option( $db_cache_field );

	$xml = simplexml_load_string( $notifier_data );

	return $xml;
}