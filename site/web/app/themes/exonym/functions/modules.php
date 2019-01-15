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

// Module Wrappers
function exmod_wrap($position, $name = null, $print = true) {
  $output = 'Invalid argument. Use *start* or *end*';
  if(get_sub_field('module_name')) { $name = str_replace(' ', '-', strtolower(get_sub_field('module_name'))); }
  if($position == 'start') {
    $output = '<section id="' . $name . '" class="module"><div class="wrap">';
  } elseif($position == 'end') {
    $output = '</div></section>';
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
  /*
  calls_to_action
    link

  global_ctas
    type
      donate : Donation
      52club-annual : 52 Club (Annual)
      52club-lifetime : 52 Club (Lifetime)
    donation_text
    52_club_annual_text
    52_club_lifetime_text
  */
}

// Module Settings
function exmod_settings() {
  /*
  color
    white : White background, dark text
    grey : Grey background, dark text
    purple : Purple background, light text
    black : Black background, light text
  */
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
        echo 'DOCUMENTS';
      } elseif(get_row_layout() == 'events') {
        exmod_events();
      } elseif(get_row_layout() == 'rich_content') {
        echo 'RICH CONTENT';
      } elseif(get_row_layout() == 'sponsors') {
        echo 'SPONSORS';
      } elseif(get_row_layout() == 'staff') {
        echo 'STAFF';
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
