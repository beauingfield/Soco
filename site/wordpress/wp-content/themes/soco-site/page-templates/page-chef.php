<?php
/*
* Template Name: Soco Chef
* Description: Custom Chef Page Template
*/

get_header();

	while(have_posts()): the_post();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="chefPage">
				<div class="container">
					<h1>Chef<span class="icon-logoFlourish"></span></h1>
					<blockquote>
						&quot;We are local, both in terms of the products we use and the neighborhood where we reside. Soco is committed to enriching Thornton Park and cultivating the culinary renaissance of Downtown Orlando.&quot;
						<cite><span>-Greg Richie</span> Executive Chef/Partner</cite>
					</blockquote>
				</div><!-- .container -->

				<div class="chefGreg">
					<img src="<?php echo get_template_directory_uri(); ?>/_assets/img/Chef.jpg">
				</div><!-- .chefGreg -->

				<div class="container transBackground">
					<div class="content">
						<div class="column one-half">
							<span class="divider"></span>
							<h2>Chef's Story</h2>
							<p>Executive Chef/Partner Greg Richie is well known as the man who fronted Orlando restaurants 
							for celebrity chefs Emeril Lagasse and Roy Yamaguchi. With Soco, he returns to 
							his Southern roots with a contemporary interpretation of one of America’s classic 
							cuisines.</p>

							<p>The award-winning chef spent his early professional years in the kitchens of renowned
							Southern restaurants that included Magnolias in Charleston; The Abbey, Atlanta; The
							Lark and the Dove, Roswell, Georgia; and Atlanta Athletic Club. It was in those
							restaurants that he first gained an appreciation for carefully selected ingredients
							and the honesty of the finished dish. Long before such terms as farm-to-table and
							locally sourced became culinary buzzwords, Richie was practicing that philosophy.
							"I place a strong emphasis on the integrity of the ingredients I use," he says,
							"what I call 'thoughtfully sourced,' whether they're from accountable local growers
							or purveyors dedicated to sustainable fishing.” Richie developed the Soco menu over
							several years as an exciting new expression of Southern contemporary cuisine.</p>

							<p>Richie graduated with honors from the acclaimed Johnson and Wales University in
							Charleston. He worked with Yamaguchi at the original Roy's Restaurant in Hawaii
							and was selected to be the first executive chef/partner for Roy’s in Orlando. He was
							then chosen by Lagasse to take over the kitchen at Tchoup Chop at the Royal Pacific
							Resort at Universal Orlando.</p>

							<p>Richie has cooked multiple times at the prestigious James Beard House in Manhattan, a sought
							after honor among chefs, and he is a charter member of SunshinePlate, a coalition of
							chefs and culinary industry professionals dedicated to food advocacy, as well as a member of the Southern Foodways Alliance. His awards include
							Chef of the Year, Best Local Chef and Best Seafood in Orlando (Orlando Magazine), and he
							was perennially named to Restaurant Forum's list of the Top 20 Chefs in Central Florida.
							He has made numerous appearances on local and national television shows and participates
							in food and wine charity events, including Heart of Florida United Way’s Chef's Gala and
							Share Our Strength's Taste of the Nation.</p>
						</div><!-- .column.one-half -->
					</div><!-- .content -->
				</div><!-- .container -->
			</div><!-- .chefPage -->

			<a href="/our-menus/">
				<div class="nextPage menu">
					<img src="<?php bloginfo('template_directory'); ?>/_assets/img/NextAbout.jpg" alt="About" class="bg-ie" />
					<div class="container">
						<span class="icon-arrowDown"></span>
						<h3>Our Menus</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/_assets/img/NextMenus.png">
					</div><!-- .container -->
					<div class="overlay"></div>
				</div><!-- .nextPage -->
			</a>

		</main>
	</div>

<?php
	endwhile;
 get_footer(); ?>