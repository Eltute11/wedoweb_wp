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
            <input type="text" name="search" id="search">
            <img src="<?php bloginfo('template_url'); ?>/images/icon_search.png" alt="icon search">
          </div>
        </div>
      </div>
    </div>
    <!-- Fin de buscador -->

    <!-- Comienzo de listado -->
    <div class="row">

      <?php 
      
      $args = array(
        'post_type'  => 'gallery',
        'orderby'    => 'date',
        'order'    => 'DESC'
      );

      $query = new WP_Query( $args );

      if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); 

        $user = get_field("autor");

      ?>

        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card_gallery">
            <div class="card_top" style="background-image:url('<?php if(has_post_thumbnail() ){ echo get_the_post_thumbnail_url(get_the_ID(),'medium_large'); } ?>')"></div>
            <div class="card_bottom">
              <div class="card_credit">
                <div class="card_avatar">
                  <?php echo $user['user_avatar']; ?>
                </div>
                <div class="card_text">
                  <p class="title"><?php echo $user['display_name']; ?></p>
                  <p class="hashtag">#<?php the_field('hashtag'); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php 
      
      endwhile;
      else:
        echo '<h2>Lo sentimos, no tenemos post para mostrar.</h2>';
      endif;
      
      ?>
      
    </div>
    <!-- Fin del listado -->

    <!-- Comienzo botón Load More -->
    <div class="row justify-content-center">
      <button id="load_more_items_gallery">Load More</button>
    </div>
    <!-- Fin botón Load More -->

  </div>
</section>
<!-- Fin de galería -->

<?php get_footer(); ?>