<?php

function my_theme_enqueue_styles() {

	$parent_style = 'parent-style';
	wp_enqueue_style( 'bootstrap-style-cdn', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
    		array( $parent_style ),
        	wp_get_theme()->get('Version')
    	);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
