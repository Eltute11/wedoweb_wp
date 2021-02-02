<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title('&raquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
</head>
<body <?php body_class(); ?>>
    <!-- Comienzo de header -->
    <header>
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-auto">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php bloginfo('template_url'); ?>/images/logo_header.png" alt="logo" id="logo_header">
            </a>
          </div>
          <div class="col-auto">
            <a href="<?php echo home_url(); ?>/wp-admin" class="btn_login">Login</a>
            <button type="button" class="btn_login_mobile">
              <div class="content">
                <div class="line line_top"></div>
                <div class="line line_center"></div>
                <div class="line line_bottom"></div>
              </div>
            </button>
          </div>
        </div>
      </div>
    </header>
    <!-- Fin de header -->