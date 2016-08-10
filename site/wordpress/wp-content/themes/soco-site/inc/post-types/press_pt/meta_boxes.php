<?php

// NEWS POST TYPE META BOXES

// Create New Boxes
function soco_press_boxes() {

	// Add Individual Box
	add_meta_box(
		'soco_press_url', // ID
		'Press Link to Content', // Title Displayed
		'soco_press_url', // Function called
		'soco_press_pt', // Post Type Refferenced
		'normal', // Location
		'high' // Priority
	);
	
}

add_action( 'add_meta_boxes', 'soco_press_boxes' );

function soco_press_url(){
	
	// Call Current Post
	global $post;

	// Get info from post
	$meta = get_post_custom($post->ID);

	// Event Location
	$press = $meta["Press Link"][0];

	// Content Displayed
	?>
	<p>Include http://www</p>
	<input type="text" name="press" value="<?php echo $press; ?>" style="width: 100%;">
	
	<?php
}

function save_press() {

	global $post;
	$postID = $post->ID;

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	} else {
		update_post_meta($postID, 'Press Link', $_POST['press']);
	}

}

add_action('save_post', 'save_press');

?>