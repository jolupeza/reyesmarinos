<?php get_header(); ?>

<section class="Page Page--eventos">
  <div class="container">
    <section class="Box Page-blog">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
          <?php the_post(); ?>
          <article class="Box-item Page-blog-item">
              <figure class="Page-blog-figure">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full', [
                      'class' => 'img-responsive center-block',
                      'alt' => get_the_title()
                    ]);
                  ?>
                <?php else : ?>
                  <img src="<?php echo IMAGES; ?>/post-thumb01.jpg" alt="Image default" class="img-responsive center-block">
                <?php endif; ?>
                <aside class="Page-blog-figure-readMore text-uppercase"><a href="<?php the_permalink(); ?>">Ver</a></aside>
              </figure>
            <h2 class="Page-blog-title h5"><?php the_title(); ?></h2>
          </article>
        <?php endwhile; ?>
      <?php endif; ?>
    </section>
  </div>
</section>

<?php get_footer(); ?>
