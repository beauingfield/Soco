<?php

/*
 * Template Name: Soco Reservations Page
 */

get_header();

	$phone = get_option('soco_phone');
?>
	<div class="reservationsPage">
		<img src="<?php bloginfo('template_directory'); ?>/_assets/img/ReservationBackground.jpg" alt="Reservations" class="bg-ie" />
		<div class="container">
			<h1>Reservations<span class="icon-logoFlourish"></span></h1>
			<ul class="optionSelect">
				<li><a class="tab active" href="#Main">Make A Reservation</a></li>
				<li><a class="tab" data-tab="group" href="#Room">Group Dining</a></li>
			</ul>

			<?php /*  ?><div id="OT_searchWrapperAll">
				<script type="text/javascript" src="https://secure.opentable.com/ism/default.aspx?rid=150973&restref=150973&mode=horiz-transparent-white&hover=1"></script>
				<noscript id="OT_noscript"><a href="http://www.opentable.com/single.aspx?rid=150973&rtype=ism&restref=150973" >Reserve Now On OpenTable.com</a></noscript>
				<div id="OT_logoLink">
					<a href="http://www.opentable.com/single.aspx?rid=150973&rtype=ism&restref=150973" >Soco (150973), Orlando / Central Florida East Reservations</a>
				</div>
				<div id="OT_logo">
					<a href="https://secure.opentable.com/home.aspx?restref=150973&rtype=ism" title="Powered By OpenTable">
						<img src="https://secure.opentable.com/img/buttons/Otlogo.gif" id="OT_imglogo" alt="Restaurant Management Software" />
					</a>
				</div>
			</div>
			<?php */ ?>

			<div id="Main" class="tabDisplay active">
				<form class="reservation" role="form" method="post" action="https://secure.opentable.com/ism/interim.aspx" name="form" target="_blank">
					<input type="hidden" class="OT_hidden" name="RestaurantID" value="150973">
					<input type="hidden" class="OT_hidden" name="GeoID" value="0">
					<input type="hidden" class="OT_hidden" name="wt" value="1">
					<input type="hidden" class="OT_hidden" name="txtHidServerTime" value="10/14/2014 8:47:20 AM">
					<input type="hidden" class="OT_hidden" name="txtDateFormat" value="MM/dd/yyyy">
					<div class="reservationDate">
						<label for="formDate">Preferred Date &amp; Time</label>

						<div class="select">
							<input type="text" id="ReservationDate" name="startDate" value=""/>

							<script type="text/javascript">

								jQuery(document).ready(function() {
									jQuery('#ReservationDate').datepicker({
										dateFormat : 'mm/dd/yy'
									});

									var newDate = new Date();
									var prePopulatedDate = ('0' + (newDate.getMonth() + 1)).slice(-2) + "/" + ('0'+newDate.getDate()).slice(-2) + '/' + newDate.getFullYear();
									$('#ReservationDate').val(prePopulatedDate);
								});

							</script>
						</div><!-- .select -->

						<div class="reservationTime">
							<label class="inlineLabel" for="formTimeHour">at</label>

							<div class="select icon-arrowDown">
								<select name="ResTime" class="feedFormField">

									<option value="11:00 AM">11:00 AM</option>
									<option value="11:30 AM">11:30 AM</option>
									<option value="12:00 PM">12:00 PM</option>
									<option value="12:30 PM">12:30 PM</option>
									<option value="1:00 PM">1:00 PM</option>
									<option value="1:30 PM">1:30 PM</option>
									<option value="2:00 PM">2:00 PM</option>
									<option value="2:30 PM">2:30 PM</option>

									<option value="5:00 PM">5:00 PM</option>
									<option value="5:30 PM">5:30 PM</option>
									<option value="6:00 PM">6:00 PM</option>
									<option value="6:30 PM">6:30 PM</option>
									<option value="7:00 PM" selected="">7:00 PM</option>
									<option value="7:30 PM">7:30 PM</option>
									<option value="8:00 PM">8:00 PM</option>
									<option value="8:30 PM">8:30 PM</option>
									<option value="9:00 PM">9:00 PM</option>
									<option value="9:30 PM">9:30 PM</option>
									<option value="10:00 PM">10:00 PM</option>
								</select>
							</div><!-- .select -->
						</div><!-- .reservationTime -->

					</div><!-- .reservationDate -->

					<div class="buttonDivider"></div>

					<div class="partySize">
						<label for="formSize">Party Size</label>

						<div class="select icon-arrowDown">
							<select name="PartySize" class="feedFormField">
								<option value="1">1</option>
								<option value="2" selected="">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div><!-- .select -->
					</div><!-- .partySize -->

					<input type="submit" name="submit" value="Submit">

				</form>
				<div class="column two-thirds">
					<p class="reservationParagraph">Although we provide the Open Table reservation
						system for your convenience, it is always our pleasure to speak with you
						directly. Give us a call at
						<a href="tel:<?php echo $phone; ?>" class="hoverLink"><?php echo $phone; ?></a>
						. For parties of 6 or more, please call the restaurant.
					</p>
				</div>

			</div><!-- #Main.tabDisplay -->

			<div id="Room" class="tabDisplay">
				<div class="grid">
					<div class="reservation special">
						<label>Contact Us with Your Request</label>
						<p>True southern hospitality is in the details, and we handle them all for you.
							Our semi-private dining room accommodates up to 30 guests and is the perfect
							location for your cocktail party or sit-down dinner. Our dedicated team strives
							to serve up the best in quality and service for you and your guests.</p>
						<p><a href="<?php bloginfo('template_directory'); ?>/_assets/pdf/group.pdf" class="button solid">Group Dining Package</a></p>

						<h2>Google 360° Walkthrough</h2>
						<a href="https://www.google.com/maps/place/Soco+Restaurant/@28.542435,-81.3686923,3a,75y,351h,90t/data=!3m8!1e1!3m6!1slYnPcGj2dtEAAAQvvJ_Dkw!2e0!3e2!6s%2F%2Fgeo3.ggpht.com%2Fcbk%3Fpanoid%3DlYnPcGj2dtEAAAQvvJ_Dkw%26output%3Dthumbnail%26cb_client%3Dsearch.TACTILE.gps%26thumb%3D2%26w%3D129%26h%3D106%26yaw%3D351.11292%26pitch%3D0!7i13312!8i6656!4m5!3m4!1s0x0:0x6a3e6d1244b504b4!8m2!3d28.5424964!4d-81.3686595!6m1!1e1" target="_blank">
							<img style="border: none; text-align: left; float: left; width: 100%;" src="<?php bloginfo('template_directory'); ?>/_assets/img/google360-lg.png" alt="Google 360 Walkthrough">
						</a>
					</div>
					<div class="special-contact">
						<div class="thankyou-message">
							<p class="phone">Email us at</p>
							<p><a href="mailto:andre@socothorntonpark.com">andre@socothorntonpark.com</a></p>
							<p class="phone">Or give us a call<a href="tel:<?php echo $phone; ?>" class="hoverLink"><?php echo $phone; ?></a></p>
						</div>
					</div>
				</div>
			</div><!-- #Room.tabDisplay -->

		</div><!-- .container -->
	</div><!-- .reservationsPage -->

	<a href="/recognition/">
		<div class="nextPage news">
			<img src="<?php bloginfo('template_directory'); ?>/_assets/img/NextEvents.jpg" alt="Recognition" class="bg-ie" />
			<div class="container">
				<span class="icon-arrowDown"></span>
				<h3>Recognition</h3>
				<img src="<?php bloginfo('template_directory' ); ?>/_assets/img/Type-Events.png">
			</div><!-- .container -->
			<div class="overlay"></div>
		</div><!-- .nextPage -->
	</a>
<?php

get_footer();

?>
