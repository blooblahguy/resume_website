<? get_template_part("template-parts/page", "hero"); ?>

<div class="page_content_outer">
	<article id="page-<?php the_ID(); ?>" class="page_content">
		<div class="container padt4 wp_content">
			<? the_content(); ?>
		</div>
		<? get_template_part("template-parts/", "content_mega"); ?>
	</article>
</div>
