<?php
  $layout = get_sub_field('layout');
  exmod_wrap('start', 'module-rich-content');
  if(have_rows('heading')):
?>
  <h2 class="heading-text">
    <?php while(have_rows('heading')): the_row(); ?>
      <span class="heading-text-line <?php echo 'heading-text-size-' . get_sub_field('size') . ' heading-text-align-' . get_sub_field('alignment'); ?>"><?php the_sub_field('text'); ?></span>
    <?php endwhile; ?>
  </h2>
<?php endif; ?>
<div class="richcontent-data <?php echo 'richcontent-layout-' . $layout; ?>">
  <?php
    if($layout == 'single') {
      the_sub_field('content');
    } else {
      echo '<div class="column">' . get_sub_field('content') . '</div>';
      if($layout == 'triple') { echo '<div class="column">' . get_sub_field('content_center') . '</div>'; }
      echo '<div class="column">' . get_sub_field('content_right') . '</div>';
    }
  ?>
</div>
<?php exmod_wrap('end'); ?>
