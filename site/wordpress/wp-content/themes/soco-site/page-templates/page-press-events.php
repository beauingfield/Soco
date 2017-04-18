<?php
/*
* Template Name: Soco Events Temp
* Description: Custom Events Page Template
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="newsPage">
				<img src="<?php bloginfo('template_directory'); ?>/_assets/img/FunStuffBackground.jpg" alt="Press" class="bg-ie" />
				<div class="container">
					<h1><?php echo get_the_title(); ?><span class="icon-logoFlourish"></span></h1>
					<div class="featurePressContainer">
						<div class="featurePress">
							<link href="https://cdn.otstatic.com/dcwidget/2017/dinerschoicebadges.css" rel="stylesheet" type="text/css" /><a href="http://www.opentable.com/restaurant/profile/FS320220/reserve?rid=FS320220&restref=FS320220"class="ot-dc-badge ot-dc-badge--p"> </a>
						</div>
					</div>
					<?php
						$args = array( 'post_type' => 'soco_press_pt' );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php
								global $post;
								$id = $post->ID;
								// print_r(get_post_custom($id));
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
