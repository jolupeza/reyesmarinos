<?php
  /**
   * Template name: Página Contáctanos
   */
?>

<?php get_header(); ?>

<?php $options = get_option('reyesmarinos_custom_settings'); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php the_post(); ?>
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
      </div>
    </section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
