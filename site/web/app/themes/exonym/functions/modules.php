<?php
/*
================================
  [[[ Custom Display Modules ]]]
================================
*/

// Donate Links
function exmod_donate($type) {
  $accepted = array('donate', '52_club_annual', '52_club_lifetime');
  $links = get_field('donation_links', 'options');
  $output = 'Invalid argument. Use *donate*, *52_club_annual*, or *52_club_lifetime*';
  if(in_array($type, $accepted)) {
    $output = $links[$type];
  }
  return $output;
}

function exmod_bg() {
  $bg = get_sub_field('background');
  $image = $bg['image']['sizes']['jumbo'];
  $opacity = ($bg['opacity']) / 100;
  $pos = $bg['position'];
  $color = get_sub_field('color');
  if($color == 'purple') {
    $image = asset_path('images/bg-purple.jpg');
  }
  $output = '<div class="module-bg" style="background-image: url(' . $image . '); opacity: ' . $opacity . '; background-position: ' . $pos['x'] . ' ' . $pos['y'] . ';"></div>';
  if($image) {
    return $output;
  }
}

// Module Wrappers
function exmod_wrap($position, $class = null, $name = null, $print = true) {
  $output = 'Invalid argument. Use *start* or *end*';
  if(get_sub_field('module_name')) { $name = str_replace(' ', '-', strtolower(get_sub_field('module_name'))); }
  $color = get_sub_field('color');
  $parallax = get_sub_field('background')['parallax'];
  if($parallax) { $parallax = ' animate-parallax animate-z-normal'; }
  if($color == 'purple') { $parallax = ' animate-parallax animate-z-subtle'; }
  if($position == 'start') {
    $output = '<section id="' . $name . '" class="module animate-on-enter ' . $class . ' module-color-' . $color . $parallax . '">' . exmod_bg() . '<div class="wrap">';
  } elseif($position == 'end') {
    $output = exmod_cta() . '</div></section>';
  }
  if($print) {
    echo $output;
  } else {
    return $output;
  }
}

// Hero Function (too big for here)
get_template_part('modules/hero');

// Call to Action
function exmod_cta() {
  $global = get_sub_field('global_ctas');
  $type = $global['type'];
  $wrapStart = '<nav class="module-cta-wrap"><ul>';
  $wrapEnd = '</ul></nav>';
  $data = '';
  if(!empty($type)) {
    if(in_array('donate', $type)) {
      $data .= '<li><a href="' . exmod_donate('donate') . '">' . $global['donation_text'] . '</a></li>';
    } if(in_array('52club-annual', $type)) {
      $data .= '<li><a href="' . exmod_donate('52_club_annual') . '">' . $global['52_club_annual_text'] . '</a></li>';
    } if(in_array('52club-lifetime', $type)) {
      $data .= '<li><a href="' . exmod_donate('52_club_lifetime') . '">' . $global['52_club_lifetime_text'] . '</a></li>';
    }
  }
  if(have_rows('calls_to_action')) { while(have_rows('calls_to_action')) {
    the_row();
    $link = get_sub_field('link');
    $data .= '<li><a href="' . $link['url'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a></li>';
  }}
  $output = $wrapStart . $data . $wrapEnd;
  if($data) {
    return $output;
  }
}

// Events Module
function exmod_events() {
  $settings = get_sub_field('events');
  $date_now = date('Y-m-d');
  $eventsArgsOptional = array(
    'meta_query' => array(
  		array(
          'key' => 'event_date',
          'compare' => '>=',
          'value' => $date_now,
          'type' => 'DATETIME',
  	    ),
      ),
  );
  if($settings['archives']) {
    $eventsArgsOptional = array();
  }
  $eventsArgsGlobal = array(
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'meta_type' => 'DATETIME',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'posts_per_page' => $settings['count'],
  );
  $eventsArgs = wp_parse_args($eventsArgsOptional, $eventsArgsGlobal);
  $eventsQuery = new WP_Query($eventsArgs);
  if($eventsQuery->have_posts()):
    exmod_wrap('start');
      echo '<ul class="events-wrap">';
        while($eventsQuery->have_posts()): $eventsQuery->the_post();
          get_template_part('modules/event');
        endwhile;
      echo '</ul>';
    exmod_wrap('end');
  endif;
  wp_reset_query();
}

// Content Blocks Master Function
function exmod_blocks() {
  if(have_rows('content_blocks')) {
    while(have_rows('content_blocks')) {
      the_row();
      if(get_row_layout() == 'documents') {
        get_template_part('modules/documents');
      } elseif(get_row_layout() == 'events') {
        exmod_events();
      } elseif(get_row_layout() == 'rich_content') {
        get_template_part('modules/richcontent');
      } elseif(get_row_layout() == 'sponsors') {
        get_template_part('modules/sponsors');
      } elseif(get_row_layout() == 'staff') {
        get_template_part('modules/staff');
      } elseif(get_row_layout() == 'sub_sections') {
        echo 'SUB SECTIONS';
      }
    }
  }
  /*
  documents
    files
      file
  rich_content
    layout
      single : One-column
      double : Two-column
    heading
      text
      size
        s : Small
        m : Medium
        l : Large
      alignment
        left : Left
        center : Center
        right : Right
    content
  sponsors
    order
      alpha : Alphabetical
      menu : Menu Order
      custom : Custom
    sponsor_order
  staff
    display
      large
      small
    type
  sub_sections
    display
      orientation
        Horizontal
        Vertical
      details
        Image
        Icon
        Name
        Button
        Description
    sections
      link
      images
        icon
        image
      description
  */
}
