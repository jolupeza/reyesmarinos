<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php $category = get_the_category(); ?>
    <section class="Page">
      <figure class="Page-background">
        <img src="<?php echo IMAGES; ?>/bg-<?php echo $category[0]->slug; ?>.png" class="img-responsive center-block" />

        <section class="Page-bgContent">
          <div class="container">
            <?php the_post(); ?>

            <?php get_template_part('content', get_post_format()); ?>
          </div>
        </section>
      </figure>
    </section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
