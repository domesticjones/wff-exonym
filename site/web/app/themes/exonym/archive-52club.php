<?php

  get_header();
  exmod_hero('Video', '52 Club');
  exmod_wrap('start', '', 'Notification', 'purple');
    $notification = get_field('52_club_notification', 'options');
    echo $notification;
  exmod_wrap('end');

  exmod_wrap('start');
?>
<div class="richcontent-data richcontent-layout-double">
  <div class="column">
    <?php the_field('52_club_description', 'options'); ?>
  </div>
<?php
    if(have_rows('52_club_testimonials', 'options')):
      echo '<ul class="testimonials-wrap column">';
        while(have_rows('52_club_testimonials', 'options')): the_row();
          $author = get_sub_field('author');
?>
<li class="testimonial">
  <blockquote><?php the_sub_field('testimonial'); ?></blockquote>
  <span class="testimonial-data">
    <strong><?php echo $author['name']; ?></strong>
    <em><?php echo $author['designation']; ?></em>
  </span>
</li>
<?php
        endwhile;
      echo '</ul>';
    endif;
?>
</div>
<?php
  exmod_wrap('end');
  exmod_wrap('start', '', 'Information', 'grey');
?>
<div class="richcontent-data richcontent-layout-single">
  <?php the_field('52_club_sub_description', 'options'); ?>
</div>
<?php
echo exmod_cta(array('52club-annual', '52club-lifetime'), array('52_club_annual_text' => 'Annual 52 Club Membership', '52_club_lifetime_text' => 'Lifetime 52 Club Membership'));
  exmod_wrap('end');
  if(have_posts()):
    exmod_wrap('start', '', 'Members', 'black');
      $years = array();
        while(have_posts()): the_post();
          $year = get_field('year');
          array_push($years, $year);
        endwhile;
      echo '<ul class="club-years">';
      echo '<form id="club-search" method="GET"><input type="search" placeholder="Type here to search"></form>';
      echo '<li id="club-lifetime" class="club-year is-active">Lifetime</li>';
      $yearUnique = array_unique($years);
      foreach($yearUnique as $yearSingle) {
        echo '<li id="club-' . $yearSingle . '" class="club-year">' . $yearSingle . '</li>';
      }
      echo '</ul>';
      $lifetime = get_field('lifetime_members', 'options');
      $lifetimeSort = array();
      foreach($lifetime as $i => $row) { $lifetimeSort[$i] = $row['number']; }
      array_multisort($lifetimeSort, SORT_DESC, $lifetime);

?>
<div data-year="club-lifetime" class="club-data club-data-lifetime is-active">
  <?php
    foreach($lifetime as $i => $row):
      $membershipCount = $row['number'];
      $count = substr_count($row['members'], '<br />') + 1;
      if($membershipCount > 1) {
        $membership = $row['number'] . ' Lifetime Memberships';
      } else {
        $membership = ' Lifetime Members';
      }
  ?>
    <h2><?php echo $membership . ' <span>(' . $count . ' listed)</span>'; ?></h2>
    <p><?php echo $row['members']; ?></p>
  <?php endforeach; ?>
  <a href="#members">Return to Top</a>
</div>
<?php
      while(have_posts()): the_post();
        $year = get_field('year');
        $type = get_field('type');
        $list = get_field('list');
        $count = substr_count($list, '<br />') + 1;
?>
<div data-year="club-<?php echo $year; ?>" class="club-data">
  <h2><?php echo $year . ' ' . $type . ' Members'; ?> <span>(<?php echo $count; ?> listed)</span></h2>
  <p><?php echo $list; ?></p>
  <a href="#members">Return to Top</a>
</div>
<?php
      endwhile;
    exmod_wrap('end');
  endif;

  get_footer();
?>
