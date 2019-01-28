<?php
  get_header();
  if(have_posts()): while(have_posts()): the_post();
  exmod_hero(
    'Photos',
    '</span><span class="hero-text-line hero-text-size-m">' . get_the_title() . '</span><span class="hero-text-line hero-author">by: ' . get_the_author_meta('display_name') . ' &bull; ' . get_the_date() . '</span>',
    array(wp_get_attachment_image_src(get_post_thumbnail_id(), 'jumbo')[0])
  );
?>
<section id="article" class="module animate-on-enter module-color-white module-rich-content is-visible">
  <div class="wrap">
  <div class="richcontent-data richcontent-layout-single">
      <?php
        the_post_thumbnail('large', array('class' => 'align-center blog-image-heading'));
        the_content();
      ?>
    </div>
  </div>
</section>
<section id="author" class="module animate-on-enter module-color-grey module-rich-content is-visible">
  <div class="wrap">
    <div class="richcontent-data richcontent-layout-single">
      <div class="author-image">
        <?php
          $bioImg = get_field('photo', 'user_' . get_the_author_meta('ID'));
          if($bioImg) {
            echo '<img src="' . $bioImg['sizes']['thumbnail-medium'] . '" />';
          }
        ?>
      </div>
      <div class="author-bio">
        <h3 class="blog-author-title">About the Author<span><?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name'); ?></span></h3>
        <?php the_field('writers_bio', 'user_' . get_the_author_meta('ID')); ?>
      </div>
    </div>
  </div>
</section>
<?php
  endwhile; endif;
  get_footer();
?>
