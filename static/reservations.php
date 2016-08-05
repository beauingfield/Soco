<?php include('header.php');?>
	<div class="reservationsPage">
		<div class="container">
			<h1>Reservations<span class="icon-logoFlourish"></span></h1>
			<ul class="optionSelect">
				<li><a class="tab active" href="#Main">Make A Reservation</a></li>
				<li><a class="tab" href="#Room">Special Events</a></li>
				<!-- <li><a class="tab" href="#Special">Special Events</a></li> -->
			</ul>

			<div id="Main" class="tabDisplay active">
				<form class="reservation" role="form" method="post" action="FormSubmit.php" name="form">
					<div class="reservationDate">
						<label for="formDate">Preferred Date &amp; Time</label>
						
						<div class="select icon-arrowDown">
							<select name="formDate" id="formDate">
						  		<option value="volvo">mm/dd/yy</option>
							</select>
						</div><!-- .select -->

						<div class="reservationTime">
							<label class="inlineLabel" for="formTimeHour">at</label>

							<div class="select icon-arrowDown">
								<select name="formTimeHour" id="formTimeHour">
									<option value="hh">hh</option>
								</select>
							</div><!-- .select -->

							<div class="select icon-arrowDown">
								<select name="formTimeMinute">
									<option value="MM">MM</option>
								</select>
							</div><!-- .select -->

							<div class="select icon-arrowDown">
							<select name="formTime">
								<option value="PM">PM</option>
								<option value="AM">AM</option>
							</select>
							</div><!-- .select -->
						</div><!-- .reservationTime -->

					</div><!-- .reservationDate -->
					
					<div class="buttonDivider"></div>

					<div class="partySize">
						<label for="formSize">Party Size</label>
						
						<div class="select icon-arrowDown">
							<select name="formSize" id="formSize">
								<option value="-- People">--</option>
							</select>
						</div><!-- .select -->
					</div><!-- .partySize -->

					<input type="submit" value="Submit">

				</form>
			</div><!-- #Main.tabDisplay -->

			<div id="Room" class="tabDisplay">
				<form class="reservation" role="form" method="post" action="FormSubmit.php" name="form">
					<div class="reservationDate">
						<label for="formDate">Preferred Date &amp; Time</label>
						
						<div class="select icon-arrowDown">
							<select name="formDate" id="formDate">
						  		<option value="volvo">mm/dd/yy</option>
							</select>
						</div><!-- .select -->

						<div class="reservationTime">
							<label class="inlineLabel" for="formTimeHour">at</label>

							<div class="select icon-arrowDown">
								<select name="formTimeHour" id="formTimeHour">
									<option value="hh">hh</option>
								</select>
							</div><!-- .select -->

							<div class="select icon-arrowDown">
								<select name="formTimeMinute">
									<option value="MM">MM</option>
								</select>
							</div><!-- .select -->

							<div class="select icon-arrowDown">
							<select name="formTime">
								<option value="PM">PM</option>
								<option value="AM">AM</option>
							</select>
							</div><!-- .select -->
						</div><!-- .reservationTime -->

					</div><!-- .reservationDate -->
					
					<div class="buttonDivider"></div>

					<div class="partySize">
						<label for="formSize">Party Size</label>
						
						<div class="select icon-arrowDown">
							<select name="formSize" id="formSize">
								<option value="-- People">--</option>
							</select>
						</div><!-- .select -->
					</div><!-- .partySize -->

					<input type="submit" value="Submit">

				</form>
			</div><!-- #Room.tabDisplay -->

			<!-- <div id="Special" class="tabDisplay">
				<form class="reservation" role="form" method="post" action="FormSubmit.php" name="form">
					<div class="reservationDate">
						<label for="formDate">Preferred Date &amp; Time</label>
						
						<div class="select icon-arrowDown">
							<select name="formDate" id="formDate">
						  		<option value="volvo">mm/dd/yy</option>
							</select>
						</div>

						<div class="reservationTime">
							<label class="inlineLabel" for="formTimeHour">at</label>

							<div class="select icon-arrowDown">
								<select name="formTimeHour" id="formTimeHour">
									<option value="hh">hh</option>
								</select>
							</div>

							<div class="select icon-arrowDown">
								<select name="formTimeMinute">
									<option value="MM">MM</option>
								</select>
							</div>=

							<div class="select icon-arrowDown">
							<select name="formTime">
								<option value="PM">PM</option>
								<option value="AM">AM</option>
							</select>
							</div>
						</div>

					</div>
					
					<div class="buttonDivider"></div>

					<div class="partySize">
						<label for="formSize">Party Size</label>
						
						<div class="select icon-arrowDown">
							<select name="formSize" id="formSize">
								<option value="-- People">--</option>
							</select>
						</div>
					</div>

					<input type="submit" value="Submit">

				</form>
			</div> --><!-- #Special.tabDisplay -->

			<div class="column two-thirds">
				<p class="reservationParagraph">Although we utilize Open Table for your convenience, it is our pleasure to work with you directly to accommodate your dining experience.  Should we not have availability via our online reservation system, please feel free to contact us, and a representative will do their best to accommodate your needs.</p>
			</div>

			<div class="column two-thirds">
				<p class="phone">Or give us a call<a href="#" class="hoverLink">407-849-1800</a></p>
			</div>	

		</div><!-- .container -->
	</div><!-- .reservationsPage -->
	
	<a href="news.php">
		<div class="nextPage news">
			<div class="container">
				<span class="icon-arrowDown"></span>
				<h3>Press &amp; Events</h3>
				<img src="/_assets/img/Type-Events.png">
			</div><!-- .container -->
			<div class="overlay"></div>
		</div><!-- .nextPage -->
	</a>
<?php include('footer.php'); ?>