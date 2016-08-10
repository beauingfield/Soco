<?php
/**
 * Soco Single Post Page
 *
 * @package Soco Site
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'post' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="single-post-page">
				<div class="secondary-nav">
					<div class="container">
						<a class="back-to" href="/culture/"><span class="icon-arrowLeft"></span> Back to Culture</a>
						<div class="prev-next">
						</div>
					</div>
				</div>
				<div class="single-header">
					<div class="container">
						<div class="single-post-image">
							<?php if(has_post_thumbnail()) { ?>
								<a href="<?php the_permalink(); ?>" title="Read: <?php the_title(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
							<?php } else { ?>
								<a href="<?php the_permalink(); ?>" title="Read: <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/_assets/img/default-post.jpg" title="Read: <?php the_title(); ?>"></a>
							<?php } ?>
						</div><!-- .post-image -->
						<h2 class="single-post-title">
							<?php the_title(); ?>
						</h2><!-- .post-title -->
						<p class="author">by: <?php the_author(); ?> on <?php the_date(); ?></p>
						<div class="read-more-share">
							<div class="button-wrap culture">
								<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank" class="button"><span class="icon-facebook"></span> Share</a>
							</div>
							<div class="button-wrap culture">
								<a href="http://www.twitter.com/intent/tweet?text=%23SocoThorntonPark&amp;url=<?php echo post_permalink(); ?>&amp;via=SocoThorntonPk" target="_blank" class="button"><span class="icon-twitter"></span> Tweet</a>
							</div>
							<div class="button-wrap culture">
								<a href="mailto:?subject=<?php echo 'Read this new post'.$title; ?>&amp;body=<?php echo post_permalink(); ?>" class="button"><span class="icon-mail"> </span> Email</a>
							</div>
						</div>
					</div>
				</div><!-- .single-header -->
				<div class="container">
					<div class="single-post-content">
						<?php the_content() ?>
					</div>
					<div class="sidebar">
						<?php //get_sidebar( 'content' ); ?>
						<aside id="categories-2" class="widget widget_categories" title="Shift-click to edit this widget.">
							<h2 class="widget-title">Categories</h2>
						<ul>
							<?php
								$listArgs = array(
										'title_li' => '',
										'taxonomy' => 'culture-categories'
								);
							wp_list_categories($listArgs); ?>
						</ul>
						</aside>
					</div><!-- .sidebar -->
				</div>
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>
				<?php endwhile; // end of the loop. ?>
			</div><!-- .single-post-page -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>