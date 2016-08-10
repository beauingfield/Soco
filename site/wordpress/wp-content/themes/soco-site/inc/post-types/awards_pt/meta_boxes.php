<?php

// NEWS POST TYPE META BOXES

// Create New Boxes
function soco_awards_boxes() {

	// Add Individual Box
	add_meta_box(
		'soco_awards_title', // ID
		'Award Meta Info', // Title Displayed
		'soco_awards_title', // Function called
		'soco_awards_pt', // Post Type Refferenced
		'normal', // Location
		'high' // Priority
	);
	
}

add_action( 'add_meta_boxes', 'soco_awards_boxes' );

function soco_awards_title(){
	
	// Call Current Post
	global $post;

	// Get info from post
	$meta = get_post_custom($post->ID);
	
	// Fetch Key
	$subText = $meta["Soco Award Sub Text"][0];
	$awardLink = $meta["Soco Award Link"][0];

	// Content Displayed
	?>
	<table>
		<tr>
			<td>Award Sub-text: </td>
			<td><input type="text" name="award-sub-text" value="<?php echo $subText; ?>"></td>
			<td>Award Link: </td>
			<td><input type="text" name="award-link" value="<?php echo $awardLink; ?>"></td>
		</tr>
	</table>
	
	<?php
}

function save_award() {

	global $post;
	$postID = $post->ID;

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	} else {
		update_post_meta($postID, 'Soco Award Sub Text', $_POST['award-sub-text']);
		update_post_meta($postID, 'Soco Award Link', $_POST['award-link']);
	}

}

add_action('save_post', 'save_award');

?>