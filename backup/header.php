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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">  -->

	<title><? wp_title(); ?></title>

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<script type="text/javascript" src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<? wp_head(); ?>
	
	<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/css/style.php"/>

	<link rel="shortcut icon" href="/img/favicon.png?" type="image/x-icon" />

	<link href="//fonts.googleapis.com/css?family=Ubuntu:400,400i,700" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
	<main class="content_outer">
		<div class="content">