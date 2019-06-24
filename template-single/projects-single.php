<? get_template_part("template-parts/page", "hero"); ?>

<div class="page_content_outer">
	<article id="page-<?php the_ID(); ?>" class="page_content">
		<div class="container padt2 project-single">
			<?
			// get all of the images
			$fields = get_fields($post);
			if ($fields['image_type'] == "website") {
				$desktop = reset(wp_get_attachment_image_src($fields['website_images']['desktop'], "medium-large"));
				$tablet = reset(wp_get_attachment_image_src($fields['website_images']['tablet'], "medium-large"));
				$mobile = reset(wp_get_attachment_image_src($fields['website_images']['mobile'], "medium")); ?>
					<div class="row content-middle content-center g2 website_images">
						<div class="os-12 os-md-min">
							<div class="desktop">
								<img data-src="/img/desktop.png" class="lazyload device" alt="Desktop Container">
								<img data-src="<? echo $desktop; ?>" class="lazyload capture" alt="<? the_title(); ?> Desktop Screenshot">
							</div>
						</div>
						<div class="clear"></div>
						<div class="os-12 os-md-min beneath">
							<div class="tablet">
								<img data-src="/img/tablet.png" class="lazyload device" alt="Tablet Container">
								<img data-src="<? echo $tablet; ?>" class="lazyload capture" alt="<? the_title(); ?> Tablet Screenshot">
							</div>
						</div>
						<div class="os-min os-md-min beneath">
							<div class="mobile">
								<img data-src="/img/phone.png" class="lazyload device" alt="Mobile Container">
								<img data-src="<? echo $mobile; ?>" class="lazyload capture" alt="<? the_title(); ?> Mobile Screenshot">
							</div>
						</div>
					</div>
				<?
			} else { ?>
				<div class="row g1 content-center">
					<? foreach ($fields['images'] as $k => $img) {?>
					<div class="os-min">
						<img data-src="<? echo reset(wp_get_attachment_image_src($img['image'], "medium")); ?>" class="lazyload" alt="<? the_title()." ".$k+1; ?>">
					</div>
					<? } ?>
				</div>
				
			<? } ?>

			<? the_content(); ?>

			<? 
			// check if have children
			$children = get_children(array(
				"post_parent" => get_the_ID(),
				"numberposts" => -1,
				"post_status" => "publish",
			));
			if (count($children) > 0) { ?>
				<h2><? the_title(); ?> Projects</h2>
				<div class="card">
					<div class="row g1">
						<? foreach ($children as $p) { ?>
							<? require(get_template_directory()."/template-parts/project-child-card.php"); ?>
						<? } ?>
					</div>
				</div>
			<? } ?>

			<? 
			$previous = get_previous_post();
			$next = get_next_post();
			if (get_post_type()  == "projects" && $previous || $next) { ?>
				<hr>
				<!-- <h3 class="text-center">Other Projects</h3> -->

				<div class="row g1">
					<? if ($previous) { ?>
						<div class="os-md os-12 text-center md-text-left">
							<a href="<? echo get_the_permalink($previous) ?>" class="btn">&laquo; <? echo $previous->post_title; ?></a>
						</div>
					<? } ?>
					<? if ($next) { ?>
						<div class="os-md os-12 text-center md-text-right">
							<a href="<? echo get_the_permalink($next) ?>" class="btn"><? echo $next->post_title; ?> &raquo; </a>
						</div>
					<? } ?>
				</div>
			<? } ?>
		</div>
	</article>
</div>
