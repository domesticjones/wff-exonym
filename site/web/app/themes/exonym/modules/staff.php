<?php
  $cat = get_sub_field('type');
  $heading = get_sub_field('heading');
  $display = get_sub_field('display');
  $staffQueryArgs = array(
    'post_type' => 'staff',
    'posts_per_page' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => 'staff_types',
        'field' => 'term_id',
        'terms' => $cat,
      ),
    ),
  );
  $staffQuery = new WP_Query($staffQueryArgs);
  if($staffQuery->have_posts()):
    exmod_wrap('start', 'module-rich-content');
    if($heading) { echo '<h2 class="staff-heading">' . $heading . '</h2>'; }
    echo '<ul class="staff-wrap staff-display-' . $display . '">';
      while($staffQuery->have_posts()): $staffQuery->the_post();
      $bio = get_field('bio');
?>
<li class="staff-single">
  <?php the_post_thumbnail('thumbnail-medium', array('class' => 'staff-photo')); ?>
  <div class="staff-data">
    <h3><?php the_title(); ?></h3>
    <h4><?php the_field('position'); ?></h4>
    <?php if(!empty($bio)): ?>
      <a href="#more" class="staff-more">Read Bio</a>
      <div class="staff-bio">
        <?php echo $bio; ?>
          <a href="#more" class="staff-more">Close <?php the_title(); ?>'s Bio</a>
      </div>
    <?php endif; ?>
  </div>
</li>
<?php
      endwhile;
    echo '</ul>';
    exmod_wrap('end');
  endif; wp_reset_query();
?>
