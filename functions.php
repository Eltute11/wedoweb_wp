<?php

// Soporte para imagen destacada
add_theme_support( 'post-thumbnails' );

// Style and Script
add_action('init', 'my_register_styles_script');
function my_register_styles_script() {
    // CSS
    wp_register_style( 'bootstrap-grid', get_template_directory_uri() . '/css/boostrapp-grid.min.css' );
    wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' );
    wp_register_style( 'main', get_template_directory_uri() . '/css/scss/main.css', array( 'bootstrap-grid', 'normalize'));

    // JS
    wp_register_script( 'app', get_template_directory_uri() . '/js/main.js', array( 'jquery'));
}


add_action( 'wp_enqueue_scripts', 'my_enqueue_styles' );
function my_enqueue_styles() {
  // CSS
  wp_enqueue_style('bootstrap-grid');
  wp_enqueue_style('normalize');
  wp_enqueue_style('google-fonts');
  wp_enqueue_style('main');

  // JS
  wp_enqueue_script('jQuery');
  wp_enqueue_script('main');
}
