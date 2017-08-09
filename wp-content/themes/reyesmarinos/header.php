<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" />

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php endif; ?>

    <!-- Script required for extra functionality on the comment form -->
    <?php if (is_singular()) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="Header">
      <div class="container">
        <nav class="Header-menu">
          <?php
            $customLogoId = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($customLogoId, 'full');
          ?>
          <h1 class="Header-logo">
            <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
              <img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name') ?> | <?php bloginfo('description'); ?>" class="img-responsive center-block" />
            </a>
          </h1>
          <?php
            $args = [
              'theme_location' => 'main-menu',
              'menu_class' => 'MainMenu'
            ];

            wp_nav_menu($args);
          ?>
          <?php /*
          <ul class="MainMenu">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="eventos.html">Eventos</a></li>
            <li><a href="nosotros.html">Nosotros</a></li>
            <li><a href="">Videos</a></li>
            <li><a href="contactanos.html">Contáctanos</a></li>
          </ul>
          */ ?>
        </nav>
      </div>
    </header>
