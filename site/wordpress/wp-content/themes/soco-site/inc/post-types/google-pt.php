 <?php

function google_init() {
	register_post_type( 'google', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'GoogleLabels', 'YOUR-TEXTDOMAIN' ),
			'singular_name'       => __( 'GoogleLabel', 'YOUR-TEXTDOMAIN' ),
			'all_items'           => __( 'GoogleLabels', 'YOUR-TEXTDOMAIN' ),
			'new_item'            => __( 'New googleLabel', 'YOUR-TEXTDOMAIN' ),
			'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'        => __( 'Add New googleLabel', 'YOUR-TEXTDOMAIN' ),
			'edit_item'           => __( 'Edit googleLabel', 'YOUR-TEXTDOMAIN' ),
			'view_item'           => __( 'View googleLabel', 'YOUR-TEXTDOMAIN' ),
			'search_items'        => __( 'Search googleLabels', 'YOUR-TEXTDOMAIN' ),
			'not_found'           => __( 'No googleLabels found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'  => __( 'No googleLabels found in trash', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'   => __( 'Parent googleLabel', 'YOUR-TEXTDOMAIN' ),
			'menu_name'           => __( 'GoogleLabels', 'YOUR-TEXTDOMAIN' ),
		),
	) );

}
add_action( 'init', 'google_init' );

function google_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['google'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('GoogleLabel updated. <a target="_blank" href="%s">View googleLabel</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
		3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
		4 => __('GoogleLabel updated.', 'YOUR-TEXTDOMAIN'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('GoogleLabel restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('GoogleLabel published. <a href="%s">View googleLabel</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		7 => __('GoogleLabel saved.', 'YOUR-TEXTDOMAIN'),
		8 => sprintf( __('GoogleLabel submitted. <a target="_blank" href="%s">Preview googleLabel</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('GoogleLabel scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview googleLabel</a>', 'YOUR-TEXTDOMAIN'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('GoogleLabel draft updated. <a target="_blank" href="%s">Preview googleLabel</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'google_updated_messages' );
