<?php $user = get_field("autor"); ?>

<div class="col-12 col-sm-6 col-lg-4 item_gallery">
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