<?php
/*
==============================
  [[[ Define all the Menus ]]]
==============================
*/

// Enable menus in WP
add_theme_support('menus');

// Define the nav bars
register_nav_menus(
  array(
    'footer-menu' => __('Footer', 'exonym'),
    'responsive-menu' => __('Responsinve', 'exonym')
  )
);
