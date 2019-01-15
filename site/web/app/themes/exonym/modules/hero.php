<?php
function exmod_hero($style = 'None', $text = null, $media = null) {
  if($style != 'None'):
    $option = get_field('hero_options');
    if(empty($option)) {
      $noDefault = false;
      $height = 'm';
      $dim = true;
    } else {
      $noDefault = $option['no_default'];
      $height = $option['height'];
      $dim = $option['dim_media'];
    }
?>
<header class="module-hero animate-parallax animate-z-subtle <?php echo 'hero-height-' . $height; ?>">
  <div class="module-bg<?php if($dim) { echo ' module-bg-dim'; } ?>">
    <?php
      if($style == 'Photos') {
        $picMedia = $media;
        if($media == null) { $picMedia = get_field('default_hero_image', 'options'); }
        $picCustom = get_field('hero_images');
        if(!empty($picCustom) || $noDefault) { $picMedia = $picCustom; }
        if($picMedia) {
        ?>
          <ul class="hero-photos">
            <?php foreach($picMedia as $img): ?>
              <li><div class="hero-image" style="background-image: url(<?php echo $img['sizes']['jumbo']; ?>)"></div></li>
            <?php endforeach; ?>
          </ul>
        <?php
        }
      } elseif($style == 'Video') {
        $vidMedia = $media;
        if($media == null) { $vidMedia = get_field('default_hero_video', 'options'); }
        $vidMedia = get_field('default_hero_video', 'options');
        $vidCustom = get_field('hero_video');
        if(!empty($vidCustom) || $noDefault) { $vidMedia = $vidCustom; }
        if($vidMedia) {
        ?>
          <video class="hero-video ignore-ratio" autoplay loop muted>
            <source src="<?php echo $vidMedia['url']; ?>" type="<?php echo $vidMedia['mime_type']; ?>"></source>
          </video>
        <?php
        }
      }
    ?>
  </div>
  <?php if(have_rows('hero_text') && $text == null): ?>
    <h1 class="hero-text">
      <?php while(have_rows('hero_text')): the_row(); ?>
        <span class="hero-text-line <?php echo 'hero-text-size-' . get_sub_field('size'); ?>"><?php the_sub_field('text'); ?></span>
      <?php endwhile; ?>
    </h1>
  <?php
    endif;
    if(!empty($text)):
  ?>
    <h1 class="hero-text">
      <span class="hero-text-line hero-text-size-l"><?php echo $text; ?></span>
    </h1>
  <?php
    endif;
  ?>
  <p>Need the CTA to Go In Here Still!!!</p>
</header>
<?php
  endif;
}
?>
