<?php
  get_header();
  exmod_hero('Photos', 'The Fallen', array(wp_get_attachment_image_src(320, 'jumbo')[0]));
  if(have_posts()):
    echo '<ul class="fallen-wrap">';
    while(have_posts()): the_post();
      $date = get_field('date', false, false);
      $date = new DateTime($date);
?>
<li class="fallen-single is-active">
  <div class="fallen-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>);"><span>Photo of <?php the_title(); ?></span></div>
  <div class="fallen-data">
    <h2><?php the_title(); ?></h2>
    <p><?php echo $date->format('F j, Y') . ' - ' . get_field('location'); ?></p>
  </div>
</li>
<?php
    endwhile;
    echo '<li class="fallen-submit is-active">';
    echo '<div class="fallen-image" style="background-image: url(' . wp_get_attachment_image_src(200, 'medium')[0] . ');"><span>Photo of <?php the_title(); ?></span></div>';
    echo '<div class="fallen-data"><p>If you notice anyone missing from this list, please contact us.</p>';
    ex_contact('email', 'global');
    echo '</div></li>';
    echo '</ul>';
  endif;
  get_footer();
?>
