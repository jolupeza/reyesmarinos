<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <section class="Page">
    <figure class="Page-background">
      <img src="<?php echo IMAGES; ?>/bg-eventos.png" class="img-responsive center-block" />
      <section class="Page-bgContent">
        <div class="container">
          <section class="Box Page-blog">
            <?php while (have_posts()) : ?>
              <?php the_post(); ?>
              <article class="Box-item Page-blog-item">
                  <figure class="Page-blog-figure">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('event-thumb', [
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
          </section>

          <?php
            global $wp_query;
            $total = $wp_query->max_num_pages;
          ?>

          <?php if ($total > 1) : ?>
            <nav class="Pagination text-center">
              <?php
                $current_page = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                $format = ( get_option('permalink_structure' ) == '/%postname%/') ? 'page/%#%/' : '&paged=%#%';

                echo paginate_links(array(
                  'base'      =>    get_pagenum_link(1) . '%_%',
                  'format'    =>    $format,
                  'current'   =>    $current_page,
                  'prev_next' =>    True,
                  'prev_text' =>    __('&nbsp;', THEMEDOMAIN),
                  'next_text' =>    __('&nbsp;', THEMEDOMAIN),
                  'total'     =>    $total,
                  'mid_size'  =>    4,
                  'type'      =>    'list'
                ));
              ?>
            </nav>
          <?php endif; ?>
        </div>
      </section>
    </figure>
  </section>
<?php endif; ?>

<?php get_footer(); ?>
