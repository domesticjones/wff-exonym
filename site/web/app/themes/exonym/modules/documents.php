<?php
    exmod_wrap('start', 'module-documents');
      if(have_rows('files')):
        echo '<ul class="docs-wrap">';
        while(have_rows('files')): the_row();
          $file = get_sub_field('file');
          echo '<li class="doc-single"><a href="' . $file['url'] . '">' . $file['title'] . '<span>(' . $file['subtype'] . ' document)</span></a></li>';
        endwhile;
      echo '</ul>';
    endif;
    exmod_wrap('end');
?>
