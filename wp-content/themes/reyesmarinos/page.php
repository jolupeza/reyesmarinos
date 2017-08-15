<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php the_post(); ?>
    <?php
      $values = get_post_custom(get_the_id());
      $background = isset($values['mb_background']) ? esc_attr($values['mb_background'][0]) : '';
    ?>
    <section class="Page">
      <figure class="Page-background">
        <?php if (!empty($background)) : ?>
          <img src="<?php echo $background; ?>" alt="Nosotros" class="img-responsive center-block" />
        <?php endif; ?>
        <section class="Page-bgContent Page-bgContent--center">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-6">
                <?php if (has_post_thumbnail()) : ?>
                  <figure class="Page-figure">
                    <?php the_post_thumbnail('full', [
                        'class' => 'img-responsive center-block',
                        'alt' => get_the_title()
                      ]);
                    ?>
                  </figure>
                <?php endif; ?>
              </div>
              <div class="col-sm-6 col-md-7 col-lg-6">
                <article class="Page-textDecorate">
                  <?php the_content(); ?>
                </article>
              </div>
            </div>
          </div>
        </section>
      </figure>
    </section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
