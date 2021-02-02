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

// Creamos el CPT para la galeria
add_action( 'init', 'gallery_custom_post_type' );
function gallery_custom_post_type() {
  $args = array(
      'public'    => true,
      'label'     => __( 'Gallery', 'wedoweb' ),
      'menu_icon' => 'dashicons-book',
      'supports'  => array( 'title', 'thumbnail', 'custom-fields', ),
  );
  register_post_type( 'gallery', $args );
}

// Creamos un nuevo rol
add_action('init', 'add_custom_role');
function add_custom_role(){
  // Para que solo se cree una vez lo versionamos
  if ( get_option( 'custom_roles_version' ) < 1 ) {
    add_role( 'gallery-author', 'Gallery author', 
      array( 
        'read'          => true, 
        'edit_posts'    => false, 
        'delete_posts'  => false, 
      )
    );
    update_option( 'custom_roles_version', 1 );
  }
}

// Restringimos el acceso
add_action('init', 'wp_restrict_mode');
function wp_restrict_mode() {
  $user = wp_get_current_user(); // Obtenemos los datos del usuario
  $roles = (array) $user->roles; // Obtenemos los roles
  $role = $roles[0]; // Obtenemos el rol principal

  // Verificamos si es un usuario logueado 
  if( is_user_logged_in() ){
    // Verificamos si está en el panel de administración y el tipo de rol
    if (is_admin() && $role === 'gallery-author') {
      // Redirigimos a la home
      wp_safe_redirect( home_url() ); exit;
    }
  }
}

// Deshabilitamos la barra de herramientas en el front-end
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}