<?php get_header(); ?>

<?php
  $args = [
    'post_type' => 'sliders',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
  ];
  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) :
    $i = 0;
?>
  <section id="carousel-home" class="carousel slide Carousel Carousel--home" data-ride="carousel">
    <!-- <ol class="carousel-indicators">
      <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-home" data-slide-to="1"></li>
    </ol> -->

    <div class="carousel-inner" role="listbox">
      <?php while ($the_query->have_posts()) : ?>
        <?php $the_query->the_post(); ?>
        <?php
          $values = get_post_custom(get_the_id());
          $responsive = isset($values['mb_responsive']) ? esc_attr($values['mb_responsive'][0]) : '';
        ?>
        <?php if (has_post_thumbnail()) : ?>
          <div class="item<?php echo ($i === 0) ? ' active' : ''; ?>">
            <picture>
              <?php if (!empty($responsive)) : ?>
                <source class="img-responsive center-block" media="(max-width: 991px) and (orientation: portrait)" srcset="<?php echo $responsive; ?>" alt="" />
              <?php endif; ?>
              <?php the_post_thumbnail('full', [
                  'class' => 'img-responsive center-block',
                  'alt' => get_the_title()
                ]);
              ?>
            </picture>
          </div>
        <?php endif; ?>
        <?php $i++; ?>
      <?php endwhile; ?>
    </div>

   <!--  <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
      <i class="icon-keyboard_arrow_left"></i>
    </a>
    <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
      <i class="icon-keyboard_arrow_right"></i>
    </a> -->
  </section>
<?php endif; ?>

<?php get_footer(); ?>
