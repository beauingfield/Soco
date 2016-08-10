<?php
/**
 * Soco Category Page
 *
 * @package Soco Site
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<h1><?php single_cat_title(); ?><span class="icon-logoFlourish"></span></h1>
				<!-- Category Filter Dropdown -->
					<div class="cat-filter">
						<a class="button solid cats" href="">Categories <span class="icon-arrowDown"></span></a>
						<ul class="cat-dropdown">
							<?php wp_list_categories('title_li='); ?>
						</ul>
					</div>
				<section class="posts" id="update">
					<?php if(have_posts()): ?>
					<?php
						$args = array( 'post_type' => 'soco_culture_pt', 'taxonomy' => get_query_var(); );
						$loop = new WP_Query( $args );
						//print_r(get_object_vars($loop));

						while ( $loop->have_posts() ) : $loop->the_post();
							global $post;
							$id = $post->ID;
					?>
					<article id="post" class="new-post">
						<div class="post-meta">
							<a href="<?php echo get_permalink(); ?>">
								<h2 class="post-title">
									<?php the_title(); ?>
								</h2><!-- .post-title -->
							</a>
							<div class="image-container">
								<div class="date">
									<span class="num"><?php echo get_the_date('d', $id); ?></span>
									<span class="month"><?php echo get_the_date('M', $id); ?></span>
								</div><!-- .date -->
								<a href="<?php echo get_permalink(); ?>">
									<div class="post-image">
										<?php if(has_post_thumbnail()) { ?>
											<a href="<?php the_permalink(); ?>" title="Read: <?php the_title(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
										<?php } else { ?>
											<a href="<?php the_permalink(); ?>" title="Read: <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/_assets/img/default-post.jpg" title="Read: <?php the_title(); ?>"></a>
										<?php } ?>
									</div><!-- .post-image -->
								</a>
								<div class="cat-container">
									<div class="cat-name">
										<?php the_category(', '); ?>
									</div>
								</div>
							</div>
							<div class="post-content">
								<?php the_excerpt(); ?>
								<a class="read-more" href="<?php echo get_permalink(); ?>"> Read More...</a>
							</div><!-- .post-content -->
						</div>
					</article>
					<hr class="culture">
					<?php wp_link_pages(); ?>
				<?php endwhile; ?>
				<?php
					$pageArgs = array(
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $loop->max_num_pages,
						'before_page_number' => '<span class="next-post">',
						'after_page_number' => '</span>',
						'next_text' => '<span class="icon-arrowRight"></span>',
						'prev_text' => '<span class="icon-arrowLeft"></span>'
					);
				?>
				<div class="pagination">
					<?php
						echo paginate_links( $pageArgs );
					?>
				</div>
				<?php else: ?>
					<h3>There are no blog posts at the moment.</h3>
					<a class="button solid little cat" href="/culture/"><span class="icon-arrowLeft"></span> Return to Culture</a>
				<?php endif; ?>
				</section>
			</div><!-- .container -->

<?php
get_footer();
