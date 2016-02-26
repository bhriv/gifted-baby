<?php  /* Featured Courses */
$general_args = array(
    'post_status' => array('publish'),
    'post_type' => 'course',
    'posts_per_page' => 3,
    'meta_query' => array(
           array(
              'key' => 'top_course',
              'value' => 'yes',
              'compare' => '='
           )
        ),
    'order' => 'DESC'
 );
 $general_course_query = new WP_Query($general_args);
?>
<?php $general_course_item = 1; if($general_course_query->have_posts()) : ?>
   <?php while($general_course_query->have_posts()) : $general_course_query->the_post() ?>

   <?php if ($general_course_item == 1) : ?>
  <?php  endif ?>
  <?php get_template_part('card_profile');?>
<?php $general_course_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>