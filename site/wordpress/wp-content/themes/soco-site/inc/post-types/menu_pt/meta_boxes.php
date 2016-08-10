<?php

// NEWS POST TYPE META BOXES

// Create New Boxes
function soco_menu_boxes() {

	// Add Individual Box
	add_meta_box(
		'soco_menu', // ID
		'Item Price', // Title Displayed
		'soco_menu', // Function called
		'soco_menu_pt', // Post Type Refferenced
		'normal', // Location
		'high' // Priority
	);

}

add_action( 'add_meta_boxes', 'soco_menu_boxes' );

function soco_menu(){

	// Call Current Post
	global $post;

	// Get info from post
	$meta = get_post_custom($post->ID);

	// Fetch Key
	$price = $meta["Soco Menu Price"][0];
	$priceBtl = $meta["Soco Menu Price Btl"][0]

	// Content Displayed
	?>
	<p><strong>Input the price for this item. Do not include the "$". If this is a drink item, please input on this box, the price by the glass/draft</strong></p>
	<p><input type="text" name="price" value="<?php echo $price; ?>"></p>
	<p><strong>Price by the bottle:</strong></p>
	<p><input type="text" name="price_btl" value="<?php echo $priceBtl; ?>"></p>
	<?php
}

function save_menu() {

	global $post;
	$postID = $post->ID;

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	} else {
		update_post_meta($postID, 'Soco Menu Price', $_POST['price']);
		update_post_meta($postID, 'Soco Menu Price Btl', $_POST['price_btl']);
	}

}

add_action('save_post', 'save_menu');

?>