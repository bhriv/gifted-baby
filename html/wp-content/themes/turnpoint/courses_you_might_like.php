<div class="clearfix push"></div>
<h5><i class="fa fa-eye"></i> Courses you might like:</h5>
  <div class="two_cards">
    <?php 
    // default category
    $custom_tax = 3; // technology
    $the_category = get_the_terms( $post->ID, 'category');
     if ( !empty( $the_category ) && !is_wp_error( $the_category ) ){
         foreach ( $the_category as $term ) {
          $custom_tax = $term->term_id;
          //echo $custom_tax;
         }
       }
    ?>
    <?php //include_once('map-loop.php');
    $general_args = array(
        'post_status' => 'publish',
        'post_type' => array('course'),
        'category__in' => $custom_tax,
        'posts_per_page' => 2,
        'order' => 'RAND'
     );
     $general_tax_query = new WP_Query($general_args);
    ?>
    <?php $general_tax_item = 1; if($general_tax_query->have_posts()) : ?>
       <?php while($general_tax_query->have_posts()) : $general_tax_query->the_post() ?>
        <?php get_template_part('card_profile');?>
       <?php $general_tax_item++; endwhile ?>
    <?php endif; wp_reset_query(); ?>
  </div>