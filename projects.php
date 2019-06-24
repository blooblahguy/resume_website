<?
	function get_project_image($post, $size = "medium") {
		$fields = get_fields($post);
		// debug($fields);
		if ($fields['image_type'] == "website") {
			return reset(wp_get_attachment_image_src($fields['website_images']['desktop'], $size));
		} else {
			return reset(wp_get_attachment_image_src($fields['images'][0]['image'], $size));
		}
	}

	add_shortcode("project_index", "project_index");
	function project_index($atts) {
		$projects_query = new WP_Query(array(
			'post_type' => 'projects',
			'posts_per_page' => '-1',
			'status' => 'publish',
		));
		$all = $projects_query->posts;
		$projects = array();
		foreach ($all as $p) {
			if ($p->post_parent > 0) {
				$projects[$p->post_parent]['children'][] = $p;
			} else {
				$projects[$p->ID]['parent'] = $p;
			}		
		}	

		ob_start(); ?>
			
		<? foreach ($projects as $projs) { 
			$parent = $projs['parent']; 
			$children = $projs['children'];
			setup_postdata( $parent );
			?>
			<div class="card project bg-light-grey">
				<div class="hero">
					<img data-src="<? echo get_project_image($parent->ID, "medium-large"); ?>" class="lazyload" alt="<? echo $parent->post_title; ?>">
					<h2><a href="<? echo get_the_permalink($parent->ID); ?>"><? echo $parent->post_title; ?></a></h2>
				</div>
				
				<div class="excerpt padx1 padt1"><? echo get_the_excerpt(); ?></div>
				<div class="children pad1">
					<div class="row md-g1">
						<? foreach ($children as $p) { ?>
							<? include("template-parts/project-child-card.php"); ?>
						<? } ?>
					</div>
				</div>
			</div>
		<? }

		$content = ob_get_clean();
		return $content;
	}

?>