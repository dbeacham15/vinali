<?php

add_theme_support( 'post-thumbnails' );

function theme_name_scripts() {
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style( 'vinali-style', get_stylesheet_uri() );
    wp_enqueue_script('vinali-script', get_template_directory_uri() . '/vinali.js', array(), '', true);
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

function register_my_menus() {
  register_nav_menus(
    array(
      'nav-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function load_fonts() {
    wp_register_style('vinali-googleFonts', 'http://fonts.googleapis.com/css?family=Prata|Quicksand');
    wp_enqueue_style('vinali-googleFonts');
}

add_action('wp_print_styles', 'load_fonts');

/**
 * Enables the Excerpt meta box in Page edit screen.
 */
function wpcodex_add_excerpt_support_for_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );