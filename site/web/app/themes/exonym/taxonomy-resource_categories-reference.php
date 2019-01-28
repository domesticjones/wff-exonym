<?php
  get_header();
  exmod_hero('Photos', 'Reference');
  exmod_wrap('start', 'module-reference', 'reference');
  echo '<ul class="reference-wrap">';
    $terms = get_term_children(7, 'resource_categories');
    $termsObject = get_terms(array('taxonomy' => 'resource_categories', 'include' => $terms));
    function sortArrayWithObjects($array, $property) {
      usort($array, function ($a, $b) use ($property) {
        return strcmp($a->$property, $b->$property);
      });
      return $array;
    }
    $termsSort = sortArrayWithObjects($termsObject, 'slug');
    foreach($termsSort as $term):
      echo '<li class="reference-single">';
      echo '<h2>' . $term->name . '</h2><div class="reference-data">';
      $referenceArgs = array(
        'post_type' => array('resource', 'post'),
        'orderby' => 'title',
        'order' => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'resource_categories',
            'field' => 'term_id',
            'terms' => $term->term_id,
          ),
        ),
      );
      $referenceQuery = new WP_Query($referenceArgs);
      if($referenceQuery->have_posts()):
        while($referenceQuery->have_posts()):
          $referenceQuery->the_post();
?>
<div class="reference-item">
  <?php if(has_post_thumbnail($post->ID)): ?>
    <div class="reference-image">
      <?php the_post_thumbnail('small'); ?>
    </div>
  <?php endif; ?>
  <div class="reference-content">
    <h3><?php the_title(); ?></h3>
    <?php the_post_thumbnail('small', array('class' => 'reference-image-mobile')); ?>
    <?php
      if(get_post_type() == 'post') {
        $excerpt = wp_strip_all_tags(get_the_excerpt($post->ID));
      } else {
        $excerpt = get_field('description');
      }
    ?>
    <div class="reference-description"><?php echo $excerpt; ?></div>
    <?php get_template_part('modules/resource', 'media'); ?>
  </div>
</div>
<?php
        endwhile;
      endif; wp_reset_query();
      echo '</div></li>';
    endforeach;
  echo '</ul>';
  exmod_wrap('end');
  get_footer();
?>
