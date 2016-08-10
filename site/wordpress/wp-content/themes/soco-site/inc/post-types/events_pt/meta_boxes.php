<?php

// NEWS POST TYPE META BOXES
// Create New Boxes
function soco_events_boxes() {

	// Add Individual Box
	add_meta_box(
		'soco_events_location',
		'Event Location',
		'soco_events_location',
		'soco_events_pt',
		'side',
		'high'
	);

	add_meta_box(
		'soco_events_date', // ID
		'Event Date &amp; Time', // Title Displayed
		'soco_events_date', // Function called
		'soco_events_pt', // Post Type Refferenced
		'side', // Location
		'high' // Priority
	);
	
}

add_action( 'add_meta_boxes', 'soco_events_boxes' );

function soco_events_date(){
	
	// Call Current Post
	global $post;

	// Get info from post
	$meta = get_post_custom($post->ID);
	
	// Start Event Date
	$start_event_date = date(strtotime($meta['Start Event Date'][0]));

	$start_event_date_year = date('Y', $start_event_date);
	$start_event_date_month = date('m', $start_event_date);
	$start_event_date_day = date('d', $start_event_date);

	$start_event_date_hour = date('H', $start_event_date);
	$start_event_date_minute = date('i', $start_event_date);

	// End Event Date
	$end_event_date = date(strtotime($meta['End Event Date'][0]));

	$end_event_date_year = date('Y', $end_event_date);
	$end_event_date_month = date('m', $end_event_date);
	$end_event_date_day = date('d', $end_event_date);

	$end_event_date_hour = date('H', $end_event_date);
	$end_event_date_minute = date('i', $end_event_date);

	// Content Displayed
	?>
	
	<p><strong>Event Start</strong></p>
	<table>
		<tr>
			<td>Year:</td>
			<td>
				<select name="start_event_date_year" id="start_event_date_year">
					<option value="2014" <?php if($start_event_date_year == "2014") { ?> selected<?php } ?>>2014</option>
					<option value="2015" <?php if($start_event_date_year == "2015") { ?> selected<?php } ?>>2015</option>
					<option value="2016" <?php if($start_event_date_year == "2016") { ?> selected<?php } ?>>2016</option>
					<option value="2017" <?php if($start_event_date_year == "2017") { ?> selected<?php } ?>>2017</option>
					<option value="2018" <?php if($start_event_date_year == "2018") { ?> selected<?php } ?>>2018</option>
					<option value="2019" <?php if($start_event_date_year == "2019") { ?> selected<?php } ?>>2019</option>
					<option value="2020" <?php if($start_event_date_year == "2020") { ?> selected<?php } ?>>2020</option>
					<option value="2021" <?php if($start_event_date_year == "2021") { ?> selected<?php } ?>>2021</option>
					<option value="2022" <?php if($start_event_date_year == "2022") { ?> selected<?php } ?>>2022</option>
					<option value="2023" <?php if($start_event_date_year == "2023") { ?> selected<?php } ?>>2023</option>
					<option value="2024" <?php if($start_event_date_year == "2024") { ?> selected<?php } ?>>2024</option>
					<option value="2025" <?php if($start_event_date_year == "2025") { ?> selected<?php } ?>>2025</option>
				</select>
			</td>
			<td>Month:</td>
			<td>
				<select name="start_event_date_month" id="start_event_date_month">
					<option value="01" <?php if($start_event_date_month == "01") { ?> selected<?php } ?>>January</option>
					<option value="02" <?php if($start_event_date_month == "02") { ?> selected<?php } ?>>February</option>
					<option value="03" <?php if($start_event_date_month == "03") { ?> selected<?php } ?>>March</option>
					<option value="04" <?php if($start_event_date_month == "04") { ?> selected<?php } ?>>April</option>
					<option value="05" <?php if($start_event_date_month == "05") { ?> selected<?php } ?>>May</option>
					<option value="06" <?php if($start_event_date_month == "06") { ?> selected<?php } ?>>June</option>
					<option value="07" <?php if($start_event_date_month == "07") { ?> selected<?php } ?>>July</option>
					<option value="08" <?php if($start_event_date_month == "08") { ?> selected<?php } ?>>August</option>
					<option value="09" <?php if($start_event_date_month == "09") { ?> selected<?php } ?>>September</option>
					<option value="10" <?php if($start_event_date_month == "10") { ?> selected<?php } ?>>October</option>
					<option value="11" <?php if($start_event_date_month == "11") { ?> selected<?php } ?>>November</option>
					<option value="12" <?php if($start_event_date_month == "12") { ?> selected<?php } ?>>December</option>
				</select>
			</td>
			<td>Day:</td>
			<td>
				<select name="start_event_date_day" id="start_event_date_day">
					<option value="01" <?php if($start_event_date_day == "01") { ?> selected<?php } ?>>01</option>
					<option value="02" <?php if($start_event_date_day == "02") { ?> selected<?php } ?>>02</option>
					<option value="03" <?php if($start_event_date_day == "03") { ?> selected<?php } ?>>03</option>
					<option value="04" <?php if($start_event_date_day == "04") { ?> selected<?php } ?>>04</option>
					<option value="05" <?php if($start_event_date_day == "05") { ?> selected<?php } ?>>05</option>
					<option value="06" <?php if($start_event_date_day == "06") { ?> selected<?php } ?>>06</option>
					<option value="07" <?php if($start_event_date_day == "07") { ?> selected<?php } ?>>07</option>
					<option value="08" <?php if($start_event_date_day == "08") { ?> selected<?php } ?>>08</option>
					<option value="09" <?php if($start_event_date_day == "09") { ?> selected<?php } ?>>09</option>
					<option value="10" <?php if($start_event_date_day == "10") { ?> selected<?php } ?>>10</option>
					<option value="11" <?php if($start_event_date_day == "11") { ?> selected<?php } ?>>11</option>
					<option value="12" <?php if($start_event_date_day == "12") { ?> selected<?php } ?>>12</option>
					<option value="13" <?php if($start_event_date_day == "13") { ?> selected<?php } ?>>13</option>
					<option value="14" <?php if($start_event_date_day == "14") { ?> selected<?php } ?>>14</option>
					<option value="15" <?php if($start_event_date_day == "15") { ?> selected<?php } ?>>15</option>
					<option value="16" <?php if($start_event_date_day == "16") { ?> selected<?php } ?>>16</option>
					<option value="17" <?php if($start_event_date_day == "17") { ?> selected<?php } ?>>17</option>
					<option value="18" <?php if($start_event_date_day == "18") { ?> selected<?php } ?>>18</option>
					<option value="19" <?php if($start_event_date_day == "19") { ?> selected<?php } ?>>19</option>
					<option value="20" <?php if($start_event_date_day == "20") { ?> selected<?php } ?>>20</option>
					<option value="21" <?php if($start_event_date_day == "21") { ?> selected<?php } ?>>21</option>
					<option value="22" <?php if($start_event_date_day == "22") { ?> selected<?php } ?>>22</option>
					<option value="23" <?php if($start_event_date_day == "23") { ?> selected<?php } ?>>23</option>
					<option value="24" <?php if($start_event_date_day == "24") { ?> selected<?php } ?>>24</option>
					<option value="25" <?php if($start_event_date_day == "25") { ?> selected<?php } ?>>25</option>
					<option value="26" <?php if($start_event_date_day == "26") { ?> selected<?php } ?>>26</option>
					<option value="27" <?php if($start_event_date_day == "27") { ?> selected<?php } ?>>27</option>
					<option value="28" <?php if($start_event_date_day == "28") { ?> selected<?php } ?>>28</option>
					<option value="29" <?php if($start_event_date_day == "29") { ?> selected<?php } ?>>29</option>
					<option value="30" <?php if($start_event_date_day == "30") { ?> selected<?php } ?>>30</option>
					<option value="31" <?php if($start_event_date_day == "31") { ?> selected<?php } ?>>31</option>
				</select>
			</td>
			<td>Hour:</td>
			<td>
				<select name="start_event_date_hour" id="start_event_date_hour">
					<option value="00" <?php if($start_event_date_hour == "00") { ?> selected<?php } ?>>12 a.m.</option>
					<option value="01" <?php if($start_event_date_hour == "01") { ?> selected<?php } ?>>1 a.m.</option>
					<option value="02" <?php if($start_event_date_hour == "02") { ?> selected<?php } ?>>2 a.m.</option>
					<option value="03" <?php if($start_event_date_hour == "03") { ?> selected<?php } ?>>3 a.m.</option>
					<option value="04" <?php if($start_event_date_hour == "04") { ?> selected<?php } ?>>4 a.m.</option>
					<option value="05" <?php if($start_event_date_hour == "05") { ?> selected<?php } ?>>5 a.m.</option>
					<option value="06" <?php if($start_event_date_hour == "06") { ?> selected<?php } ?>>6 a.m.</option>
					<option value="07" <?php if($start_event_date_hour == "07") { ?> selected<?php } ?>>7 a.m.</option>
					<option value="08" <?php if($start_event_date_hour == "08") { ?> selected<?php } ?>>8 a.m.</option>
					<option value="09" <?php if($start_event_date_hour == "09") { ?> selected<?php } ?>>9 a.m.</option>
					<option value="10" <?php if($start_event_date_hour == "10") { ?> selected<?php } ?>>10 a.m.</option>
					<option value="11" <?php if($start_event_date_hour == "11") { ?> selected<?php } ?>>11 a.m.</option>
					<option value="12" <?php if($start_event_date_hour == "12") { ?> selected<?php } ?>>12 p.m.</option>
					<option value="13" <?php if($start_event_date_hour == "13") { ?> selected<?php } ?>>1 p.m.</option>
					<option value="14" <?php if($start_event_date_hour == "14") { ?> selected<?php } ?>>2 p.m.</option>
					<option value="15" <?php if($start_event_date_hour == "15") { ?> selected<?php } ?>>3 p.m.</option>
					<option value="16" <?php if($start_event_date_hour == "16") { ?> selected<?php } ?>>4 p.m.</option>
					<option value="17" <?php if($start_event_date_hour == "17") { ?> selected<?php } ?>>5 p.m.</option>
					<option value="18" <?php if($start_event_date_hour == "18") { ?> selected<?php } ?>>6 p.m.</option>
					<option value="19" <?php if($start_event_date_hour == "19") { ?> selected<?php } ?>>7 p.m.</option>
					<option value="20" <?php if($start_event_date_hour == "20") { ?> selected<?php } ?>>8 p.m.</option>
					<option value="21" <?php if($start_event_date_hour == "21") { ?> selected<?php } ?>>9 p.m.</option>
					<option value="22" <?php if($start_event_date_hour == "22") { ?> selected<?php } ?>>10 p.m.</option>
					<option value="23" <?php if($start_event_date_hour == "23") { ?> selected<?php } ?>>11 p.m.</option>
				</select>
			</td>
			<td>Minutes:</td>
			<td>

				<select name="start_event_date_minute" id="start_event_date_minute">
					<option value="00" <?php if($start_event_date_minute == "00") { ?> selected<?php } ?>>0 minutes</option>
					<option value="15" <?php if($start_event_date_minute == "15") { ?> selected<?php } ?>>15 minutes</option>
					<option value="30" <?php if($start_event_date_minute == "30") { ?> selected<?php } ?>>30 minutes</option>
					<option value="45" <?php if($start_event_date_minute == "45") { ?> selected<?php } ?>>45 minutes</option>
				</select>

			</td>
		</tr>
	</table>

	<p><strong>Event End</strong></p>
	<table>
		<tr>
			<td>Year:</td>
			<td>
				<select name="end_event_date_year" id="end_event_date_year">
					<option value="2014" <?php if($end_event_date_year == "2014") { ?> selected<?php } ?>>2014</option>
					<option value="2015" <?php if($end_event_date_year == "2015") { ?> selected<?php } ?>>2015</option>
					<option value="2016" <?php if($end_event_date_year == "2016") { ?> selected<?php } ?>>2016</option>
					<option value="2017" <?php if($end_event_date_year == "2017") { ?> selected<?php } ?>>2017</option>
					<option value="2018" <?php if($end_event_date_year == "2018") { ?> selected<?php } ?>>2018</option>
					<option value="2019" <?php if($end_event_date_year == "2019") { ?> selected<?php } ?>>2019</option>
					<option value="2020" <?php if($end_event_date_year == "2020") { ?> selected<?php } ?>>2020</option>
					<option value="2021" <?php if($end_event_date_year == "2021") { ?> selected<?php } ?>>2021</option>
					<option value="2022" <?php if($end_event_date_year == "2022") { ?> selected<?php } ?>>2022</option>
					<option value="2023" <?php if($end_event_date_year == "2023") { ?> selected<?php } ?>>2023</option>
					<option value="2024" <?php if($end_event_date_year == "2024") { ?> selected<?php } ?>>2024</option>
					<option value="2025" <?php if($end_event_date_year == "2025") { ?> selected<?php } ?>>2025</option>
				</select>
			</td>
			<td>Month:</td>
			<td>
				<select name="end_event_date_month" id="end_event_date_month">
					<option value="01" <?php if($end_event_date_month == "01") { ?> selected<?php } ?>>January</option>
					<option value="02" <?php if($end_event_date_month == "02") { ?> selected<?php } ?>>February</option>
					<option value="03" <?php if($end_event_date_month == "03") { ?> selected<?php } ?>>March</option>
					<option value="04" <?php if($end_event_date_month == "04") { ?> selected<?php } ?>>April</option>
					<option value="05" <?php if($end_event_date_month == "05") { ?> selected<?php } ?>>May</option>
					<option value="06" <?php if($end_event_date_month == "06") { ?> selected<?php } ?>>June</option>
					<option value="07" <?php if($end_event_date_month == "07") { ?> selected<?php } ?>>July</option>
					<option value="08" <?php if($end_event_date_month == "08") { ?> selected<?php } ?>>August</option>
					<option value="09" <?php if($end_event_date_month == "09") { ?> selected<?php } ?>>September</option>
					<option value="10" <?php if($end_event_date_month == "10") { ?> selected<?php } ?>>October</option>
					<option value="11" <?php if($end_event_date_month == "11") { ?> selected<?php } ?>>November</option>
					<option value="12" <?php if($end_event_date_month == "12") { ?> selected<?php } ?>>December</option>
				</select>
			</td>
			<td>Day:</td>
			<td>
				<select name="end_event_date_day" id="end_event_date_day">
					<option value="01" <?php if($end_event_date_day == "01") { ?> selected<?php } ?>>01</option>
					<option value="02" <?php if($end_event_date_day == "02") { ?> selected<?php } ?>>02</option>
					<option value="03" <?php if($end_event_date_day == "03") { ?> selected<?php } ?>>03</option>
					<option value="04" <?php if($end_event_date_day == "04") { ?> selected<?php } ?>>04</option>
					<option value="05" <?php if($end_event_date_day == "05") { ?> selected<?php } ?>>05</option>
					<option value="06" <?php if($end_event_date_day == "06") { ?> selected<?php } ?>>06</option>
					<option value="07" <?php if($end_event_date_day == "07") { ?> selected<?php } ?>>07</option>
					<option value="08" <?php if($end_event_date_day == "08") { ?> selected<?php } ?>>08</option>
					<option value="09" <?php if($end_event_date_day == "09") { ?> selected<?php } ?>>09</option>
					<option value="10" <?php if($end_event_date_day == "10") { ?> selected<?php } ?>>10</option>
					<option value="11" <?php if($end_event_date_day == "11") { ?> selected<?php } ?>>11</option>
					<option value="12" <?php if($end_event_date_day == "12") { ?> selected<?php } ?>>12</option>
					<option value="13" <?php if($end_event_date_day == "13") { ?> selected<?php } ?>>13</option>
					<option value="14" <?php if($end_event_date_day == "14") { ?> selected<?php } ?>>14</option>
					<option value="15" <?php if($end_event_date_day == "15") { ?> selected<?php } ?>>15</option>
					<option value="16" <?php if($end_event_date_day == "16") { ?> selected<?php } ?>>16</option>
					<option value="17" <?php if($end_event_date_day == "17") { ?> selected<?php } ?>>17</option>
					<option value="18" <?php if($end_event_date_day == "18") { ?> selected<?php } ?>>18</option>
					<option value="19" <?php if($end_event_date_day == "19") { ?> selected<?php } ?>>19</option>
					<option value="20" <?php if($end_event_date_day == "20") { ?> selected<?php } ?>>20</option>
					<option value="21" <?php if($end_event_date_day == "21") { ?> selected<?php } ?>>21</option>
					<option value="22" <?php if($end_event_date_day == "22") { ?> selected<?php } ?>>22</option>
					<option value="23" <?php if($end_event_date_day == "23") { ?> selected<?php } ?>>23</option>
					<option value="24" <?php if($end_event_date_day == "24") { ?> selected<?php } ?>>24</option>
					<option value="25" <?php if($end_event_date_day == "25") { ?> selected<?php } ?>>25</option>
					<option value="26" <?php if($end_event_date_day == "26") { ?> selected<?php } ?>>26</option>
					<option value="27" <?php if($end_event_date_day == "27") { ?> selected<?php } ?>>27</option>
					<option value="28" <?php if($end_event_date_day == "28") { ?> selected<?php } ?>>28</option>
					<option value="29" <?php if($end_event_date_day == "29") { ?> selected<?php } ?>>29</option>
					<option value="30" <?php if($end_event_date_day == "30") { ?> selected<?php } ?>>30</option>
					<option value="31" <?php if($end_event_date_day == "31") { ?> selected<?php } ?>>31</option>
				</select>
			</td>
			<td>Hour:</td>
			<td>
				<select name="end_event_date_hour" id="end_event_date_hour">
					<option value="00" <?php if($end_event_date_hour == "00") { ?> selected<?php } ?>>12 a.m.</option>
					<option value="01" <?php if($end_event_date_hour == "01") { ?> selected<?php } ?>>1 a.m.</option>
					<option value="02" <?php if($end_event_date_hour == "02") { ?> selected<?php } ?>>2 a.m.</option>
					<option value="03" <?php if($end_event_date_hour == "03") { ?> selected<?php } ?>>3 a.m.</option>
					<option value="04" <?php if($end_event_date_hour == "04") { ?> selected<?php } ?>>4 a.m.</option>
					<option value="05" <?php if($end_event_date_hour == "05") { ?> selected<?php } ?>>5 a.m.</option>
					<option value="06" <?php if($end_event_date_hour == "06") { ?> selected<?php } ?>>6 a.m.</option>
					<option value="07" <?php if($end_event_date_hour == "07") { ?> selected<?php } ?>>7 a.m.</option>
					<option value="08" <?php if($end_event_date_hour == "08") { ?> selected<?php } ?>>8 a.m.</option>
					<option value="09" <?php if($end_event_date_hour == "09") { ?> selected<?php } ?>>9 a.m.</option>
					<option value="10" <?php if($end_event_date_hour == "10") { ?> selected<?php } ?>>10 a.m.</option>
					<option value="11" <?php if($end_event_date_hour == "11") { ?> selected<?php } ?>>11 a.m.</option>
					<option value="12" <?php if($end_event_date_hour == "12") { ?> selected<?php } ?>>12 p.m.</option>
					<option value="13" <?php if($end_event_date_hour == "13") { ?> selected<?php } ?>>1 p.m.</option>
					<option value="14" <?php if($end_event_date_hour == "14") { ?> selected<?php } ?>>2 p.m.</option>
					<option value="15" <?php if($end_event_date_hour == "15") { ?> selected<?php } ?>>3 p.m.</option>
					<option value="16" <?php if($end_event_date_hour == "16") { ?> selected<?php } ?>>4 p.m.</option>
					<option value="17" <?php if($end_event_date_hour == "17") { ?> selected<?php } ?>>5 p.m.</option>
					<option value="18" <?php if($end_event_date_hour == "18") { ?> selected<?php } ?>>6 p.m.</option>
					<option value="19" <?php if($end_event_date_hour == "19") { ?> selected<?php } ?>>7 p.m.</option>
					<option value="20" <?php if($end_event_date_hour == "20") { ?> selected<?php } ?>>8 p.m.</option>
					<option value="21" <?php if($end_event_date_hour == "21") { ?> selected<?php } ?>>9 p.m.</option>
					<option value="22" <?php if($end_event_date_hour == "22") { ?> selected<?php } ?>>10 p.m.</option>
					<option value="23" <?php if($end_event_date_hour == "23") { ?> selected<?php } ?>>11 p.m.</option>
				</select>
			</td>
			<td>Minutes:</td>
			<td>

				<select name="end_event_date_minute" id="end_event_date_minute">
					<option value="00" <?php if($end_event_date_minute == "00") { ?> selected<?php } ?>>0 minutes</option>
					<option value="15" <?php if($end_event_date_minute == "15") { ?> selected<?php } ?>>15 minutes</option>
					<option value="30" <?php if($end_event_date_minute == "30") { ?> selected<?php } ?>>30 minutes</option>
					<option value="45" <?php if($end_event_date_minute == "45") { ?> selected<?php } ?>>45 minutes</option>
				</select>

			</td>
		</tr>
	</table>

	<?php
}

