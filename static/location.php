<?php include('header.php');?>
	<div class="locationPage">
		<div class="container">
			<h1>Location<span class="icon-logoFlourish"></span></h1>
		</div><!-- .container -->
	</div><!-- .locationPage -->

	<div class="locationInfo">
		<div class="container">
			<div class="content">
				<div class="column three-fifths">
					<a href="#" class="phone hoverLink">407-849-1800</a>
					<p>Marketing: <a href="mailto:shannon@thorntonparkrg.com?Subject=Hello" target="_top" class="hoverLink"><strong>shannon@thorntonparkrg.com</strong></a></p>
					<p>Operations: <a href="mailto:mark@thorntonparkrg.com?Subject=Hello" target="_top" class="hoverLink"><strong>mark@thorntonparkrg.com</strong></a></p>

					<div class="mapAddress">
						<p>Soco Restaurant - <a href="https://www.google.com/maps/preview?q=629+E+Central+Blvd,+Thornton+Park,+Downtown+Orlando&ie=UTF-8&ei=s73zU4LtDcblsASv5oDoAw&ved=0CAYQ_AUoAQ"
							target="_blank" class="hoverLink"><strong>629 E Central Blvd, Orlando, FL 32801</strong></a></p>
					</div>
					<div id="map_canvas2"></div>

					<h2>Parking</h2>
					<p id="parking">The parking garage for Soco and Thornton Park Central is located on North Eola Drive behind Cityfish Restaurant. The parking entrance is located at the west side of the building just north of E. Central Blvd. <em>Nominal fees may apply</em>.</p>
				</div>

				<div class="column two-fifths">
					<h2>Contact Us</h2>
					<p>We’d love to hear from you!  We value the thoughts and requests of our guests.  We look forward to responding to you as soon as we can.</p>

					<form class="contactForm">
						<input type="text" name="formName" id="formName" placeholder="Name">
						<input type="text" name="formEmail" id="formEmail" placeholder="Email">
						<textarea name="formMessage" id="formMessage" placeholder="Message" rows="5"></textarea>
						<input type="submit" value="Submit">
					</form>
				</div><!-- .column -->

			</div>

			<div class="one-whole">
				<h2>Directions</h2>
				<div class="column one-fourth">
					<div class="directions">From North Orlando</div>
					<p>Interstate 4 west to downtown Orlando, exit at Colonial Drive/Centroplex, turn left on Colonial Drive, heading east. Turn right on Orange Avenue, heading south towards downtown. Turn left on Central Boulevard, heading east. Soco is located a few blocks east at 629 East Central Boulevard.</p>
				</div>
				<div class="column one-fourth">
					<div class="directions">From South Orlando</div>
					<p>Interstate 4 east to downtown Orlando, exit at Amelia Street/Centroplex, turn right on Amelia Street, heading east. Turn right on Orange Avenue, heading south towards downtown. Turn left on Central Boulevard, heading east. Soco is located a few blocks east at 629 East Central Boulevard.</p>
				</div>
				<div class="column one-fourth">
					<div class="directions">From East Orlando</div>
					<p>State Road 408 (East –West Expressway) west to downtown Orlando. Exit at Mills Avenue and travel west on South Street towards downtown Orlando. Turn right heading north on Summerlin Avenue. Turn left on Central Boulevard, heading west. Soco is located on your right at 629 East Central Boulevard.</p>
				</div>
				<div class="column one-fourth">
					<div class="directions">From West Orlando</div>
					<p>State Road 408 (East –West Expressway) east to downtown Orlando, exit at Orange Avenue (State Road 527) and follow signs north on Orange Avenue to downtown Orlando. Orange Avenue becomes Rosalind Avenue. Turn right on Central Boulevard, heading east. Soco is located a few blocks east at 629 East Central Boulevard.</p>
				</div>
			</div>	
		</div><!-- .container -->

	</div><!-- .locationInfo -->
	
	<a href="reservations.php">
		<div class="nextPage reservations">

			<div class="container">
				<span class="icon-arrowDown"></span>
				<h3>Reservations</h3>
				<img src="/_assets/img/Type-Reservations.png">
			</div><!-- .container -->
			<div class="overlay"></div>
		</div><!-- .nextPage -->
	</a>
	
<?php include('footer.php'); ?>