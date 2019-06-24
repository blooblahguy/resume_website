<?
while (have_rows('section')) { the_row(); ?>
	<div class="section bg-<? the_sub_field("background"); ?>">
		<? while (have_rows("content")) { the_row(); ?>

			<? if( get_row_layout() == 'text' ) { ?>
				<div class="container wp-content text_block text-center margb2">
					<? the_sub_field("content"); ?>

					<? if (get_sub_field("show_cta_button")) { 
						$button = get_sub_field("cta_button");
						?>

						<a href="<? echo $button['link']; ?>" class="btn cta_btn"><? echo $button['title']; ?></a>
					<? } ?>
				</div>
			<? } elseif( get_row_layout() == 'accordions' ) { ?>
				<div class="container wp-content accordions padtb2">
					<? if (get_sub_field("accordions_title")) { ?>
						<h3><? the_sub_field("accordions_title"); ?></h3>
					<? }
					$first = true;
					$accordions = get_sub_field("accordions");
					foreach ($accordions as $acc) { ?>
						<div class="accordion<? if ($first) {echo " open"; $first = false;}?>">
							<div class="title"><? echo $acc["title"]; ?></div>
							<div class="content"><? echo $acc["content"]; ?></div>
						</div>
					<? } ?>
				</div>
			<? } elseif( get_row_layout() == 'testimonial_pull' ) {
				$testimonials = get_field("testimonials", "options");
				$testimonials = array_reverse( $testimonials ); 
				$testimonials = array_merge($testimonials, $testimonials);
				$testimonials = array_slice($testimonials, 0, 6);
				// shuffle( $testimonials ); 
				?>
				<div class="wp-content testimonial_pull">
					<div class="container">

					<? if (get_sub_field("title")) { ?>
						<h2 class="text-center"><? the_sub_field("title"); ?></h2>
					<? } ?>
					<? if (get_sub_field("subtitle")) { ?>
						<h3 class="text-center"><? the_sub_field("subtitle"); ?></h3>
					<? } ?>
					</div>
					<? if (get_sub_field("display") == "wide") { ?>
						<div class="container text-center testimonial_wide_slider content-middle">
							<? foreach ($testimonials as $testimonial) { ?>
								<div class="testimonial_slide padt2 padlr2">
									<? if ($testimonial["car_type"]) { ?>
										<div class="car_type"><? echo $testimonial["car_type"]; ?></div>
									<? } ?>
									<div class="quote"><? echo $testimonial["quote"]; ?></div>
									<div class="author"><? echo $testimonial["author"]; ?></div>
								</div>
							<? } ?>
						</div>
					<? } else { ?>
						<div class="container text-center content-middle">
							<div class="row testimonial_slider g1">
								<? 
								$index = 0;
								foreach ($testimonials as $testimonial) { 
									$index++;
									$color = "black";

									if ($index == 3) {
										$color = "dark";
										$index = 0;
									} elseif ($index == 2) {
										$color = "blue";
									} elseif ($index == 1) {
										$color = "black";
									}
									?>
									<div class="os-md-4 testimnial_slide testimonial_block text-center pad1 padt4">
										<div class="bg-<? echo $color; ?> pad2">
											<img src="/img/quote_<? echo $color; ?>.png" alt="Testimonial from <?= $testimonial['author']; ?>" class="icon">
												<div class="car_type"><? echo $testimonial["car_type"]; ?></div>
											<div class="quote"><? echo truncateByWord($testimonial["quote"], 200); ?>[...] <a href="/testimonials?view=<?= sanitize_title($testimonial['author']); ?>">Read More &raquo;</a></div>
											<div class="author"><? echo $testimonial["author"]; ?></div>
										</div>
									</div>
								<? } ?>
							</div>
							
						</div>
					<? } ?>
				</div>
			<? } elseif( get_row_layout() == 'page_tiles' ) { ?>
				<div class="wp-content page_tiles">
					<div class="row">
						<? while (have_rows('page_links')) { the_row(); ?>
							<div class="os-md-4 text-white os-sm-12 relative pad4 tile">
								<a class="link_overlay bg-<? the_sub_field("overlay_color") ?>" href="<? the_sub_field("button_link") ?>">
								</a>
								<img src="<? the_sub_field("background"); ?>" class="bg">
								
								<div class="copy">
									<? the_sub_field("content"); ?>
								</div>
								<div class="link">
									<a href="<? the_sub_field("button_link") ?>"><? the_sub_field("button_text") ?> &raquo;</a>
								</div>
							</div>
						<? } ?>
					</div>
				</div>
			<? } elseif( get_row_layout() == 'team' ) { ?>
				<div class="container wp-content team">
					<? $team = new WP_Query(array(
						'post_type' => 'team_members'
						, 'posts_per_page' => -1
						, 'orderby' => 'id'
						, 'order' => 'ASC'
					)); ?>

					<? if (get_sub_field("display") == "page") { ?>

					<? } else { ?>
						<div class="row g2 padb2">
							<? while ($team->have_posts()) { $team->the_post(); ?>
								<div class="os-sm-6 os-md">
									<div class="member">
										<a href="/about-us/team/" class="overlay"><? the_title(); ?></a>
										<img class="bg" src="<? the_field("photo"); ?>" alt="<? the_title(); ?>">
									</div>
								</div>
							<? } ?>
						</div>
						<div class="text-center">
							<a href="/about-us/team/" class="btn">Meet the Team</a>
						</div>
					<? } 
					wp_reset_query();
					?>
				</div>
			<? } elseif( get_row_layout() == 'services' ) { ?>
				<div class="container wp-content services"> 
					<? if (get_sub_field("display") == "page") { ?>

					<? } else { ?>
						<div class="row g2"><?
							$services = array('services', 'repairs', 'performance');
							foreach ($services as $service) { ?>
								<div class="os-sm-12 os-md service text-center pad2">
									<div class="icon"><img src="<? the_field($service."_icon", "options") ?>" alt="<?= "Mercedes ".ucwords($service); ?>"></div>
									<h2><?= ucwords($service); ?></h2>
									<p class="description"><? the_field($service."_description", "options") ?></p>
								</div>
							<? } ?>
						</div>
						<div class="text-center">
							<a href="/services" class="btn">Mercedes Services</a>
						</div>
					<? } ?>
				</div>
			<? } elseif( get_row_layout() == 'form' ) { ?>
				<div class="container wp-content form text-center">
					<h2><? the_sub_field("title") ?></h2>
					<h3><? the_sub_field("subtitle") ?></h3>
					<span class="em text-muted">Fields marked with * are required.</span>
					<? echo do_shortcode('[gravityform id="'.get_sub_field("form").'" title="false" description="false" tabindex="10"]'); ?> 
				</div>
			<? } elseif( get_row_layout() == 'map_embed' ) { ?>
			<? } elseif( get_row_layout() == 'instagram' ) { ?>
			<? } ?>

		<? } ?>
	</div>
<? } ?>