function soco_events_location(){
	// Call Current Post
	global $post;

	// Get info from post
	$meta = get_post_custom($post->ID);

	// Event Location
	$event_location_street = $meta['Event Location Street'][0];
	$event_location_unit = $meta['Event Location Unit'][0];
	$event_location_city = $meta['Event Location City'][0];
	$event_location_state = $meta['Event Location State'][0];
	$event_location_zip = $meta['Event Location Zip'][0];

	?>

	<table>
		<tr>
			<td>Street:</td>
			<td><input type="text" name="event_location_street" value="<?php echo $event_location_street; ?>"></td>
		</tr>
		<tr>
			<td>Unit:</td>
			<td><input type="text" name="event_location_unit" value="<?php echo $event_location_unit; ?>"></td>
		</tr>
		<tr>
			<td>City:</td>
			<td><input type="text" name="event_location_city" value="<?php echo $event_location_city; ?>"></td>
		</tr>
		<tr>
			<td>State:</td>
			<td><input type="text" name="event_location_state" value="<?php echo $event_location_state; ?>"></td>
		</tr>
		<tr>
			<td>Zip:</td>
			<td><input type="text" name="event_location_zip" value="<?php echo $event_location_zip; ?>"></td>
		</tr>
	</table>

<?php }

function save_event() {

	global $post;
	$postID = $post->ID;

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	} else {

		// Time Format Needed for MySQL
		// 2004-01-01 12:00:00

		$startDate = strtotime($_POST['start_event_date_year'].'-'.$_POST['start_event_date_month'].'-'.$_POST['start_event_date_day'].' '.$_POST['start_event_date_hour'].':'.$_POST['start_event_date_minute'].':00');
		$startDateSQL = date('Y-m-d H:i:s', $startDate);

		$endDate = strtotime($_POST['end_event_date_year'].'-'.$_POST['end_event_date_month'].'-'.$_POST['end_event_date_day'].' '.$_POST['end_event_date_hour'].':'.$_POST['end_event_date_minute'].':00');
		$endDateSQL = date('Y-m-d H:i:s', $endDate);

		update_post_meta($postID, 'Start Event Date', $startDateSQL);
		update_post_meta($postID, 'End Event Date', $endDateSQL);
		update_post_meta($postID, 'Event Location Street', $_POST['event_location_street']);
		update_post_meta($postID, 'Event Location Unit', $_POST['event_location_unit']);
		update_post_meta($postID, 'Event Location City', $_POST['event_location_city']);
		update_post_meta($postID, 'Event Location State', $_POST['event_location_state']);
		update_post_meta($postID, 'Event Location Zip', $_POST['event_location_zip']);
	}

}

add_action('save_post', 'save_event');
?>