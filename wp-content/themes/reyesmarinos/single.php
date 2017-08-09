<?php get_header(); ?>

<section class="Page Page--eventos">
  <div class="container">

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : ?>
        <?php the_post(); ?>

        <?php get_template_part('content', get_post_format()); ?>

      <?php endwhile; ?>

    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
