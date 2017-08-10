<?php
  $prevPost = get_previous_post(true);
  $nextPost = get_next_post(true);
?>
<div class="Page-marginTop">
  <p class="text-center">
    <?php if (is_object($prevPost)) : ?>
      <a href="<?php echo get_permalink($prevPost); ?>" class="Nav"><i class="Nav-left"></i></a>
    <?php endif; ?>
    <a href="<?php echo home_url('eventos'); ?>" class="Button Button--border Button--borderWhite">VER todos los <?php echo strtoupper($categoryName); ?></a>
    <?php if (is_object($nextPost)) : ?>
      <a href="<?php echo get_permalink($nextPost); ?>" class="Nav"><i class="Nav-right"></i></a>
    <?php endif; ?>
  </p>
</div>
