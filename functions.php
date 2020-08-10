<?php
/*-----------------------------------------------------------------------------------*/
/* Init/Remove Child Theme Actions after Setup
/*-----------------------------------------------------------------------------------*/
function inis_b_child_theme_setup() {
  load_child_theme_textdomain( 'inis-b-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'inis_b_child_theme_setup', 11 );

/*-----------------------------------------------------------------------------------*/
/* Remove Custom CSS from Customizer
/*-----------------------------------------------------------------------------------*/
function inis_b_child_remove_css_section( $wp_customize ) {
	$wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'inis_b_child_remove_css_section', 15 );

/*-----------------------------------------------------------------------------------*/
/* Enqueque Styles
/*-----------------------------------------------------------------------------------*/
function inis_b_child_theme_enqueue_styles() {
  wp_dequeue_style( 'inis-b-style' );
  wp_deregister_style( 'inis-b-style' );

  wp_enqueue_style( 'inis-b-style', get_template_directory_uri() . '/assets/css/style.css', '', '1.' . strtotime(date('Y-m-d H:i')), 'all' );
  wp_enqueue_style( 'inis-b-child-style', get_stylesheet_uri(), array('inis-b-style'), '1.' . strtotime(date('Y-m-d H:i')), 'all' );
}
add_action( 'wp_enqueue_scripts', 'inis_b_child_theme_enqueue_styles' );
