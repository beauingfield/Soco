<?php

// Register Custom Post Type
function soco_culture_pt() {

	// Add new taxonomy, make it hierarchical (like categories)
	$CultureCatlabels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Category' ),
	);

	$CultureCatArgs = array(
		'hierarchical'      => true,
		'labels'            => $CultureCatlabels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'culture-categories', array( 'soco_culture_pt' ), $CultureCatArgs );

	$culture_labels = array(
		'name'                => _x('Soco Culture', 'Soco Culture'),
		'singular_name'       => _x( 'Cultures', 'Culture' ),
		'menu_name'           => __( 'Soco Culture' ),
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

	$culture_args = array(
		'label'               => __( 'SocoCulture' ),
		'description'         => __( 'Restaurant Culture' ),
		'labels'              => $culture_labels,
		'query_var'						=> true,
		'rewrite'							=> array('slug' => 'culture', 'with_front' => false),
		'supports'            => array( 'editor', 'title', 'revisions', 'author', 'thumbnail' ),
		'taxonomies'          => array( 'culture-categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_icon'	=> 'dashicons-art',
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type( 'soco_culture_pt', $culture_args );

}

// Hook into the 'init' action
add_action( 'init', 'soco_culture_pt');

?>