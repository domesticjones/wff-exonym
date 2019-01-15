<?php

  get_header();

  exmod_wrap('start');
    $notification = get_field('52_club_notification', 'options');
    echo $notification;
  exmod_wrap('end');

  exmod_wrap('start');
    if(have_rows('52_club_testimonials', 'options')):
      while(have_rows('52_club_testimonials', 'options')): the_row();
        $author = get_sub_field('author');
        the_sub_field('testimonial');
        echo $author['name'];
        echo $author['designation'];
      endwhile;
    endif;
  exmod_wrap('end');

  exmod_wrap('start');
    $description = get_field('52_club_description', 'options');
    echo $description;
  exmod_wrap('end');

  if(have_posts()):
    while(have_posts()): the_post();
      exmod_wrap('start');
        $year = get_field('year');
        $type = get_field('type');
        $list = get_field('list');
        $count = substr_count($list, '<br />') + 1;
        echo $year . $type . '(' . $count . ')' . $list;
      exmod_wrap('start');
    endwhile;
  endif;

  get_footer();
?>
