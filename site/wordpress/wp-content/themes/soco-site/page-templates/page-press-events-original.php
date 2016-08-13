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

					<!-- <h2>Press</h2> -->

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

					<span class="divider"></span>

					<?php

						$dateQuery =  "SELECT * FROM $wpdb->posts
						LEFT JOIN $wpdb->postmeta AS event_date ON(
							$wpdb->posts.ID = event_date.post_id
							AND event_date.meta_key = 'Start Event Date'
						)
						LEFT JOIN $wpdb->postmeta AS end_event_date ON(
							$wpdb->posts.ID = end_event_date.post_id
							AND end_event_date.meta_key = 'End Event Date'
						)
						WHERE $wpdb->posts.post_type = 'soco_events_pt'
						AND $wpdb->posts.post_status = 'publish'
						AND (end_event_date.meta_value >= NOW() OR (end_event_date.meta_value LIKE '1970-01-01 00:00:00' AND event_date.meta_value >= NOW()))
						ORDER BY event_date.meta_value ASC";

						$upcoming_events = $wpdb->get_results($dateQuery, OBJECT);



						$dateQueryPast =  "SELECT * FROM $wpdb->posts
						LEFT JOIN $wpdb->postmeta AS event_date ON(
							$wpdb->posts.ID = event_date.post_id
							AND event_date.meta_key = 'Start Event Date'
						)
						LEFT JOIN $wpdb->postmeta AS end_event_date ON(
							$wpdb->posts.ID = end_event_date.post_id
							AND end_event_date.meta_key = 'End Event Date'
						)
						WHERE $wpdb->posts.post_type = 'soco_events_pt'
						AND $wpdb->posts.post_status = 'publish'
						AND (end_event_date.meta_value <= NOW() OR (end_event_date.meta_value LIKE '1970-01-01 00:00:00' AND event_date.meta_value <= NOW()))
						ORDER BY event_date.meta_value ASC";

						$past_events = $wpdb->get_results($dateQueryPast, OBJECT);

					?>

					<?php if(count($upcoming_events)): ?>

						<h2>Events</h2>

					<?php foreach($upcoming_events as $event):

							$id = $event->ID;

							// Title & Content
							$title = $event->post_title;
							$event_desc = $event->post_content;

							// Date
							$eventDate = strtotime(get_post_meta($id, 'Start Event Date', true));
							$endEventDate = strtotime(get_post_meta($id, 'End Event Date', true));
							$double = (date('d M Y', $eventDate) == date('d M Y', $endEventDate)) || ($endEventDate == "") ? false : true;

							// Location
							$street = get_post_meta($id, 'Event Location Street', true);
							$unit = get_post_meta($id, 'Event Location Unit', true);
							$city = get_post_meta($id, 'Event Location City', true);
							$state = get_post_meta($id, 'Event Location State', true);
							$zip = get_post_meta($id, 'Event Location Zip', true);

							$thumbnailID = get_post_thumbnail_id( $id );
							$thumbnail = wp_get_attachment_image_src($thumbnailID, 'event');
							$big = wp_get_attachment_image_src($thumbnailID, 'big');

					?>

							<div class="event" id="<?php echo $id . 'event'; ?>">

								<div class="eventDetails">
									<div class="eventDate">
										<h4 class="date"><span><?php echo date('d', $eventDate); ?></span><?php echo date('M', $eventDate); ?></h4>
									</div>
									<div class="eventImage">
										<img src="<?php echo $thumbnail[0]; ?>">
									</div>
								</div>

								<div class="eventDescription">
									
									<div class="event-desc">
										<h3><?php echo $title; ?></h3>
										<?php echo $event_desc; ?>
									</div>

									<div class="readMoreMobile" id="<?php echo $id . 'mobile'; ?>">
										<p><strong>When: </strong><?php echo date('g:iA', $eventDate); ?> - <?php echo date('g:iA', $endEventDate); ?></p>
										<p><strong>Where: </strong><a href="http://maps.google.com/?q=<?php echo $street .' '; ?><?php if(!unit): echo ''; else: echo $unit . ' '; endif; ?><?php echo $city; ?>, <?php echo $state . ' ' . $zip; ?>" target="_blank"><?php echo $street .' '; ?><?php if(!unit): echo ''; else: echo $unit . ' '; endif; ?><?php echo $city; ?>, <?php echo $state . ' ' . $zip; ?></a></p>
										<div class="button-outter-wrap mobile" id="<?php echo $id.'-share'; ?>">
											<div class="read-more-share">
												<div class="button-wrap">
													<a href="http://www.facebook.com/sharer.php?u=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" target="_blank" class="button"><span class="icon-facebook"></span> Share</a>
												</div>
												<div class="button-wrap">
													<a href="http://www.twitter.com/share?text=Join%20me%20at%20this%20event!&amp;url=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" target="_blank" class="button"><span class="icon-twitter"></span> Tweet</a>
												</div>
												<div class="button-wrap">
													<a href="mailto:?subject=<?php echo 'Join me at this event: '.$title; ?>&amp;body=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" class="button email"><span class="icon-mail"> </span> Email</a>
												</div>
											</div>
										</div>
										<a href="<?php echo '#'.$id.'-share'; ?>" class="button solid triggerSlide">Share</a>
									</div>
									<a href="#<?php echo $id . 'mobile'; ?>" class="button triggerSlide mobile">Read More</a>
									<a href="#<?php echo $id; ?>" class="button triggerFadeIn desktop">Read More</a>
								</div>

							</div>

							<div class="readMore" id="<?php echo $id; ?>">
								<a href="#<?php echo $id; ?>" class="triggerFadeOut"><div class="icon-exit"></div></a>
								<div class="container">
									<h3><?php echo $title; ?></h3>
									<div class="readMoreInfo">
										<div class="readMoreDate">
											<h4 class="date"><span><?php echo date('d', $eventDate); ?></span><?php echo date('M', $eventDate); ?></h4>
										</div><!-- .readMoreDate -->
										<div class="readMoreWhen">
											<h4>When:</h4>
											<p><?php echo date('g:iA', $eventDate); ?> - <?php echo date('g:iA', $endEventDate); ?></p>
										</div><!-- .readMoreWhen -->
										<div class="readMoreWhere">
											<h4>Where:</h4>
											<a class="redLink" href="http://maps.google.com/?q=<?php echo $street .' '; ?><?php if(!unit): echo ''; else: echo $unit . ' '; endif; ?><?php echo $city; ?>, <?php echo $state . ' ' . $zip; ?>" target="_blank"><?php echo $street . ' ' . $unit . ' ' . $city; ?>, <?php echo $state . ' ' . $zip; ?></a>
										</div><!-- .readMoreWhere -->
										<div class="readMoreWhat">
											<h4>What:</h4>
											<?php echo $event_desc; ?>
										</div><!-- .readMoreWhat -->

									</div><!-- .readMoreInfo -->
									<img src="<?php echo $big[0]; ?>">
									<div class="read-more-share">
										<div class="button-wrap">
											<a href="http://www.facebook.com/sharer.php?u=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" target="_blank" class="button"><span class="icon-facebook"></span> Post to Facebook</a>
										</div>
										<div class="button-wrap">
											<a href="http://www.twitter.com/share?text=Join%20me%20at%20this%20event!&amp;url=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" target="_blank" class="button"><span class="icon-twitter"></span> Tweet</a>
										</div>
										<div class="button-wrap">
											<a href="mailto:?subject=<?php echo 'Join me at this event: '.$title; ?>&amp;body=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" class="button"><span class="icon-mail"> </span> Email</a>
										</div>
									</div>
								</div><!-- .container -->
							</div><!-- .readMore -->

					<?php
						endforeach;

						endif;
					?>

					<?php if(count($past_events)): ?>

					<?php $count = 0; ?>

					<?php foreach($past_events as $event):

							if($count==3) break;

							$id = $event->ID;

							// Title & Content
							$title = $event->post_title;
							$event_desc = $event->post_content;

							// Date
							$eventDate = strtotime(get_post_meta($id, 'Start Event Date', true));
							$endEventDate = strtotime(get_post_meta($id, 'End Event Date', true));
							$double = (date('d M Y', $eventDate) == date('d M Y', $endEventDate)) || ($endEventDate == "") ? false : true;

							// Location
							$street = get_post_meta($id, 'Event Location Street', true);
							$unit = get_post_meta($id, 'Event Location Unit', true);
							$city = get_post_meta($id, 'Event Location City', true);
							$state = get_post_meta($id, 'Event Location State', true);
							$zip = get_post_meta($id, 'Event Location Zip', true);

							$thumbnailID = get_post_thumbnail_id( $id );
							$thumbnail = wp_get_attachment_image_src($thumbnailID, 'event');
							$big = wp_get_attachment_image_src($thumbnailID, 'big');

					?>

							<div class="event" id="<?php echo $id . 'event'; ?>">

								<div class="eventDetails">
									<div class="eventDate">
										<h4 class="date"><span><?php echo date('d', $eventDate); ?></span><?php echo date('M', $eventDate); ?></h4>
									</div>
									<div class="eventImage">
										<img src="<?php echo $thumbnail[0]; ?>">
									</div>
								</div>

								<div class="eventDescription">
									
									<div class="event-desc">
										<h3><?php echo $title; ?></h3>
										<?php echo $event_desc; ?>
										<?php the_excerpt; ?>
									</div>

									<div class="readMoreMobile" id="<?php echo $id . 'mobile'; ?>">
										<p><strong>When: </strong><?php echo date('g:iA', $eventDate); ?> - <?php echo date('g:iA', $endEventDate); ?></p>
										<p><strong>Where: </strong><a href="http://maps.google.com/?q=<?php echo $street .' '; ?><?php if(!unit): echo ''; else: echo $unit . ' '; endif; ?><?php echo $city; ?>, <?php echo $state . ' ' . $zip; ?>" target="_blank"><?php echo $street .' '; ?><?php if(!unit): echo ''; else: echo $unit . ' '; endif; ?><?php echo $city; ?>, <?php echo $state . ' ' . $zip; ?></a></p>
										<!-- <p><strong>Additional Info: </strong><a href="#">Click Here to reserve your spot</a></p> -->
										<div class="button-outter-wrap mobile" id="<?php echo $id.'-share'; ?>">
											<div class="read-more-share">
												<div class="button-wrap">
													<a href="http://www.facebook.com/sharer.php?u=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" target="_blank" class="button"><span class="icon-facebook"></span> Post to Facebook</a>
												</div>
												<div class="button-wrap">
													<a href="http://www.twitter.com/share?text=Join%20me%20at%20this%20event!&amp;url=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" target="_blank" class="button"><span class="icon-twitter"></span> Tweet</a>
												</div>
												<div class="button-wrap">
													<a href="mailto:?subject=<?php echo 'Join me at this event: '.$title; ?>&amp;body=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" class="button email"><span class="icon-mail"> </span> Email</a>
												</div>
											</div>
										</div>
										<a href="<?php echo '#'.$id.'-share'; ?>" class="button solid triggerSlide">Share</a>
									</div>
									<a href="#<?php echo $id . 'mobile'; ?>" class="button triggerSlide mobile">Read More</a>
									<a href="#<?php echo $id; ?>" class="button triggerFadeIn desktop">Read More</a>
								</div>

							</div>

							<div class="readMore" id="<?php echo $id; ?>">
								<a href="#<?php echo $id; ?>" class="triggerFadeOut"><div class="icon-exit"></div></a>
								<div class="container">
									<h3><?php echo $title; ?></h3>
									<div class="readMoreInfo">
										<div class="readMoreDate">
											<h4 class="date"><span><?php echo date('d', $eventDate); ?></span><?php echo date('M', $eventDate); ?></h4>
										</div><!-- .readMoreDate -->
										<div class="readMoreWhen">
											<h4>When:</h4>
											<p><?php echo date('g:iA', $eventDate); ?> - <?php echo date('g:iA', $endEventDate); ?></p>
										</div><!-- .readMoreWhen -->
										<div class="readMoreWhere">
											<h4>Where:</h4>
											<a class="redLink" target="_blank" href="http://maps.google.com/?q=<?php echo $street .' '; ?><?php if(!unit): echo ''; else: echo $unit . ' '; endif; ?><?php echo $city; ?>, <?php echo $state . ' ' . $zip; ?>"><?php echo $street . ' ' . $unit . ' ' . $city; ?>, <?php echo $state . ' ' . $zip; ?></a>
										</div><!-- .readMoreWhere -->
										<div class="readMoreWhat">
											<h4>What:</h4>
											<?php echo $event_desc; ?>
										</div><!-- .readMoreWhat -->

									</div><!-- .readMoreInfo -->
									<img src="<?php echo $big[0]; ?>">
									<div class="read-more-share">
										<div class="button-wrap">
											<a href="http://www.facebook.com/sharer.php?u=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" target="_blank" class="button"><span class="icon-facebook"></span> Post</a>
										</div>
										<div class="button-wrap">
											<a href="http://www.twitter.com/share?text=Join%20me%20at%20this%20event!&amp;url=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" target="_blank" class="button"><span class="icon-twitter"></span> Tweet</a>
										</div>
										<div class="button-wrap">
											<a href="mailto:?subject=<?php echo 'Join me at this event: '.$title; ?>&amp;body=http://www.socothorntonpark.com/press-events/<?php echo '#'.$id.'event'; ?>" class="button"><span class="icon-mail"> </span> Email</a>
										</div>
									</div>
								</div><!-- .container -->
							</div><!-- .readMore -->

					<?php
						$count++;

						endforeach;

						endif;
					?>

				</div><!-- .container -->
			</div><!-- .newsPage -->

			<a href="/culture/">
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