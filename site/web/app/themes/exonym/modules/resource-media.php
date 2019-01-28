<?php if(have_rows('resources_media') || get_post_type() == 'post'): ?>
  <ul class="resource-media">
    <?php
      while(have_rows('resources_media')): the_row();
      if(get_row_layout() == 'email') {
        $url = 'mailto:' . get_sub_field('address');
        $icon = asset_path('images/icon-mail-white.svg');
        $alt = 'email';
        $label = get_sub_field('name');
        $detail = 'Click to send an email';
      } elseif(get_row_layout() == 'file') {
        $file = get_sub_field('upload');
        $url = $file['url'];
        $icon = asset_path('images/icon-download-white.svg');
        $alt = 'file download';
        $label = $file['title'];
        $detail = 'Download ' . $file['subtype'] . ' file';
      } elseif(get_row_layout() == 'link') {
        $home = get_home_url();
        $link = get_sub_field('url');
        $url = $link['url'];
        $alt = 'website link';
        $label = $link['title'];
        if(strpos($link['url'], $home) !== false) {
          $icon = asset_path('images/icon-arrow-white.svg');
          $detail = 'View Our Page';
        } elseif(strpos($link['url'], 'itunes.apple.com') || strpos($link['url'], 'play.google.com')) {
          $icon = asset_path('images/icon-mobile-white.svg');
          $detail = 'Get the App';
        }else {
          $icon = asset_path('images/icon-globe-white.svg');
          $detail = 'Visit Website';
        }
      } elseif(get_row_layout() == 'phone') {
        $url = 'tel:' . get_sub_field('number');
        $icon = asset_path('images/icon-phone-white.svg');
        $alt = 'phone number';
        $label = get_sub_field('name') . ' (' . get_sub_field('number') . ')';
        $detail = 'Click to make phone call';
      }
    ?>
      <li>
        <a href="<?php echo $url; ?>" class="resource-media-link" target="_blank">
          <img src="<?php echo $icon; ?>" alt="Icon for <?php echo $alt; ?>" />
          <span><?php echo $label; ?><i><?php echo $detail; ?></i></span>
        </a>
      </li>
    <?php endwhile; ?>
    <?php if(get_post_type() == 'post'): ?>
      <li>
        <a href="<?php the_permalink(); ?>" class="resource-media-link" target="_self">
          <img src="<?php echo asset_path('images/icon-arrow-white.svg'); ?>" alt="Icon for a blog article" />
          <span><?php the_title(); ?><i>Read Article</i></span>
        </a>
      </li>
    <?php endif; ?>
  </ul>
<?php endif; ?>
