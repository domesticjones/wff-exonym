<?php
  $display = get_sub_field('display');
  $show = $display['details'];
  if(have_rows('sections')):
    exmod_wrap('start', 'module-subsections');
?>
<ul class="subsection-wrap subsection-display-<?php echo strtolower($display['orientation']); ?>">
  <?php while(have_rows('sections')): the_row(); $img = get_sub_field('images'); $link = get_sub_field('link'); ?>
    <li class="subsection-single">
      <?php if(in_array('Image', $show) || in_array('Icon', $show)): ?>
        <div class="subsection-head" <?php if(in_array('Image', $show) && !empty($img['image'])) { echo 'style="background-image: url(' . $img['image']['sizes']['medium'] . ')"'; } ?>>
          <?php if(in_array('Icon', $show) && !empty($img['icon'])) { echo '<img src="' . $img['icon']['sizes']['small'] . '" alt="' . $img['icon']['alt'] . '" />'; } ?>
        </div>
      <?php endif; ?>
      <div class="subsection-data">
        <?php if(in_array('Heading', $show)) { echo '<h2>' . get_sub_field('heading') . '</h2>'; } ?>
        <?php if(in_array('Description', $show)) { echo '<div class="subsection-desc">' . get_sub_field('description') . '</div>'; } ?>
        <?php if(in_array('Button', $show) && !empty($link)) { echo '<a href="' . $link['url'] . '" class="button" target="' . $link['target'] . '">' . $link['title'] . '</a>'; } ?>
      </div>
    </li>
  <?php endwhile; ?>
</ul>
<?php
    exmod_wrap('end');
  endif;
?>
