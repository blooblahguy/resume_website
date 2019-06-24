<? get_template_part("template-parts/page", "hero"); ?>

<div class="page_content_outer">
	<article id="page-<?php the_ID(); ?>" class="page_content">
		<div class="container padt4">
			<? the_content(); ?>
		</div>
		<? while ( have_posts() ) { the_post(); $index++; ?>
			<? get_template_part("template-parts/project", "card"); ?>
		<? } ?>
	</article>
</div>
