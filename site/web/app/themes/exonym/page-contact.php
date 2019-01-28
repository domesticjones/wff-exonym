<?php
  /* =======================
     TEMPLATE NAME: Contact
     ======================= */
  get_header();
  if(have_posts()): while(have_posts()): the_post();
    exmod_hero(get_field('hero_image'));
    exmod_blocks();
    exmod_wrap('start', '', 'Information');
?>
<div class="contact-wrap">
  <div class="contact-data">
    <h2><?php ex_brand('legal'); ?></h2>
    <?php
      ex_social();
      ex_contact('phone');
      ex_contact('email');
    ?>
  </div>
  <div class="contact-form">
    <?php echo do_shortcode('[contact-form-7 id="450" title="Contact form 1"]'); ?>
  </div>
</div>
<iframe class="contact-map ignore-ratio" src="https://www.google.com/maps/d/u/0/embed?mid=1mTCoNeXBymLdlrdClUTzKfWkKUHUiJLx"></iframe>
<?php
  exmod_wrap('end');
  endwhile; endif;
  get_footer();
?>
