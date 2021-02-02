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
            <img src="assets/img/icon_search.png" alt="icon search">
          </div>
        </div>
      </div>
    </div>
    <!-- Fin de buscador -->

    <!-- Comienzo de listado -->
    <div class="row">
      <!-- Comienzo de Item -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card_gallery">
          <div class="card_top" style="background-image:url('assets/img/hero_sam_1.png')"></div>
          <div class="card_bottom">
            <div class="card_credit">
              <div class="card_avatar">
                <img src="assets/img/avatar_sam.png" alt="avatar sam">
              </div>
              <div class="card_text">
                <p class="title">Sam Jerremy</p>
                <p class="hashtag">#dayAtTheBeach</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de Item -->
      <!-- Comienzo de Item -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card_gallery">
          <div class="card_top" style="background-image:url('assets/img/hero_mads_1.png')"></div>
          <div class="card_bottom">
            <div class="card_credit">
              <div class="card_avatar">
                <img src="assets/img/avatar_mads.png" alt="avatar mads">
              </div>
              <div class="card_text">
                <p class="title">Mads Schmidt</p>
                <p class="hashtag">#dayABigAssMounntain</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de Item -->
      <!-- Comienzo de Item -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card_gallery">
          <div class="card_top" style="background-image:url('assets/img/hero_chandler_1.png')"></div>
          <div class="card_bottom">
            <div class="card_credit">
              <div class="card_avatar">
                <img src="assets/img/avatar_sam.png" alt="avatar chandler">
              </div>
              <div class="card_text">
                <p class="title">Chandler Smith</p>
                <p class="hashtag">#catchASun</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de Item -->
      <!-- Comienzo de Item -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card_gallery">
          <div class="card_top" style="background-image:url('assets/img/hero_mads_2.png')"></div>
          <div class="card_bottom">
            <div class="card_credit">
              <div class="card_avatar">
                <img src="assets/img/avatar_mads.png" alt="avatar mads">
              </div>
              <div class="card_text">
                <p class="title">Mads Schmidt</p>
                <p class="hashtag">#findingHome</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de Item -->
      <!-- Comienzo de Item -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card_gallery">
          <div class="card_top" style="background-image:url('assets/img/hero_chandler_2.png')"></div>
          <div class="card_bottom">
            <div class="card_credit">
              <div class="card_avatar">
                <img src="assets/img/avatar_chandler.png" alt="avatar chandler">
              </div>
              <div class="card_text">
                <p class="title">Chandler Smith</p>
                <p class="hashtag">#ImNotBatmann</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de Item -->
      <!-- Comienzo de Item -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card_gallery">
          <div class="card_top" style="background-image:url('assets/img/hero_sam_2.png')"></div>
          <div class="card_bottom">
            <div class="card_credit">
              <div class="card_avatar">
                <img src="assets/img/avatar_sam.png" alt="avatar chandler">
              </div>
              <div class="card_text">
                <p class="title">Sam Jerremy</p>
                <p class="hashtag">#ROCKoN</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de Item -->
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