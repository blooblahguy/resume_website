<?php

////////////////////////////////////////////////
// Tweaks
////////////////////////////////////////////////
// optimize acf
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

// optimize wp
remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Category Feeds
remove_action( 'wp_head', 'feed_links', 2 );                            // Post and Comment Feeds
remove_action( 'wp_head', 'rsd_link' );                                 // EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' );                         // Windows Live Writer
remove_action( 'wp_head', 'index_rel_link' );                           // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              // previous link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Links for Adjacent Posts
remove_action( 'wp_head', 'wp_generator' );                             // WP version
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('welcome_panel', 'wp_welcome_panel'); // remove welcome display that encourages users to break their perfectly good site
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // remove front end emojis
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // remove front end emojis

if (! is_admin()) {
	wp_deregister_script('jquery');                                     // De-Register jQuery
	wp_register_script('jquery', '', '', '', true);                     // Register as 'empty', because we manually insert our script in header.php
}

// Remove things from the admin sidebar that will let them break the site
function remove_menus(){
	if (!is_super_admin()) {
		remove_menu_page('index.php'); // dashboard
		remove_menu_page('tools.php'); // tools
	}
	remove_menu_page('edit-comments.php'); // comments
	remove_menu_page('cptui_manage_post_types');
	remove_menu_page('themes.php'); // appearance
	remove_menu_page('edit-comments.php'); // comments
	// move the useful parts of appearance out to other locations
	add_menu_page("Widgets", "Widgets", "administrator", "widgets.php", '', 'dashicons-welcome-widgets-menus', 21);
	add_menu_page("Menus", "Menus", "administrator", "nav-menus.php", '', 'dashicons-menu', 20);
	add_submenu_page("options-general.php", "Themes", "Themes", "administrator", "themes.php");
	// add_submenu_page("options-general.php", "Custom Fields", "Custom Fields", "administrator", "edit.php?post_type=acf-field-group");
}
add_action( 'admin_menu', 'remove_menus');

// Force Gravity Forms to init scripts in the footer and ensure that the DOM is loaded before scripts are executed
add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );
function wrap_gform_cdata_open( $content = '' ) {
	if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
		return $content;
	}
		$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
		return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );
function wrap_gform_cdata_close( $content = '' ) {
	if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
		return $content;
	}
	$content = ' }, false );';
	return $content;
}

?>