<?php get_header(); ?>

<!-- Comienzo de hero -->
<div class="hero">
  <div class="container">
    <h1>Gallery</h1>
  </div>
</div>
<!-- Fin de hero -->

<!-- Comienzo de galería -->
<section id="gallery_container">
  <div class="container">

    <!-- Comienzo de buscador -->
    <div class="row justify-content-end">
      <div class="col-md-auto">
        <div class="search_container">
          <label for="search">Search by #</label>
          <div class="search_box">
            <input type="text" name="search" id="search" onkeyup="searchImage()">
            <img src="<?php bloginfo('template_url'); ?>/images/icon_search.png" alt="icon search">
          </div>
        </div>
      </div>
    </div>
    <!-- Fin de buscador -->

    <!-- Comienzo de listado -->
    <div class="row" id="gallery_list">

      <?php 

      $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

      $args = array(
        'post_type'  => 'gallery',
        'orderby'    => 'date',
        'order'    => 'DESC',
        'post_status' => 'publish',
        'paged' => $paged
      );

      $query = new WP_Query( $args );

      if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); 

        get_template_part('template-parts/gallery/content'); 
      
      endwhile;
      else:
        echo '<h2>Lo sentimos, no tenemos post para mostrar.</h2>';
      endif;

      ?>
      <script>
        var posts_myajax = '<?php echo serialize( $query->query_vars ) ?>';
        var current_page_myajax = 1;
        var max_page_myajax = <?php echo $query->max_num_pages ?>;
      </script>
      
    </div>
    <!-- Fin del listado -->

    <!-- Comienzo botón Load More -->
    <!-- Verificamos si hay mas post que mostrar -->
    <?php if (  $query->max_num_pages > 1 ) { ?>
    <div class="row justify-content-center">
      <div class="spinner my-2 hidden">
        <img src="<?php bloginfo('template_url'); ?>/images/spinner.gif" alt="spinner">
      </div>
    </div>
    <div class="row justify-content-center">
      <button id="load_more_items_gallery">Load More</button>
    </div>
    <!-- Fin botón Load More -->
    <?php }?>

  </div>
</section>
<!-- Fin de galería -->

<?php get_footer(); ?>