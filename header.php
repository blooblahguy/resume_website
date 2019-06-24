<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136114875-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-136114875-1');
	</script>


	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<title><? wp_title(); ?></title>

	<?php if ( is_single() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<? wp_head(); ?>

	<link rel="stylesheet" href="/css/style.php"/>
	<link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon" />
</head>
<body <?php body_class(); ?>>
	<div class="wrapper lg-padx4 md-padx2">
		<div class="header_background bg-black pady2"></div>
		<div class="header_outer">
			<header class="container">
				<div class="md-hidden lg-hidden mobile_buttons">
					<a href="#" class="os_menu_button open" aria-controls="primary-menu" aria-expanded="false">
						<span></span>
						<span></span>
						<span></span>
					</a>
					<a href="#" class="os_menu_button close" aria-controls="primary-menu" aria-expanded="false">
						<span></span>
						<span></span>
					</a>
				</div>
				<div class="mobile_menu">
					<div class="row g1 content-middle">
						<nav class="os-md os-12 os-menu">
							<?php wp_nav_menu( array( 
								'menu' => 'Main Menu' 
								, 'menu_id' => 'header-menu'
								, 'menu_class' => 'os-menu header-menu'
							));?>
						</nav>
						<nav class="os-12 os-md-min md-text-right">
							<div class="menu-tertiary-menu-container">
								<? global $post; ?>
								<ul id="header-menu" class="os-menu header-menu tertiary-menu">
									<li id="menu-item-47" class="menu-item fill-white <? if (is_page() && $post->post_parent) { echo "current-menu-item"; } ?>"><a target="_blank" href="http://github.com/blooblahguy"><span><? echo get_file_contents_url("/img/github.svg"); ?></span>GitHub</a></li>
									<li id="menu-item-48" class="menu-item fill-white <? if (is_page() && $post->post_parent) { echo "current-menu-item"; } ?>"><a target="_blank" href="https://www.linkedin.com/in/gladel/"><span><? echo get_file_contents_url("/img/linkedin.svg"); ?></span>LinkedIn</a></li>
									<li id="menu-item-49" class="menu-item fill-white <? if (is_page('contact') || (is_page() && $post->post_parent)) { echo "current-menu-item"; } ?>"><a href="/contact">Contact</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</header>
		</div>
		<main class="content_outer">
			<div class="content md-padb4 padb2 ">