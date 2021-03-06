<?php
/**
 * Displays the user interface for the Reyes Marinos Manager meta box by type content Post.
 *
 * This is a partial template that is included by the Reyes Marinos Manager
 * Admin class that is used to display all of the information that is related
 * to the page meta data for the given page.
 */
?>
<div id="mb-post-id">

    <?php
        $values = get_post_custom( get_the_ID() );
        $slides = isset($values['mb_slides']) ? $values['mb_slides'][0] : '';
        $video = isset($values['mb_video']) ? esc_attr($values['mb_video'][0]) : '';

        wp_nonce_field( 'post_meta_box_nonce', 'meta_box_nonce' );
        $totalSlides = 6;
        $count = 0;
    ?>
    
    <!-- Video -->
    <p class="content-mb">
        <label for="mb_video">Id Video Youtube: </label>
        <input type="text" name="mb_video" id="mb_video" value="<?php echo $video; ?>" />
    </p>
    
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
</div><!-- #mb-post-id -->