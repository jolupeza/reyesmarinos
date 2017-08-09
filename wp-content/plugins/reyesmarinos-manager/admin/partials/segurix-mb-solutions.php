<?php
/**
 * Displays the user interface for the Segurix Manager meta box by type content Solutions.
 *
 * This is a partial template that is included by the Segurix Manager
 * Admin class that is used to display all of the information that is related
 * to the page meta data for the given page.
 */
?>
<div id="mb-solutions-id">

    <?php
        $values = get_post_custom( get_the_ID() );
        $title = isset($values['mb_title']) ? esc_attr($values['mb_title'][0]) : '';
        $about = isset($values['mb_about']) ? esc_attr($values['mb_about'][0]) : '';
        $benefit = isset($values['mb_benefit']) ? esc_attr($values['mb_benefit'][0]) : '';
        $howwork = isset($values['mb_howwork']) ? esc_attr($values['mb_howwork'][0]) : '';
        $parallax = isset($values['mb_parallax']) ? esc_attr($values['mb_parallax'][0]) : '';
        $responsive = isset( $values['mb_responsive'] ) ? esc_attr($values['mb_responsive'][0]) : '';

        wp_nonce_field( 'solutions_meta_box_nonce', 'meta_box_nonce' );
    ?>
    
    <!-- Title -->
    <p class="content-mb">
        <label for="mb_title">Título: </label>
        <input type="text" name="mb_title" id="mb_title" value="<?php echo $title; ?>" />
    </p>
    
    <!-- About -->
    <p class="content-mb">
        <label for="mb_about">Sobre la solución: </label>
        <input type="checkbox" id="mb_about" name="mb_about" <?php checked( $about, 'on' ); ?> />
    </p>
    
    <!-- Benefit -->
    <p class="content-mb">
        <label for="mb_benefit">Beneficios: </label>
        <input type="checkbox" id="mb_benefit" name="mb_benefit" <?php checked( $benefit, 'on' ); ?> />
    </p>
    
    <!-- How Word -->
    <p class="content-mb">
        <label for="mb_howwork">¿Cómo trabajamos?: </label>
        <input type="checkbox" id="mb_howwork" name="mb_howwork" <?php checked( $howwork, 'on' ); ?> />
    </p>
    
    <!-- Parallax-->
    <p class="content-mb">
        <label for="mb_parallax">Seleccionar Parallax: </label>
        <select name="mb_parallax" id="mb_parallax">
            <option value="" <?php selected($parallax, ''); ?>>-- Seleccione parallax --</option>

        <?php
            $args = array(
                'post_type' => 'parallaxs',
                'posts_per_page' => -1
            );
            $parallaxs = new WP_Query($args);
            if ($parallaxs->have_posts()) :
                while ($parallaxs->have_posts()) :
                    $parallaxs->the_post();
                    $id = get_the_ID();
        ?>
            <option value="<?php echo $id; ?>" <?php selected($parallax, $id); ?>><?php the_title(); ?></option>
        <?php
                endwhile;
            endif;
            wp_reset_postdata();
        ?>

        </select>
    </p>
    
    <fieldset class="GroupForm">
        <legend class="GroupForm-legend">Imagen Responsive</legend>

        <section class="GroupForm-flex GroupForm-flex--center">
            <div class="container-upload-file GroupForm-wrapperImage">
                <!--<h4 class="Fieldset-subtitle">Enlace PDF</h4>-->

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
</div><!-- #mb-locals-id -->