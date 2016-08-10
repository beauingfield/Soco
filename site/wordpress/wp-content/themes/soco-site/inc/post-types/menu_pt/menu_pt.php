<?php

function soco_menu_pt() {
	register_post_type( 'soco_menu_pt', array(
		'label'		=> __('SocoMenu'),
		'description'	=> __('Soco Menus'),
		'hierarchical'      => false,
		'public'            => true,
		'show_in_menu'	=> true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar'	=> true,
		'menu_icon'	=> 'dashicons-book-alt',
		'menu_position'	=> 4,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'SocoMenus', 'YOUR-TEXTDOMAIN' ),
			'singular_name'       => __( 'SocoMenu', 'YOUR-TEXTDOMAIN' ),
			'menu_name'	=> __('Soco Menu'),
			'parent_item_colon' => __('Parent Item:', 'text_domain'),
			'all_items'           => __( 'All Items', 'YOUR-TEXTDOMAIN' ),
			'new_item'            => __( 'Add New Item', 'YOUR-TEXTDOMAIN' ),
			'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'        => __( 'Add New SocoMenu', 'YOUR-TEXTDOMAIN' ),
			'edit_item'           => __( 'Edit Item', 'YOUR-TEXTDOMAIN' ),
			'view_item'           => __( 'View Item', 'YOUR-TEXTDOMAIN' ),
			'search_items'        => __( 'Search Item', 'YOUR-TEXTDOMAIN' ),
			'not_found'           => __( 'Not found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'  => __( 'Not found in trash', 'YOUR-TEXTDOMAIN' ),
		),
	) );

	register_taxonomy( 'menucategory', array( 'soco_menu_pt' ), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Menu Categories', 'YOUR-TEXTDOMAIN' ),
			'singular_name'              => _x( 'Menu Category', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
			'search_items'               => __( 'Search Menu Categories', 'YOUR-TEXTDOMAIN' ),
			'popular_items'              => __( 'Popular Menu Categories', 'YOUR-TEXTDOMAIN' ),
			'all_items'                  => __( 'All Menu Categories', 'YOUR-TEXTDOMAIN' ),
			'parent_item'                => __( 'Parent Menu Category', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'          => __( 'Parent Menu Category:', 'YOUR-TEXTDOMAIN' ),
			'edit_item'                  => __( 'Edit Menu Category', 'YOUR-TEXTDOMAIN' ),
			'update_item'                => __( 'Update Menu Category', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'               => __( 'New Menu Category', 'YOUR-TEXTDOMAIN' ),
			'new_item_name'              => __( 'New Menu Category', 'YOUR-TEXTDOMAIN' ),
			'separate_items_with_commas' => __( 'Menu Categories separated by comma', 'YOUR-TEXTDOMAIN' ),
			'add_or_remove_items'        => __( 'Add or remove Menu Categories', 'YOUR-TEXTDOMAIN' ),
			'choose_from_most_used'      => __( 'Choose from the most used Menu Categories', 'YOUR-TEXTDOMAIN' ),
			'menu_name'                  => __( 'Menu Categories', 'YOUR-TEXTDOMAIN' ),
		),
	) );

}

add_action( 'init', 'soco_menu_pt' );

add_action( 'restrict_manage_posts', 'my_restrict_manage_posts' );
function my_restrict_manage_posts() {
	global $typenow;
	$taxonomy = 'menucategory';
	if( $typenow != "page" && $typenow != "post" ){
		$filters = array($taxonomy);
		foreach ($filters as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
			echo "<option value=''>$tax_name</option>";
			foreach ($terms as $term) { echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; }
			echo "</select>";
		}
	}
}

function soco_menu_pt_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['soco_menu_pt'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('SocoMenu updated. <a target="_blank" href="%s">View SocoMenu</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
		3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
		4 => __('SocoMenu updated.', 'YOUR-TEXTDOMAIN'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('SocoMenu restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('SocoMenu published. <a href="%s">View SocoMenu</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		7 => __('SocoMenu saved.', 'YOUR-TEXTDOMAIN'),
		8 => sprintf( __('SocoMenu submitted. <a target="_blank" href="%s">Preview SocoMenu</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('SocoMenu scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview SocoMenu</a>', 'YOUR-TEXTDOMAIN'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('SocoMenu draft updated. <a target="_blank" href="%s">Preview SocoMenu</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'soco_menu_pt_updated_messages' );

include 'meta_boxes.php';


add_filter('manage_edit-soco_menu_pt_columns', 'AddCategoryColumn');

function AddCategoryColumn($columns) {

	// change the column titles.
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Menu Item Name'),
		'menu_type' => __('Category'),
		'price' => __('Price'),
		'date' => __('Date')
	);
	return $columns;
}

add_action('manage_soco_menu_pt_posts_custom_column', 'ManageContentOfColumn');

function ManageContentOfColumn($column, $post_id) {
	global $post;

	switch ($column) {
		// While it's storting out the columns, this checks for the current column and checks if it is price.
		case 'price':
			$price = get_post_meta($post->ID, 'Soco Menu Price', true); // get the Price meta
			if(empty($price)) {
				echo 'Unknown'; // If there isn't any price for the item, display unknown.
			} else {
				echo $price; // otherwise display the price
			}
			break;

		// Let's display the menu categories to their items
		case 'menu_type':
			$terms = get_the_terms($post_id, 'menucategory'); // Get all the terms for the current post.
			if(!empty($terms)) {
				$out  = array(); // Make an array to store all the links so that the columns can filter the results by the selected taxonomy.
				foreach($terms as $term) {
					$out[] = sprintf('<a href="%s">%s</a>',
						esc_url(add_query_arg( array('post_type' => $post->post_type, 'menucategory' => $term->slug), 'edit.php')),
						esc_html(sanitize_term_field('name',$term->name, $term->term_id , 'menucategory', 'display'))
					);
				}

				echo join(', ', $out); /// after building the links, join them together in a string and separate them by a comma.
			} else {
				_e('No Category'); // Display "No Category" if no terms are found for that item.
			}
			break;

		default:
			break;
	}
}

?>