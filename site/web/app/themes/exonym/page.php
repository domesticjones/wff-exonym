<?php
  /* ============
     DEFAULT PAGE
     ============ */
  get_header();
  if(have_posts()): while(have_posts()): the_post();
    exmod_hero(get_field('hero_image'));
    exmod_blocks();
  endwhile; endif;
  get_footer();
?>
