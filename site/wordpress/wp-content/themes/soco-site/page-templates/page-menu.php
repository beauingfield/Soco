<?php
/*
* Template Name: Soco Menu Temp
* Description: Custom Menu Page Template
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="menuPage">
				<div class="container">
					<h1><?php echo get_the_title(); ?><span class="icon-logoFlourish"></span></h1>

						<?php
							$menuDinner = get_option('PDF Dinner Menu Link' );
							$menuWine = get_option('PDF Wine Menu Link' );
							$menuBar = get_option('PDF Bar Menu Link' );
							$menuDessert = get_option('PDF Dessert Menu Link' );
							$menuBrunch = get_option('PDF Brunch Menu Link' );
							$menuLibations = get_option('PDF Libations Menu Link' );

							$categories = get_terms('menucategory'); ?>

							<!-- Tabs -->
							<ul class="optionSelect">
								<?php
									foreach ($categories as $category):
										if($category->parent == 0 ): ?>
											<li><a class="tab" href="#<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
								<?php
										endif;
									endforeach;
								?>
							</ul>

							<div class="pdf-menu-links">
								<a href="<?php echo $menuDinner; ?>" class="button solid menuDownload dinner active" target="_blank">Dinner PDF</a>
								<a href="<?php echo $menuWine; ?>" class="button solid menuDownload cocktails" target="_blank">Wine/Cocktails PDF</a>
								<a href="<?php echo $menuBar; ?>" class="button solid menuDownload bar" target="_blank">Bar Plates PDF</a>
								<a href="<?php echo $menuDessert; ?>" class="button solid menuDownload dessert" target="_blank">Dessert PDF</a>
								<a href="<?php echo $menuBrunch; ?>" class="button solid menuDownload brunch" target="_blank">Brunch PDF</a>
								<a href="<?php echo $menuLibations; ?>" class="button solid menuDownload libations" target="_blank">Brunch Libations PDF</a>
							</div>
							<div class="clearfix"></div>

							<div class="menu-container">
								<div class="menu-wrap">
									<div class="outer-border">
										<div class="inner-border">
											<?php
												foreach ($categories as $category):

													if($category->parent == 0 ):
														// Begin Main Container
														$drinks = ($category->slug == 'winedrinks') ? ' drinks' : '';
														$columns = array('BTG', 'Btl');
														echo '<div id="'.$category->slug.'" class="menuDisplay tabDisplay'.$drinks.'">';

														$childrens = get_terms('menucategory', array('orderby' => 'term_order', 'parent' => $category->term_id));

														foreach($childrens as $child):
															$term = get_term_by('id', $child->term_id, 'menucategory');

															//switch over the child category slugs to put special cases
															$container = '';
															$closingContainer = '';
															//Set the container we want to inject here, then spit them out when they have stuff in them.
															if($term->slug == 'feature' || $term->slug =='sparkling-wine') {
																$container = '<div class="feature"><div class="feature-container">';
																$closingContainer = '</div></div>';
															}

															echo $container;
															if($term->slug === 'house-cocktails' || $term->slug === 'house-cocktails-brunch'):
																echo '<h2>'.$term->name.'</h2>';
																echo '<span class="price" style="margin-left: 0; margin-bottom: 14px; display: block; postition: relative;">12</span>';
															elseif($term->slug === 'brunch-cocktails'):
																echo '<h2>'.$term->name.'</h2>';
																echo '<span class="price" style="margin-left: 0; margin-bottom: 14px; display: block; postition: relative;">Prices by Single Cocktail/1L Pitcher
</span>';
															elseif($term->slug === 'coffee'):
																echo '<h2>'.$term->name.'</h2>';
																echo '<span class="price" style="margin-left: 0; margin-bottom: 0; display: block; postition: relative;">7</span>';
																echo '<em class="dishDescription" style="margin-left: 0; margin-bottom: 14px; display: block; postition: relative; font-size: 14px; color: #111;">Coffee Sourced Through Lineage at East End Market</em>';
															else:
																echo '<h2>'.$term->name.'</h2>';
															endif;
															// Loop through posts with the child category

															$posts = get_posts(array(
																'post_type' => 'soco_menu_pt',
																'taxonomy' => $term->taxonomy,
																'term' => $term->slug,
																'nopaging' => true,
																'orderby' => 'post_date',
																'order' => 'DESC'
															));

															foreach($posts as $post):
																setup_postdata($post);
																$bottle = get_post_meta($post->ID, 'Soco Menu Price Btl', true);
																$single = get_post_meta($post->ID, 'Soco Menu Price', true);
															?>
																<div class="edit-wrap">
																	<div class="edit-button">
																		<?php edit_post_link('Edit Item', '', '', $post->ID); ?>
																	</div>
																	<div class="edit-content">
																		<h3 class="dish"><?php the_title(); ?><?php if($single !== '' || $bottle !== ''): ?><span class="price"><?php echo $single;  ?><?php if($bottle !== '' && $single !== ''): echo '/'; endif; ?><?php echo $bottle; ?></span><?php else: echo ''; endif; ?></h3>
																		<h4 class="dishDescription"><?php echo the_content() ?></h4>
																	</div>
																</div>

														<?php endforeach;
															echo $closingContainer;

														endforeach;

														// Raw foods disclaimer
														if(($category->slug == "dinner") || ($category->slug == "bar")): echo '<span class="disclaimer">* Consuming raw or undercooked meats, poultry, seafood, shellfish or eggs may increase your risk of foodborne illness, especially if you have certain medical conditions.</span>'; endif;

														echo '</div>';

														//End of main Container
													endif;
												endforeach;
											?>
										</div>
									</div>
								</div>
							</div>

				</div><!-- .container -->
			</div><!-- .menuPage -->

			<a href="/location/">
				<div class="nextPage location">
					<img src="<?php bloginfo('template_directory'); ?>/_assets/img/NextLocation.jpg" alt="Location" class="bg-ie" />
					<div class="container">
						<span class="icon-arrowDown"></span>
						<h3>Location</h3>
						<img src="<?php bloginfo('template_directory'); ?>/_assets/img/Type-Location.png">
					</div><!-- .container -->
					<div class="overlay"></div>
				</div><!-- .nextPage -->
			</a>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
