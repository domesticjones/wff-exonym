<?php
  get_header();
  exmod_hero('Photos', 'Programs');
  if(have_posts()):
    exmod_wrap('start', 'module-programs', 'programs');
      echo '<ul class="programs-wrap">';
        while(have_posts()): the_post();
          echo '<li class="program-single">';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<p class="program-description">' . get_field('description') . '</p>';
            get_template_part('modules/resource', 'media');
          echo '</li>';
        endwhile;
      echo '</ul>';
    exmod_wrap('end');
  endif;
  get_footer();
?>
