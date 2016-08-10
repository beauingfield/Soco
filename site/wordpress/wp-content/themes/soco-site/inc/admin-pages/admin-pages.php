<?php

// Soco Settings Menu

function home_create_menu(){

	add_menu_page( 'Soco Home Settings', 'Home Settings', 'manage_options', 'soco_home_settings', 'soco_home_settings', 'dashicons-admin-home', 3 );

	add_menu_page( 'Soco Location Settings', 'Location Settings', 'manage_options', 'soco_location_settings', 'soco_location_settings', 'dashicons-location-alt', 4 );

}

add_action('admin_menu', 'home_create_menu');

include 'home.php';
include 'location.php';

?>