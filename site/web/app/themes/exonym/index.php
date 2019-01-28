<?php
  get_header();
  exmod_hero('Photos', 'One Foot</span><span class="hero-text-line hero-text-size-s">In the Black');
  exmod_wrap('start', '', 'Articles');
  if(have_posts()):
?>
<section class="blog-wrap">
  <?php while(have_posts()): the_post(); ?>
    <article class="blog-single">
      <a href="<?php the_permalink(); ?>" class="blog-single-image" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
        <?php the_post_thumbnail('thumbnail-medium'); ?>
      </a>
      <div class="blog-single-data">
        <h2><?php the_title(); ?></h2>
        <h3><?php echo get_the_date(); ?></h3>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="blog-link button">Read Article</a>
      </div>
    </article>
  <?php endwhile; ?>
</section>
<?php
  endif;
  exmod_wrap('end');
  get_footer();
?>
