<?php
  $order = get_sub_field('order');
  $heading = get_sub_field('heading');
  $sponsorQueryArgs = array(
    'post_type' => 'sponsor',
    'order' => 'ASC',
    'orderby' => $order,
    'meta_query' => array(
      array(
        'key' => 'active',
        'compare' => '=',
        'value' => '1'
      )
    )
  );
  $sponsorQuery = new WP_Query($sponsorQueryArgs);
  if($sponsorQuery->have_posts()):
    exmod_wrap('start', 'module-sponsors');
    echo '<h2 class="sponsors-heading">' . $heading . '</h2>';
    echo '<ul class="sponsors-wrap">';
    while($sponsorQuery->have_posts()): $sponsorQuery->the_post();
?>
  <li class="sponsor-single"><?php the_post_thumbnail('medium'); ?></li>
<?php
    endwhile;
    echo '</ul>';
    exmod_wrap('end');
  endif; wp_reset_query();
?>
