<?php
/**
 * Displays the user interface for the Segurix Manager meta box by type content Testimonials.
 *
 * This is a partial template that is included by the Segurix Manager
 * Admin class that is used to display all of the information that is related
 * to the page meta data for the given page.
 */
?>
<div id="mb-testimonials-id">

    <?php
        $values = get_post_custom( get_the_ID() );
        $job = isset($values['mb_job']) ? esc_attr($values['mb_job'][0]) : '';
        $place = isset($values['mb_place']) ? esc_attr($values['mb_place'][0]) : '';

        wp_nonce_field('testimonials_meta_box_nonce', 'meta_box_nonce');
    ?>
    
    <!--Job-->
    <p class="content-mb">
        <label for="mb_job">Puesto: </label>
        <input type="text" name="mb_job" id="mb_job" value="<?php echo $job; ?>" />
    </p>
    
    <!--Place-->
    <p class="content-mb">
        <label for="mb_place">Lugar: </label>
        <input type="text" name="mb_place" id="mb_place" value="<?php echo $place; ?>" />
    </p>
</div><!-- #single-post-meta-manager -->