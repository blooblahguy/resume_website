<? get_template_part("template-parts/page", "hero"); ?>

<div class="page_content_outer">
	<article id="page-<?php the_ID(); ?>" class="page_content">
		<div class="container padt4">
			<? the_content(); ?>
			<div class="row g1">
				<? $index = 0;
				while ( have_posts() ) { the_post(); $index++; ?>
					<div class="os-12 os-md-<? if ($index == 1) { echo "12"; } else {echo "6"; } ?>">
						<div class="news_card relative">
							<?

							?>
							<h2><? the_title(); ?></h2>
							<h5 class="margy1 em muted"><? the_date(); ?></h5>
							<div class="excerpt"><? the_excerpt(); ?></div>
							<a href="<? the_permalink(); ?>" class="overlay"></a>
						</div>
					</div>
					
				<? } ?>
			</div>
		</div>
	</article>
</div>
