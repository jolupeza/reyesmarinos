<?php get_header(); ?>

<section class="Page">
  <figure class="Page-background">
    <img src="<?php echo IMAGES; ?>/bg-eventos.png" class="img-responsive center-block" />

    <section class="Page-bgContent">
      <div class="container">

        <?php if (have_posts()) : ?>

          <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <?php get_template_part('content', get_post_format()); ?>

          <?php endwhile; ?>

        <?php endif; ?>

      </div>
    </section>
  </figure>
</section>

<?php get_footer(); ?>
