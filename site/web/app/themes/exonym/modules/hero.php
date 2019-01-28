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
      if($style == 'Photos' || (wp_is_mobile() && $style == 'Video')) {
        $picMedia = $media;
        if($media == null) { $picMedia = get_field('default_hero_images', 'options'); }
        $picCustom = get_field('hero_images');
        if(!empty($picCustom) || $noDefault) { $picMedia = $picCustom; }
        if($picMedia) {
        ?>
          <ul class="hero-photos">
            <?php
              foreach($picMedia as $img):
                if(is_array($img)) {
                  $image = $img['sizes']['jumbo'];
                } else {
                  $image = $img;
                }
            ?>
              <li class="hero-single"><div class="hero-image" style="background-image: url(<?php echo $image; ?>)"></div></li>
            <?php endforeach; ?>
          </ul>
        <?php
        }
      } elseif($style == 'Video' || !wp_is_mobile()) {
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
    $cta = get_field('hero_cta');
    $ctaCustom = $cta['calls_to_action'];
    $global = $cta['global_ctas'];
    $type = $global['type'];
    $wrapStart = '<nav class="module-cta-wrap"><ul>';
    $wrapEnd = '</ul></nav>';
    $data = '';
    if(!empty($type)) {
      if(in_array('donate', $type)) {
        $data .= '<li><a href="' . exmod_donate('donate') . '" class="animate-on-enter animate-on-leave">' . $global['donation_text'] . '</a></li>';
      } if(in_array('52club-annual', $type)) {
        $data .= '<li><a href="' . exmod_donate('52_club_annual') . '" class="animate-on-enter animate-on-leave">' . $global['52_club_annual_text'] . '</a></li>';
      } if(in_array('52club-lifetime', $type)) {
        $data .= '<li><a href="' . exmod_donate('52_club_lifetime') . '" class="animate-on-enter animate-on-leave">' . $global['52_club_lifetime_text'] . '</a></li>';
      }
    }
    if($ctaCustom) { foreach($ctaCustom as $ctaCust) {
      $data .= '<li><a href="' . $ctaCust['link']['url'] . '" target="' . $ctaCust['link']['target'] . '" class="animate-on-enter animate-on-leave">' . $ctaCust['link']['title'] . '</a></li>';
    }}
    if(is_post_type_archive('fallen')) {
      $data = '<li><form id="fallen-search" method="GET"><input type="search" placeholder="Type here to search for a loved one" /></form></li>';
    }
    $output = $wrapStart . $data . $wrapEnd;
    if($data) {
      echo $output;
    }
  ?>
</header>
<?php
  endif;
}
?>
