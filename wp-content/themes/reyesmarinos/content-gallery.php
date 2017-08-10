<?php
/**************************************************************************************/
/* Template for the gallery post format */
/**************************************************************************************/
?>

<div class="row">
  <div class="col-md-7">
    <?php
      $values = get_post_custom(get_the_id());
      $slides = isset($values['mb_slides']) ? $values['mb_slides'][0] : '';
    ?>
    <?php if (!empty($slides)) : ?>
      <?php $slides = unserialize($slides); ?>
      <?php if (count($slides)) : ?>
        <?php $i = 0; ?>
        <section id="carousel-events" class="carousel slide Carousel Carousel--eventos" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <?php foreach ($slides as $slide) : ?>
              <div class="item<?php echo ($i === 0) ? ' active' : ''; ?>">
                <picture>
                  <!-- <source class="img-responsive center-block" media="(max-width: 767px) and (orientation: portrait)" srcset="./images/slide-home-responsive.jpg" alt="" /> -->
                  <img class="img-responsive center-block" src="<?php echo $slide; ?>" alt="<?php echo get_the_title(); ?>" />
                </picture>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
          </div>

          <?php if (count($slides) > 1) : ?>
            <a class="left carousel-control" href="#carousel-events" role="button" data-slide="prev">
              <i class="icon-keyboard_arrow_left"></i>
            </a>
            <a class="right carousel-control" href="#carousel-events" role="button" data-slide="next">
              <i class="icon-keyboard_arrow_right"></i>
            </a>
          <?php endif; ?>
        </section>
      <?php endif; ?>
    <?php endif; ?>
  </div>
  <div class="col-md-5">
    <h2 class="Page-title text-yellow"><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </div>
</div>

<?php
  $category = get_the_category();
  $categoryName = $category[0]->name;
?>

<?php
  if (file_exists(TEMPLATEPATH . '/partials/navigation-events.php')) {
    include TEMPLATEPATH . '/partials/navigation-events.php';
  }
?>
