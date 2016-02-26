<?php
  // Find all reviews of the current Post
  $args = array(
      'post_type' => 'review',
      'post_status' => array('publish'),
      'posts_per_page' => -1,
      'meta_query' => array(
         array(
              'key' => 'review_studio_id',
              'value' => get_the_ID(),
              'compare' => '='
           )
      ),
      'order' => 'DESC'
   );
  $review_posts = new WP_Query($args);
  $review_count = 0;  
?>
<?php if($review_posts->have_posts()) : ?>
    <?php while($review_posts->have_posts()) : $review_posts->the_post() ?>
      <?php include( 'review-content.php' ) ;?>
  <?php endwhile ?>
<?php endif; wp_reset_query(); ?>