<?php
	// inclcude atlas core
	require_once("atlas/atlas.php");
	
	// include custom parts
	include("template-parts/custom-shortcodes.php");
	include("template-parts/custom-widgets.php");

	// portfolio image sizes
	// add_image_size();

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Portfolio',
			'menu_title'	=> 'Portfolio',
			'menu_slug' 	=> 'portfolio',
			'icon_url'	 	=> "dashicons-tablet",
			'position'		=> 50
		));
	}

	// do other custom stuff down here
	function gl_cpts() {
		// register_post_type('portfolio',
		// 	array(
		// 		'labels' => array(
		// 			'name' => "Portfolio",
		// 			'singular_name' => "Portfolio"
		// 		),
		// 		'public'      => true,
		// 		'has_archive' => true,
		// 	)
		// );

		register_post_type('references',
			array(
				'labels' => array(
					'name' => "References",
					'singular_name' => "Reference"
				),
				'public'      => true,
				'has_archive' => true,
			)
		);

		register_post_type('experience',
			array(
				'labels' => array(
					'name' => "Experience",
					'singular_name' => "Experience"
				),
				'public'      => true,
				'has_archive' => true,
			)
		);

		register_post_type('qualitications',
			array(
				'labels' => array(
					'name' => "Qualifications",
					'singular_name' => "Qualification"
				),
				'public'      => true,
				'has_archive' => true,
			)
		);
	}
	add_action('init', 'gl_cpts');
?>