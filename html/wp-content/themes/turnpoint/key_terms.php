<span class="tax-holder">
  <ul>
  <?php 
    $the_category = get_the_terms( $post->ID, 'category');
     if ( !empty( $the_category ) && !is_wp_error( $the_category ) ){
         foreach ( $the_category as $term ) {
         echo '<li class="tax-color tax-'.$term->slug.'">'.$term->name.'</li>';
         }
     }
  ?>
  </ul>
</span>