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

// Hero Image
function exmod_hero() {
  /*
  hero_image

  hero_text
    text
    size

  hero_cta
    exmod_cta()

  hero_options
    height
      s : Small
      m : Medium
      l : Large
    no_images
    dim_photos
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






// Content Blocks Master Function
function exmod_blocks() {
  /*
  documents
    files
      file
  events
    events
      count
      archive
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
  */
}
