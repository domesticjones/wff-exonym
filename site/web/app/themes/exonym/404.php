<?php
  get_header();
  exmod_hero('Photos', 'Not Found');
  exmod_wrap('start');
?>
<div class="error-404 richcontent-data richcontent-layout-single">
  <div class="column">
    <p>We could not find the page you were looking for:</p>
    <p><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?></p>
    <p>The page has been moved or doesn't exist.</p>
  </div>
</div>
<?php
  exmod_wrap('end');
  get_footer();
?>
