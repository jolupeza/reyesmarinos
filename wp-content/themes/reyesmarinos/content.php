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

<?php
  $category = get_the_category();
  $categoryName = $category[0]->name;
?>

<?php
  if (file_exists(TEMPLATEPATH . '/partials/navigation-events.php')) {
    include TEMPLATEPATH . '/partials/navigation-events.php';
  }
?>
