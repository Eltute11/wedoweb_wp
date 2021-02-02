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
  wp_enqueue_script('app');
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


// Cargamos recursos para activar boton de Ajax
add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );
function my_load_more_scripts() {
	global $wp_query;
  
  // Registramos el script
  // IMPORTANTE: cargar en footer para pasar parametros de variable desde el front
  wp_register_script( 'loadmoregallery', get_template_directory_uri() . '/js/loadmoregallery.js', array('jquery'), false, true );
 
  // Damos permiso al JS para utilizar AJAX
	wp_localize_script( 'loadmoregallery', 'loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => serialize( $wp_query->query_vars ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'loadmoregallery' );
}
 

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
function loadmore_ajax_handler(){
 
	// Preparamos los argumentos para la query
	$args = unserialize( stripslashes( $_POST['query'] ) ); // Recuperamos la query que enviamos por AJAX y serializamos en wp_localize_script 
	$args['paged'] = $_POST['page'] + 1; // Sumamos +1 para que nos devuelva los datos de la siguiente paginacion
  
  // print_r($args); // Solo para testeo

	// ejecutamos la query
	query_posts( $args );
 
	if( have_posts() ) : while( have_posts() ): the_post();
 
			// Imprimimos los datos obtenidos
			get_template_part('template-parts/gallery/content'); 
			// Comentario de abajo solo para testeo
			// echo '<h1>' + the_title() + '</h1>';
 
  endwhile; endif;
	die;
}