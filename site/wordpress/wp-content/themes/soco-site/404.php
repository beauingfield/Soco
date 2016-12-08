<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Soco Site
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="errorPage">
				<div class="container">
					<div class="errorContent">
						<h1 class="error"><?php _e( 'nothing to see here...', 'soco-site' ); ?></h1>
						<h4 class="error"><?php _e( 'This page seems to be missing... It was either moved or never existed.', 'soco-site' ); ?></h4>
						<p class="error">Try visiting the other pages to find what you’re looking for. Choose an option below or use the main navigation at the top of the page for direction.</p>
						<div class="errorButtons">
							<a href="http://www.socothorntonpark.com/" class="button solid">Visit Our Home</a>
							<div class="or">or</div>
							<a href="http://www.socothorntonpark.com/our-menus/" class="button solid">View Our Menus</a>
						</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
