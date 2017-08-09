<?php
  /**
   * Template name: Página Contáctanos
   */
?>

<?php get_header(); ?>

<?php $options = get_option('reyesmarinos_custom_settings'); ?>
<?php
  $lat = isset($options['lat']) ? $options['lat'] : '';
  $long = isset($options['long']) ? $options['long'] : '';
?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php the_post(); ?>

    <?php
      $values = get_post_custom(get_the_id());
      $slides = isset($values['mb_slides']) ? $values['mb_slides'][0] : '';
    ?>

    <section class="Page Page--contactanos">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="Title text-blue text-font-across"><?php echo get_the_excerpt(); ?></h2>
            <div class="text-blue">
              <?php the_content(); ?>
            </div>

            <?php if ($options['display_social_link'] && !is_null($options['display_social_link'])) : ?>
              <?php
                $facebook = isset($options['facebook']) ? esc_attr($options['facebook']) : '';
                $twitter = isset($options['twitter']) ? esc_attr($options['twitter']) : '';
                $instagram = isset($options['instagram']) ? esc_attr($options['instagram']) : '';
              ?>
              <section class="Social">
                <h3><span><strong class="text-uppercase">Síguenos </strong>en</span></h3>

                <ul class="Social-list">
                  <?php if (!empty($facebook)) : ?>
                    <li>
                      <a href="https://www.facebook.com/<?php echo $facebook; ?>" title="Ir a Facebook" target="_blank" rel="noopener noreferrer">
                        <i class="icon-facebook"></i>
                      </a>
                    </li>
                  <?php endif; ?>

                  <?php if (!empty($twitter)) : ?>
                    <li>
                      <a href="https://twitter.com/<?php echo $twitter; ?>" title="Ir a Twitter" target="_blank" rel="noopener noreferrer">
                        <i class="icon-twitter"></i>
                      </a>
                    </li>
                  <?php endif; ?>

                  <?php if (!empty($instagram)) : ?>
                    <li>
                     <a href="https://www.instagram.com/<?php echo $instagram; ?>" title="Ir a Instagram" target="_blank" rel="noopener noreferrer">
                      <i class="icon-instagram"></i>
                    </a>
                    </li>
                  <?php endif; ?>
                </ul>
              </section>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <form action="" class="Form" method="POST" id="js-frm-contact">
              <div class="form-group">
                <label for="contact_name" class="sr-only">Tu nombre completo</label>
                <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Tu nombre completo" autocomplete="off" required />
              </div>
              <div class="form-group">
                <label for="contact_email" class="sr-only">Tu correo</label>
                <input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Tu correo" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label for="contact_message" class="sr-only">Escribe tu mensaje</label>
                <textarea class="form-control" name="contact_message" id="contact_message" placeholder="Escribe tu mensaje" required></textarea>
              </div>

              <p class="text-center" id="js-form-contact-msg"></p>

              <p class="text-right">
                <button type="submit" class="Button Button--submit">enviar <span class="Form-loader rotateIn hidden" id="js-form-contact-loader"><i class="glyphicon glyphicon-refresh"></i></span></button>
              </p>
            </form>
          </div>
        </div>

        <section class="Maps">
          <article class="Maps-carousel">
            <?php if (!empty($slides)) : ?>
              <?php $slides = unserialize($slides); ?>
              <?php if (count($slides)) : ?>
                <?php $i = 0; ?>
                <section id="carousel-maps" class="carousel slide Carousel Carousel--contact" data-ride="carousel">
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
                    <a class="left carousel-control" href="#carousel-maps" role="button" data-slide="prev">
                      <i class="icon-keyboard_arrow_left"></i>
                    </a>
                    <a class="right carousel-control" href="#carousel-maps" role="button" data-slide="next">
                      <i class="icon-keyboard_arrow_right"></i>
                    </a>
                  <?php endif; ?>
                </section>
              <?php endif; ?>
            <?php endif; ?>
          </article>
          <article class="Maps-wrapper">
            <?php if (!empty($lat) && !empty($long)) : ?>
              <figure class="Maps-map" id="map" data-lat="<?php echo $lat; ?>" data-long="<?php echo $long; ?>"></figure>
            <?php endif; ?>
          </article>
        </section>
      </div>
    </section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
