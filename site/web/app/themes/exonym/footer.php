<?php
  /* ==============
     DEFAULT FOOTER
     ============== */
?>
    <footer class="module animate-on-enter animate-parallax animate-z-subtle footer-signup module-color-purple">
      <div class="module-bg" style="background-image: url(<?php echo asset_path('images/bg-purple.jpg'); ?>); opacity: 1; background-position: center center;"></div>
      <div class="wrap">
        Constant Contact
      </div>
    </footer>
    <footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
      <div class="wrap">
        <div class="column">
          <img src="<?php ex_logo(); ?>" alt="Logo for <?php ex_brand(); ?>" class="logo-footer" />
          <p class="nav-address"><?php ex_contact('address'); ?></p>
          <p class="copyright">&copy; Copyright <?php echo date('Y') . ' '; ex_brand('legal'); ?></p>
        </div>
        <div class="column">
          <nav class="nav-footer" role="navigation">
            <?php wp_nav_menu(array(
              'container' => 'ul',                    // enter '' to remove nav container
              'container_class' => 'footer-links cf',	// class of container (should you choose to use it)
              'menu' => __('Footer', 'exonym'),	      // nav name
              'menu_class' => 'nav footer-nav cf',    // adding custom nav class
              'theme_location' => 'footer-menu',		  // where it's located in the theme
              'before' => '',							            // before the menu
              'after' => '',							            // after the menu
              'link_before' => '',					          // before each link
              'link_after' => '',						          // after each link
              'depth' => 1,							              // limit the depth of the nav
              'fallback_cb' => ''						          // fallback function
            )); ?>
          </nav>
        </div>
        <div class="column">
          <?php
            ex_contact('phone', true, 'global');
            ex_contact('email', true, 'global');
            ex_social();
          ?>
        </div>
        <div class="column">
          <a href="<?php echo exmod_donate('donate'); ?>" class="button footer-donate"><span>Donate</span></a>
        </div>
        </nav>
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
