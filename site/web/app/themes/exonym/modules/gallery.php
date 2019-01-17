<?php
  $images = get_sub_field('images');
  if($images):
    exmod_wrap('start', 'module-gallery');
?>
<ul class="gallery-wrap">
  <?php foreach($images as $image): ?>
    <li class="gallery-single">
      <a href="<?php echo $image['sizes']['large']; ?>">
        <img src="<?php echo $image['sizes']['thumbnail-medium']; ?>" alt="<?php echo $image['alt']; ?>" />
      </a>
    </li>
  <?php endforeach; ?>
</ul>
<?php
    exmod_wrap('end');
  endif;
?>
