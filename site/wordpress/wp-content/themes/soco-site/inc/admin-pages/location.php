<?php

function soco_location_settings(){

	if(!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions to access this page.');
	} else {

	?>

	<div class="wrap">
		<h2>Location Settings</h2>
		
		<form method="post" action="">

			<h3>Banner</h3>
			<table width="100%">
				<tr>
					<td>

						<div class="postbox">

							<label for="soco-location-bg" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Banner Background Image</label>

							<div style="padding: .5em">
								<input type="text" name="soco-location-bg" id="soco-location-bg" value="<?php echo get_option('soco_location_bg'); ?>" style="width: 100%;">
							</div>

						</div>

					</td>
				</tr>
			</table>
			
			<h3>Contact Information</h3>
			<table width="100%">
				<tr>
					<td>
						<div class="postbox">

							<label for="soco-phone" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Soco Phone Number:</label>

							<div style="padding: .5em">
								<input type="text" name="soco-phone" id="soco-phone" value="<?php echo get_option('soco_phone'); ?>" style="width: 100%;">
							</div>

						</div>
					</td>
					<td>
						<div class="postbox">

							<label for="soco-email" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Soco Email:</label>

							<div style="padding: .5em">
								<input type="text" name="soco-email" id="soco-email" value="<?php echo get_option('soco_email'); ?>" style="width: 100%;">
							</div>

						</div>
					</td>
					<td>
						<div class="postbox">

							<label for="soco-marketing-email" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Marketing Email:</label>

							<div style="padding: .5em">
								<input type="text" name="soco-marketing-email" id="soco-marketing-email" value="<?php echo get_option('soco_marketing_email'); ?>" style="width: 100%;">
							</div>

						</div>
					</td>
					<td>
						<div class="postbox">

							<label for="soco-operations-email" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Operations Email:</label>

							<div style="padding: .5em">
								<input type="text" name="soco-operations-email" id="soco-operations-email" value="<?php echo get_option('soco_operations_email'); ?>" style="width: 100%;">
							</div>

						</div>
					</td>
				</tr>
			</table>

			<h3>Hours of Operation</h3>
			<table width="100%">
				<tr>
					<td>

						<div class="postbox">

							<label for="soco-hours" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Hours</label>

							<div style="padding: .5em">
								<input type="text" name="soco-hours" id="soco-hours" value="<?php echo get_option('soco_hours'); ?>" style="width: 100%;">
							</div>

						</div>

					</td>
				</tr>
			</table>

			<h3>Directions</h3>
			<table width="100%">
				<tr>
					<td>

						<div class="postbox">

							<label for="soco-directions-one" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Directions Column One</label>

							<div style="padding: .5em">
								<textarea name="soco-directions-one" id="soco-directions-one" rows="10" style="width: 100%;"><?php echo get_option('soco_directions_one'); ?></textarea>
							</div>

						</div>

					</td>
					<td>

						<div class="postbox">

							<label for="soco-directions-two" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Directions Column Two</label>

							<div style="padding: .5em">
								<textarea name="soco-directions-two" id="soco-directions-two" rows="10" style="width: 100%;"><?php echo get_option('soco_directions_two'); ?></textarea>
							</div>

						</div>

					</td>
					<td>

						<div class="postbox">

							<label for="soco-directions-three" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Directions Column Three</label>

							<div style="padding: .5em">
								<textarea name="soco-directions-three" id="soco-directions-three" rows="10" style="width: 100%;"><?php echo get_option('soco_directions_three'); ?></textarea>
							</div>

						</div>

					</td>
					<td>

						<div class="postbox">

							<label for="soco-directions-four" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Directions Column Four</label>

							<div style="padding: .5em">
								<textarea name="soco-directions-four" id="soco-directions-four" rows="10" style="width: 100%;"><?php echo get_option('soco_directions_four'); ?></textarea>
							</div>

						</div>

					</td>
				</tr>
			</table>

			<h3>Parking</h3>
			<table width="100%">
				<tr>
					<td>

						<div class="postbox">

							<label for="soco-parking" style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0; display: block;">Parking Instructions</label>

							<div style="padding: .5em">
								<textarea name="soco-parking" id="soco-parking" rows="10" style="width: 100%;"><?php echo get_option('soco_parking'); ?></textarea>
							</div>

						</div>

					</td>
				</tr>
			</table>
	
			<input type="submit" class="button-primary" value="Save Settings" name="save-location-settings" />

		</form>

	</div>

<?php

		if(isset($_POST['save-location-settings'])) {
			UpdateLocationpage();
		}

	}
}

function UpdateLocationpage(){

	update_option('soco_location_bg', $_POST['soco-location-bg']);
	update_option('soco_phone', $_POST['soco-phone']);
	update_option('soco_email', $_POST['soco-email']);
	update_option('soco_marketing_email', $_POST['soco-marketing-email']);
	update_option('soco_operations_email', $_POST['soco-operations-email']);
	update_option('soco_hours', $_POST['soco-hours']);
	update_option('soco_directions_one', $_POST['soco-directions-one']);
	update_option('soco_directions_two', $_POST['soco-directions-two']);
	update_option('soco_directions_three', $_POST['soco-directions-three']);
	update_option('soco_directions_four', $_POST['soco-directions-four']);
	update_option('soco_parking', $_POST['soco-parking']);

}

?>