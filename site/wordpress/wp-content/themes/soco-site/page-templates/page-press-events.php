<?php
/*
* Template Name: Soco Recognition Temp
* Description: Custom Recognition Page Template
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<div class="newsPage">
				<img src="<?php bloginfo('template_directory'); ?>/_assets/img/FunStuffBackground.jpg" alt="Press and Events" class="bg-ie" />

				<div class="container">
					<h1><?php echo get_the_title(); ?><span class="icon-logoFlourish"></span></h1>

					<?php

						$args = array( 'post_type' => 'soco_press_pt' );
						$loop = new WP_Query( $args );

						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php
								global $post;
								$id = $post->ID;
//								print_r(get_post_custom($id));
							?>
							<div class="listEntry">
								<h3><a href="<?php echo get_post_meta($id, 'Press Link',  true); ?>" target="_blank" rel="nofollow"><?php echo the_title(); ?></a></h3>
								<p><?php echo strip_tags($post->post_content); ?></p>
								<a href="<?php echo get_post_meta($id, 'Press Link',  true); ?>" target="_blank" rel="nofollow" class="button little">Read More</a>
							</div>
						<?php endwhile;

					?>
				</div>	

			<a href="/events-and-culture/">
				<div class="nextPage culture">
					<img src="<?php bloginfo('template_directory'); ?>/_assets/img/NextCulture.jpg" alt="Events & Culture" class="bg-ie" />
					<div class="container">
						<span class="icon-arrowDown"></span>
						<h3>Events &amp; Culture</h3>
						<img src="<?php bloginfo('template_directory'); ?>/_assets/img/Type-Culture.png">
					</div><!-- .container -->
					<div class="overlay"></div>
				</div><!-- .nextPage -->
			</a>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>