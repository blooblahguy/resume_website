<?php
	// inclcude atlas core
	require_once("atlas_core/atlas.php");

	// Register Sidebars in Bulk
	$sidebars = array();

	foreach ($sidebars as $sidebar) {
		register_sidebar(array(
			"name" => $sidebar
			, "id" => sanitize_title($sidebar)
			, 'before_widget' => '<div id="%1$s" class="widget %2$s">'
			, 'after_widget' => '</div></div>'
			, 'before_title' => '<div class="title">'
			, 'after_title' => '</div><div class="content">'
		));
	}

	// fix sidebar divs
	add_filter( 'dynamic_sidebar_params', 'check_sidebar_params' );
	function check_sidebar_params( $params ) {
		global $wp_registered_widgets;

		$settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
		$settings = $settings_getter->get_settings();
		$settings = $settings[ $params[1]['number'] ];

		if ( $params[0][ 'after_widget' ] == '</div></div>' && isset( $settings[ 'title' ] ) && empty( $settings[ 'title' ] ) )
			$params[0][ 'before_widget' ] .= '<div class="content">';

		return $params;
	}

	// Custom Post Type
	function glade_init() {
		register_post_type("projects", array(
			"label" => "Projects",
			"public" => true,
			"hierarchical" => true,
			"menu_icon" => "dashicons-welcome-write-blog",
			"taxonomies" => array("post_tag"),
			"supports" => array("title", "editor", "page-attributes", "tags", "excerpt"),
			"show_in_rest" => true,
		));
	}
	add_action("init", "glade_init");

	function glade_remove_excess() {
		if (is_admin()) { return;  }
		global $wp_styles;
		global $wp_scripts;

		wp_dequeue_style("wp-block-library");
		wp_dequeue_script("wp-embed");
	}
	add_action("wp_head", "glade_remove_excess", 100);
	add_action("wp_print_scripts", "glade_remove_excess", 100);
	add_action("wp_print_styles", "glade_remove_excess", 100);

	// svg includes
	function get_file_contents_url($url) {
		if (strpos($url, $_SERVER['HTTP_HOST']) !== false) {
			$url = explode($_SERVER['HTTP_HOST'], $url);
			$url = $url[1];
			return file_get_contents($_SERVER['DOCUMENT_ROOT'].$url);
		} else {
			return file_get_contents(__DIR__.$url);
		}
	}

	// Remove archive from CPT browsing
	// add_filter( 'get_the_archive_title', function ($title) {
	// 	if ( is_category() ) {
	// 		$title = single_cat_title( '', false );
	// 	} elseif ( is_tag() ) {
	// 		$title = single_tag_title( '', false );
	// 	} elseif ( is_author() ) {
	// 		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	// 	} elseif ( is_archive() ) {
	// 		$title = post_type_archive_title();
	// 	}
	
	// 	return $title;
	// });

	require_once("projects.php")
?>