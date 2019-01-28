<nav id="nav-responsive">
  <?php wp_nav_menu(array(
    'container' => 'ul',                    // enter '' to remove nav container
    'menu' => __('Responsive', 'exonym'),	  // nav name
    'theme_location' => 'responsive-menu',	// where it's located in the theme
    'before' => '',							            // before the menu
    'after' => '',							            // after the menu
    'link_before' => '',					          // before each link
    'link_after' => '',						          // after each link
    'depth' => 0,							              // limit the depth of the nav
    'fallback_cb' => ''						          // fallback function
  )); ?>
  <a href="<?php echo exmod_donate('donate'); ?>" class="button">Donate</a>
</nav>
