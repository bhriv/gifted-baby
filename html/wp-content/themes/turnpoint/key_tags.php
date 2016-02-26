<div class="tax-holder">
  <span id="tag_title">tags:</span>
  <ul class="nav nav-pills">
  <?php 
    $the_category = get_the_terms( $post->ID, 'tag');
     if ( !empty( $the_category ) && !is_wp_error( $the_category ) ){
         foreach ( $the_category as $term ) {
         echo '<li class="tax-color tax-'.$term->name.'">'.$term->name.'</li>';
         }
     }
  ?>
  </ul>
</div>