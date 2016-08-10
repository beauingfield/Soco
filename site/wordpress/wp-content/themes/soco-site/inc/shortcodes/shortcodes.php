<?php

// Divider
///////////////////////////////////////

add_shortcode('divider', 'divider' );

function divider() {

	return '<span class="divider"></span>';

}

// Chef Greg
///////////////////////////////////////

add_shortcode('chef-greg', 'chefGreg' );

function chefGreg(){
	return '<div class="chefGreg"><img src="'. get_template_directory_uri() .'/_assets/img/ChefGreg.jpg" /></div>';
}

// Blockquote
///////////////////////////////////////

add_shortcode('quote', 'blockquote');

function blockquote($atts, $content = null){

	return '<blockquote>&quot;'. do_shortcode($content) .'</blockquote>';

}

add_shortcode('quote-citation', 'quoteCitation');

function quoteCitation($atts, $content){
	return '&quot;<cite>'. do_shortcode( $content ) .'</cite>';
}

add_shortcode( 'quote-author', 'quoteAuthor' );

function quoteAuthor($atts, $content){
	return '<span>&#45;'. $content .'</span>';
}

// Headings
///////////////////////////////////////

add_shortcode('section-heading', 'sectionHeading');

function sectionHeading($atts, $content){
	return '<h2>'.$content.'</h2>';
}

add_shortcode('column-heading', 'columnHeading');

function columnHeading($atts, $content) {
	return '<h3 class="directions">'.$content.'</h3>';
}

// Coloumns
///////////////////////////////////////

add_shortcode('column-wrap', 'columnWrap');
add_shortcode('column', 'column' );

function columnWrap($atts, $content){

	return '<div class="content">'. do_shortcode( $content ) .'</div>';

}

function column($atts, $content) {

	$a = shortcode_atts(array(
			'size' => ''
	), $atts);

	return '<div class="column '.$a['size'].'">'. do_shortcode( $content ) .'</div>';
}

?>