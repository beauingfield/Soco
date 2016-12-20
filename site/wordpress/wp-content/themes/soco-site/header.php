<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Soco Site
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('description'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="google-site-verification" content="G5NBmNspo-QBZegj1jH-JAHLsOtUbDELQUjfWbqCr2Q" />

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,300,400,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<link href='<?php bloginfo('template_directory'); ?>/_assets/css/screen.css' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="apple-mobile-web-app-title" content="Soco Restaurant">
	<meta name="application-name" content="Soco Restaurant">
	<meta name="theme-color" content="#ffffff">

	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_directory'); ?>/_assets/js/html5.js"></script>
		<link href='<?php bloginfo('template_directory'); ?>/_assets/css/ie.css' rel='stylesheet' type='text/css'>
		<script src="<?php bloginfo('template_directory'); ?>/_assets/js/respond.min.js"></script>
	<![endif]-->

	<!--[if gt IE 8]><link href='<?php bloginfo('template_directory'); ?>/_assets/css/ie9.css' rel='stylesheet' type='text/css'><![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'soco-site' ); ?></a>

		<?php if(!is_front_page()): ?>
			<div class="container-logo">
				<div class="header-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="logoText" src="<?php bloginfo('template_directory'); ?>/_assets/img/SOCO-Text-Left.png" title="Soco Southern Contemporary Cuisine" alt="Soco Southern Contemporary Cuisine">
					</a>
				</div>
			</div>
		<?php endif; ?>

		<header class="header">
			<div class="container">
				<?php if(!is_front_page()): ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="logoMobile" src="<?php bloginfo('template_directory'); ?>/_assets/img/mobile-logo.png" title="SOCO Southern Contemporary Cuisine" alt="Soco Southern Contemporary Cuisine" width="66" height="66" />
					</a>
				<?php endif; ?>

				<a href="#ContactInfo" class="triggerActive phone-menu">
					<div class="icon-phone"></div>
				</a>
				<a href="#MobileNav" class="triggerActive mobile-menu">
					<div class="icon-menu"></div>
				</a>
			</div>
		</header>

		<nav class="navigation  <?php if(is_front_page()): ?>headerHome<?php endif ?>" id="MobileNav" role="navigation">
			<a href="#MobileNav" class="triggerActive">
				<div class="icon-menu"></div>
			</a>
			<a href="#MobileNav" class="triggerActive">
				<div class="icon-exit"></div>
			</a>
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		</nav>

		<div class="contactInfo" id="ContactInfo">
			<a href="#ContactInfo" class="triggerActive"><div class="icon-exit"></div></a>
			<a href="#ContactInfo" class="triggerActive"><div class="icon-phone"></div></a>
			<div class="container">
				<div class="locationInfo">
					<a class="phone" href="tel:<?php echo preg_replace('/\D+/', '', get_option('soco_phone')); ?>"><?php echo get_option('soco_phone'); ?></a>
					<p>Restaurant Manager – Aristede M. Collins: <a href="mailto:aristede@socothorntonpark.com" class="hoverLink"><strong>aristede@socothorntonpark.com<!--<?php echo get_option('soco_operations_email'); ?>--></strong></a></p>
					<p>Andre: <a href="mailto:andre@socothorntonpark.com" class="hoverLink"><strong>andre@socothorntonpark.com<!--<?php echo get_option('soco_marketing_email'); ?>--></strong></a></p>
					<a href="https://www.facebook.com/pages/Soco-Thornton-Park/837419106286087" target="_blank"> <span class="icon-facebook"></span></a>
					<a href="https://twitter.com/SOCOThorntonPk" target="_blank"> <span class="icon-twitter"></span></a>
					<a href="http://instagram.com/socothorntonpark" target="_blank"> <span class="icon-instagram"></span></a>
				</div>
			</div><!-- .container -->
			<div class="mapAddress">
				<p>Soco Restaurant - <a href="http://maps.google.com/?q=629 E Central Blvd, Orlando, FL 32801" target="_blank" class="hoverLink"><strong>629 E. Central Blvd., Orlando, FL 32801</strong></a></p>
			</div>
			<a href="http://maps.google.com/?q=629 E Central Blvd, Orlando, FL 32801" target="_blank">
				<img src="<?php bloginfo('template_directory'); ?>/_assets/img/mobile-map.jpg" alt=" Soco Map" class="contact-map" />
			</a>
		</div><!-- .contactInfo -->

		<div id="content" class="site-content">
