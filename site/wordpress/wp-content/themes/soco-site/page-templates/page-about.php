<?php
/*
* Template Name: Soco About
* Description: Custom About Page Template
*/

get_header();

	while(have_posts()): the_post();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="aboutPage">
				<img src="http://soco.dev/wp-content/themes/soco-site/_assets/img/about-bg.jpg" alt="About" class="bg-ie">
				<div class="container">
					<h1><?php the_title(); ?><span class="icon-logoFlourish"></span></h1>
					<?php the_content(); ?>
				</div><!-- .container -->
			</div><!-- .aboutPage -->

			<a href="/chef/">
				<div class="nextPage chef">
					<img src="<?php bloginfo('template_directory'); ?>/_assets/img/NextChef.jpg" alt="Reservations" class="bg-ie" />
					<div class="container">
						<span class="icon-arrowDown"></span>
						<h3>Chef</h3>
						<img src="<?php bloginfo('template_directory'); ?>/_assets/img/Type-Chef.png">
					</div><!-- .container -->
					<div class="overlay"></div>
				</div><!-- .nextPage -->
			</a>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	endwhile;
 get_footer(); ?>
