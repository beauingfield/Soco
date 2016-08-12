<?php
/*
* Template Name: Soco Home Page
* Description: Custom home page template
*/

get_header();

		$CTAOne = get_option('CTAOne');
		$CTATwo = get_option('CTATwo');
		$CTAThree = get_option('CTAThree');

 ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="homepage">
				<div class="hero">
					<img src="<?php bloginfo('template_directory'); ?>/_assets/img/HeroBanner-plate.jpg" alt="Soco Banner" class="bg-ie" />
					<div class="containerHome">
						<div class="logoSection">
							<img class="logo" src="<?php bloginfo('template_directory'); ?>/_assets/img/SOCO-Logo.png">
						</div>
						<div class="content">
							<h1><?php echo stripslashes(get_option('home_page_title')); ?></h1>
							<p><?php echo stripslashes(get_option('home_page_text')); ?></p>
							<p class="zagat">
								<img src="<?php bloginfo('template_directory'); ?>/_assets/img/zagat1.png"/>
							</p>
							<a href="/reservations/" class="button solid">Make a Reservation</a>
							<a href="/reservations/#group" class="button solid group-diningc ">Group Dining</a>
							<a href="#three-cols" class="icon-arrowDown"></a>
						</div><!-- .content -->
					</div><!-- .container -->
					<div class="plate">
						<img src="<?php bloginfo('template_directory'); ?>/_assets/img/HeroBanner-food.png" alt="Plate 1" />
						<img src="<?php bloginfo('template_directory'); ?>/_assets/img/HeroBanner-food2.png" alt="Plate 2" />
						<img src="<?php bloginfo('template_directory'); ?>/_assets/img/HeroBanner-food3.png" alt="Plate 3" />
					</div>
				</div><!-- .hero -->
				
				<div class="notification-mobile">
                    <div class="container">
                    	<a href="http://www.orlandomagazine.com/Orlando-Magazine/May-2016/2016-Dining-Awards/" target="_blank">
	                        <img class="notification" src="<?php bloginfo('template_directory'); ?>/_assets/img/orlando-mag-logo.jpg" alt="Orlando Magazine logo">
	                        <h4 class="notification"><strong>Best Southern Restaurant</strong> - Orlando Magazine Dining Awards 2016</h4>
	                        <div class="notification-mobile button buttonBlack">Read More</div>
	                    </a>    
                    </div><!-- .container -->
                </div><!-- .notification-mobile -->

				<div class="three-columns" id="three-cols">
					<a href="<?php echo $CTAOne['URL']; ?>" class="col-link menu" style="background-image: url('<?php echo $CTAOne['Image']; ?>');">
						<div class="overlay"></div>
						<img src="<?php echo $CTAOne['Image']; ?>" alt="Menu" class="bg-ie" />
						<div class="homeOption menuOption">
							<h2><?php echo $CTAOne['Title']; ?></h2>
							<img src="<?php bloginfo('template_directory'); ?>/_assets/img/Type-Food.png">
							<div class="button buttonBlack">View Our Menu</div>
						</div><!-- .menu -->
					</a>

					<a href="<?php echo $CTATwo['URL']; ?>" class="col-link location" style="background-image: url('<?php echo $CTATwo['Image']; ?>');">
						<div class="overlay"></div>
						<img src="<?php echo $CTATwo['Image']; ?>" alt="Location" class="bg-ie" />
						<div class="homeOption locationOption">
							<h2><?php echo $CTATwo['Title']; ?></h2>
							<img src="<?php bloginfo('template_directory'); ?>/_assets/img/Type-LocationBig.png">
							<div class="button buttonBlack">Come Visit Us</div>
						</div><!-- .location -->
					</a>

					<a href="<?php echo $CTAThree['URL']; ?>" class="col-link reservation" style="background-image: url('<?php echo $CTAThree['Image']; ?>');">
						<div class="overlay"></div>
						<img src="<?php echo $CTAThree['Image']; ?>" alt="Reservation" class="bg-ie" />
						<div class="homeOption reservationOption">
							<h2><?php echo $CTAThree['Title']; ?></h2>
							<img src="<?php bloginfo('template_directory'); ?>/_assets/img/Type-Waiting.png" />
							<div class="button buttonBlack">Reserve Your Table</div>
						</div><!-- .reservation -->
					</a>
				</div>

			</div><!-- .homepage -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
