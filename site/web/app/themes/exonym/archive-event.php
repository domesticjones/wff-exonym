<?php
  /* ===============
     ARCHIVE: Events
     =============== */
  get_header();
  exmod_hero('Video', 'Events');
  exmod_wrap('start', 'module-events', 'events');
  echo '<ul class="events-wrap">';
  if(have_posts()): while(have_posts()): the_post();
    get_template_part('modules/event');
  endwhile; endif;
  echo '</ul>';
  exmod_wrap('end');
  get_footer();
?>
