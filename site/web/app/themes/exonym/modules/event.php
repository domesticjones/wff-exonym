<?php
  $today = new DateTime();
  $date = new DateTime(get_field('event_date', false));
  $expireRaw = get_field('event_end', false);
  if(empty($expireRaw)) {
    $expireString = date('Y-m-d', strtotime($date->format('Y-m-d') . '+ 2 days'));
    $expire = new DateTime($expireString);
  } else {
    $expire = new DateTime($expireRaw);
  }
  if($today->format('Ymd') > $expire->format('Ymd')) {
    $status = 'archive';
  } else {
    $status = 'upcoming';
  }
  $desc = get_field('description');
  $link = get_field('event_link');
?>
<li class="event-single <?php echo 'event-' . $status; ?>">
  <div class="event-status">
    <?php echo $status; ?> Event
  </div>
  <a href="<?php echo get_the_post_thumbnail_url($post->ID, 'jumbo'); ?>" class="event-flyer">
    <?php the_post_thumbnail('medium'); ?>
  </a>
  <div class="event-data">
    <h2><?php the_title(); ?></h2>
    <h3><?php echo $date->format('F jS, Y'); ?></h3>
    <div class="event-desc">
      <?php if(!empty($desc)) { echo $desc; } ?>
      <?php if(!empty($link)) { echo '<a class="button" href="' . $link['url'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; } ?>
    </div>
  </div>
</li>
