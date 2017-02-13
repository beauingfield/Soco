<?php
/*
* Template Name: Soco Location Temp
* Description: Custom Location Page Template
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="locationPage">
				<img src="<?php bloginfo('template_directory'); ?>/_assets/img/LocationBackground.jpg" alt="Location" class="bg-ie" />
				<div class="container">
					<h1><?php echo get_the_title(); ?><span class="icon-logoFlourish"></span></h1>
				</div><!-- .container -->
			</div><!-- .locationPage -->

			<div class="locationInfo">
				<div class="container">
					<div class="content">

						<div class="column three-fifths">

							<div class="cf">
								<div class="mapAddress">
									<div class="address-wrap">
										<div class="address-left">
											<a href="tel:<?php echo get_option('soco_phone'); ?>" class="phone hoverLink"><?php echo get_option('soco_phone'); ?></a>
										</div>
										<div class="address-right">
											<p><a href="https://www.google.com/maps/preview?q=629+E+Central+Blvd,+Thornton+Park,+Downtown+Orlando&ie=UTF-8&ei=s73zU4LtDcblsASv5oDoAw&ved=0CAYQ_AUoAQ"
											target="_blank" class="hoverLink"><strong>629 E. Central Blvd.,<br /> Orlando, FL 32801</strong></a></p>
										</div>
									</div>
								</div>
								<div id="map_canvas2"></div>
							</div>

							<h2>Google 360° Walkthrough</h2>
							<a href="https://www.google.com/maps/place/Soco+Restaurant/@28.542435,-81.3686923,3a,75y,351h,90t/data=!3m8!1e1!3m6!1slYnPcGj2dtEAAAQvvJ_Dkw!2e0!3e2!6s%2F%2Fgeo3.ggpht.com%2Fcbk%3Fpanoid%3DlYnPcGj2dtEAAAQvvJ_Dkw%26output%3Dthumbnail%26cb_client%3Dsearch.TACTILE.gps%26thumb%3D2%26w%3D129%26h%3D106%26yaw%3D351.11292%26pitch%3D0!7i13312!8i6656!4m5!3m4!1s0x0:0x6a3e6d1244b504b4!8m2!3d28.5424964!4d-81.3686595!6m1!1e1" target="_blank">
								<img style="border: none; text-align: left; float: left; width: 100%;" src="<?php bloginfo('template_directory'); ?>/_assets/img/google360-lg.png" alt="Google 360 Walkthrough">
							</a>

							<h2>Parking</h2>
							<p class="parking"><?php echo do_shortcode(stripslashes(get_option('soco_parking'))); ?></p>

							<h2>Lymmo Stop</h2>
							<p class="parking">There is a Grapefruit Line Lymmo stop conveniently located at 623 E Central Blvd  in front of the restaurant.</p>

						</div>

						<div class="column two-fifths">

							<div class="thankyou-form">
								<h2>Contact Us</h2>
								<p>We’d love to hear from you.  We value the thoughts and requests of our guests.  We look forward to responding to you as soon as we can.</p>

								<form class="contactForm submitForm" method="post" action="<?php bloginfo('template_directory'); ?>/inc/send.php">
									<div class="field-wrap">
										<input type="text" name="formName" id="formName" placeholder="Name">
									</div>
									<input type="hidden" name="mailTo" value="<?php echo get_option('soco_marketing_email'); ?>">
									<div class="field-wrap">
										<input type="text" name="formEmail" id="formEmail" placeholder="Email">
									</div>
									<div class="field-wrap">
										<textarea name="formMessage" id="formMessage" placeholder="Message" rows="4"></textarea>
									</div>
									<input type="hidden" name="formType" value="contact" />
									<input type="submit" value="Submit" style="margin-bottom: 24px;">
								</form>

								<div class="emails">
									<p>Restaurant Manager – Andre: <a href="mailto:andre@socothorntonpark.com" class="hoverLink"><strong>andre@socothorntonpark.com</strong></a></p>
								</div>

								<div class="social">
									<h2 class="social">Follow Us</h2>
									<div class="button-wrap">
										<a href="https://www.facebook.com/pages/Soco-Thornton-Park/837419106286087" target="_blank" class="button"><span class="icon-facebook"></span> Facebook</a>
									</div>
									<div class="button-wrap">
										<a href="https://twitter.com/SOCOThorntonPk" target="_blank" class="button"><span class="icon-twitter"></span> Twitter</a>
									</div>
									<div class="button-wrap">
										<a href="http://instagram.com/socothorntonpark" target="_blank" class="button"><span class="icon-instagram"></span> Instagram</a>
									</div>
								</div>

							</div>

							<div class="thankyou-message">
								<h2 class="thanks-title">Thank You!</h2>
								<p class="thanks-p bold">We appreciate and value your input and will be contacting you within 24 hours about your inquiry.</p>
								<p class="thanks-p">Check out some of the other features to our site below.</p>
								<a href="/photos/" class="thanks-link">View Our Gallery</a>
								<a href="/food-drinks/" class="thanks-link">Check Out Our Menu</a>
							</div>

						</div><!-- .column -->

					</div>

					<div class="content">

						<h2>Directions</h2>
						<div class="grid">
							<div class="direction">
								<?php echo do_shortcode(stripslashes(get_option('soco_directions_one'))); ?>
							</div>
							<div class="direction">
								<?php echo do_shortcode(stripslashes(get_option('soco_directions_two'))); ?>
							</div>
							<div class="direction">
								<?php echo do_shortcode(stripslashes(get_option('soco_directions_three'))); ?>
							</div>
							<div class="direction">
								<?php echo do_shortcode(stripslashes(get_option('soco_directions_four'))); ?>
							</div>
						</div>

					</div>

				</div><!-- .container -->

			</div><!-- .locationInfo -->

			<a href="/reservations/">
				<div class="nextPage reservations">
					<div class="overlay"></div>
					<img src="<?php bloginfo('template_directory'); ?>/_assets/img/NextReserved.jpg" alt="Reservations" class="bg-ie" />
					<div class="container">
						<span class="icon-arrowDown"></span>
						<h3>Reservations</h3>
						<img src="<?php bloginfo('template_directory'); ?>/_assets/img/Type-Reservations.png" />
					</div><!-- .container -->
				</div><!-- .nextPage -->
			</a>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
