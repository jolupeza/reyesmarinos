<?php
/**************************************************************************************/
/* Template for the default post format */
/**************************************************************************************/
?>

<h2 class="Page-title text-yellow"><?php the_title(); ?></h2>
<?php the_content(); ?>

<figure class="Page-figure">
  <img src="<?php echo IMAGES; ?>/bg-bottle.png" class="img-responsive center-block">
</figure>

<p class="text-center"><a href="<?php echo home_url('eventos'); ?>" class="Button Button--border Button--borderWhite">VER todos los EVENTOS</a></p>
