<?php

/**
 * Shortcodes
 *
 * This file creates all the shortcodes used throughout the site.
 *
 */
 
 
/**
 * Use shortcodes in widgets
 */
add_filter('widget_text', 'do_shortcode');

/**
 * URL Shortcode
 *
 * @param	null
 * @return	string	Site URL
 */

add_shortcode('url','wsm_url_shortcode');

function wsm_url_shortcode($atts) {
	return get_bloginfo('url');
}

/**
 * WP URL Shortcode
 *
 * @param	null
 * @return	string	WordPress URL
 */

add_shortcode('wpurl','wsm_wpurl_shortcode');

function wsm_wpurl_shortcode($atts) {
	return get_bloginfo('wpurl');
}

/**
 * Child Shortcode
 *
 * @param	null
 * @return	string	Child Theme URL
 */

add_shortcode('child', 'wsm_child_shortcode');

function wsm_child_shortcode($atts) {
	return get_bloginfo('stylesheet_directory');
}

// Opens a div (useful for column classes)
add_shortcode('div', 'ws_div_shortcode');

function ws_div_shortcode($atts) {
	extract(shortcode_atts(array('class' => '', 'id' => '' ), $atts));
	if ($class) $show_class = ' class="'.$class.'"';
	if ($id) $show_id = ' id="'.$id.'"';
	return '<div'.$show_class.$show_id.'>';
}


// Closes a div
add_shortcode('end-div', 'wsm_end_div_shortcode');

function wsm_end_div_shortcode($atts) {
	return '</div>';
}