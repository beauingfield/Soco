<?php
/*
* Template Name: Soco 404
* Description: Custom 404 Page Template
*/

get_header();

	while(have_posts()): the_post();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="404Page">
				<img src="<?php bloginfo('template_directory'); ?>/_assets/img/Plate.jpg" alt="404" class="bg-ie" />
				<!-- <img src="http://soco.dev/wp-content/themes/soco-site/_assets/img/404-bg.jpg" alt="404" class="bg-ie"> -->
				<div class="container">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div><!-- .container -->
			</div><!-- .aboutPage -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	endwhile;
 get_footer(); ?>
