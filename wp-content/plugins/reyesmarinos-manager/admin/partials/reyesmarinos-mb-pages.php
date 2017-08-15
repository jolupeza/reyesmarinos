<?php
/**
 * Displays the user interface for the Reyes Marinos Manager meta box by type content Pages.
 *
 * This is a partial template that is included by the Reyes Marinos Manager
 * Admin class that is used to display all of the information that is related
 * to the page meta data for the given page.
 */
?>
<div id="mb-pages-id">
    <?php
        $values = get_post_custom(get_the_ID());
        
        $slides = isset($values['mb_slides']) ? $values['mb_slides'][0] : '';
        $background = isset( $values['mb_background'] ) ? esc_attr($values['mb_background'][0]) : '';
        $responsive = isset( $values['mb_responsive'] ) ? esc_attr($values['mb_responsive'][0]) : '';
        
        wp_nonce_field('pages_meta_box_nonce', 'meta_box_nonce');
        
        $totalSlides = 6;
        $count = 0;
    ?>
    
    
    <!--Gallery-->
    <fieldset class="GroupForm">
        <legend class="GroupForm-legend">Galeria</legend>
        
        <section class="GroupForm-flex GroupForm-flex--center GroupForm-flex--wrap">
            <?php if (!empty($slides)) : ?>
                <?php
                    $slides = unserialize($slides);
                    
                    $count = count($slides);
                    $i = 0;
                ?>
                <?php foreach ($slides as $slide) : ?>
                    <div class="container-upload-file GroupForm-wrapperImage GroupForm-wrapperImage--33">
                        <p class="btn-add-file">
                            <a title="Agregar imagen" href="javascript:;" class="set-file button button-primary">Añadir Imagen</a>
                        </p>

                        <div class="hidden media-container">
                            <img src="<?php echo $slide; ?>" alt="<?php //echo get_post_meta( $post->ID, 'slider-1-alt', true );  ?>" title="<?php //echo get_post_meta( $post->ID, 'slider-1-title', true );  ?>" />
                        </div><!-- .media-container -->

                        <p class="hidden">
                            <a title="Quitar imagen" href="javascript:;" class="remove-file button button-secondary">Quitar Imagen</a>
                        </p>

                        <p class="media-info">
                            <input class="hd-src" type="hidden" name="mb_slides[]" value="<?php echo $slide; ?>" />
                        </p><!-- .media-info -->
                    </div><!-- end container-upload-file -->
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
                    
            <?php if ($count < $totalSlides) : ?>
                <?php for ($i = 0; $i < ($totalSlides - $count); $i++) : ?>
                    <div class="container-upload-file GroupForm-wrapperImage GroupForm-wrapperImage--33">
                        <p class="btn-add-file">
                            <a title="Agregar imagen" href="javascript:;" class="set-file button button-primary">Añadir Imagen</a>
                        </p>

                        <div class="hidden media-container">
                            <img src="" alt="<?php //echo get_post_meta( $post->ID, 'slider-1-alt', true );  ?>" title="<?php //echo get_post_meta( $post->ID, 'slider-1-title', true );  ?>" />
                        </div><!-- .media-container -->

                        <p class="hidden">
                            <a title="Quitar imagen" href="javascript:;" class="remove-file button button-secondary">Quitar Imagen</a>
                        </p>

                        <p class="media-info">
                            <input class="hd-src" type="hidden" name="mb_slides[]" value="" />
                        </p><!-- .media-info -->
                    </div><!-- end container-upload-file -->
                <?php endfor; ?>
            <?php endif; ?>
        </section>
    </fieldset>
    
    <fieldset class="GroupForm">
        <legend class="GroupForm-legend">Imagen de Fondo</legend>

        <section class="GroupForm-flex GroupForm-flex--center">
            <div class="container-upload-file GroupForm-wrapperImage">
                <p class="btn-add-file">
                    <a title="Agregar imagen" href="javascript:;" class="set-file button button-primary">Añadir Imagen</a>
                </p>

                <div class="hidden media-container">
                    <img src="<?php echo $background; ?>" alt="<?php //echo get_post_meta( $post->ID, 'slider-1-alt', true );  ?>" title="<?php //echo get_post_meta( $post->ID, 'slider-1-title', true );  ?>" />
                </div><!-- .media-container -->

                <p class="hidden">
                    <a title="Quitar imagen" href="javascript:;" class="remove-file button button-secondary">Quitar Imagen</a>
                </p>

                <p class="media-info">
                    <input class="hd-src" type="hidden" name="mb_background" value="<?php echo $background; ?>" />
                </p><!-- .media-info -->
            </div><!-- end container-upload-file -->
        </section>
    </fieldset>
    
    <fieldset class="GroupForm">
        <legend class="GroupForm-legend">Imagen de Fondo Responsive</legend>

        <section class="GroupForm-flex GroupForm-flex--center">
            <div class="container-upload-file GroupForm-wrapperImage">
                <p class="btn-add-file">
                    <a title="Agregar imagen" href="javascript:;" class="set-file button button-primary">Añadir Imagen</a>
                </p>

                <div class="hidden media-container">
                    <img src="<?php echo $responsive; ?>" alt="<?php //echo get_post_meta( $post->ID, 'slider-1-alt', true );  ?>" title="<?php //echo get_post_meta( $post->ID, 'slider-1-title', true );  ?>" />
                </div><!-- .media-container -->

                <p class="hidden">
                    <a title="Quitar imagen" href="javascript:;" class="remove-file button button-secondary">Quitar Imagen</a>
                </p>

                <p class="media-info">
                    <input class="hd-src" type="hidden" name="mb_responsive" value="<?php echo $responsive; ?>" />
                </p><!-- .media-info -->
            </div><!-- end container-upload-file -->
        </section>
    </fieldset>
</div><!-- #single-post-meta-manager -->