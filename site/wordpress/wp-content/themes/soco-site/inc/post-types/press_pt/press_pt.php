<?php

// Register Custom Post Type
function soco_press_pt() {

	$press_labels = array(
		'name'                => _x('Soco Press', 'Soco Press'),
		'singular_name'       => _x( 'Press', 'Press' ),
		'menu_name'           => __( 'Soco Press' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);

	$press_args = array(
		'label'               => __( 'SocoPress' ),
		'description'         => __( 'Restaurant Press' ),
		'labels'              => $press_labels,
		'supports'            => array( 'editor', 'title', 'revisions', 'author', 'thumbnail' ),
		'taxonomies'          => array( 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_icon'	=> 'dashicons-megaphone',
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type( 'soco_press_pt', $press_args );

}

// Hook into the 'init' action
add_action( 'init', 'soco_press_pt');

include 'meta_boxes.php';

?>