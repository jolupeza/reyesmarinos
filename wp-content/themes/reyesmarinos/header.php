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

    <script>
      var player;
    </script>
  </head>
  <body <?php body_class(); ?>>
    <header class="Header">
      <?php
        $customLogoId = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($customLogoId, 'full');
      ?>
      <div class="container">
        <div class="row hidden-md hidden-lg">
          <div class="col-xs-6">
            <h1 class="Header-logo">
              <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                <img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name') ?> | <?php bloginfo('description'); ?>" class="img-responsive" />
              </a>
            </h1>
          </div>
          <div class="col-xs-6">&nbsp;</div>
        </div>
        <nav class="Header-menu hidden-xs hidden-sm">
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
        </nav>
        <aside class="Header-toggle visible-xs-block visible-sm-block js-toggle-slidebar">
          <i class="Icon Icon--toggle"></i>
        </aside>
      </div>
    </header>

    <section class="Slidebar">
      <aside class="Slidebar-close js-toggle-slidebar">
        <i class="Icon Icon--close"></i>
      </aside>
      <article class="Slidebar-content">
        <?php
          $args = [
            'theme_location' => 'main-menu',
            'container' => 'nav',
            'container_class' => 'Header-menu',
            'menu_class' => 'MainMenu'
          ];

          wp_nav_menu($args);
        ?>
      </article>
    </section>
