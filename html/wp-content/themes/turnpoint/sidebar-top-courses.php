<?php  /* Sidebar Top Courses */
$general_args = array(
    'post_status' => array('publish'),
    'post_type' => 'course',
    'posts_per_page' => 2,
    'meta_query' => array(
           array(
              'key' => 'top_course',
              'value' => 'yes',
              'compare' => '='
           )
        ),
    'order' => 'RAND'
 );
 $general_course_query = new WP_Query($general_args);
?>
<!-- Top courses -->  
<?php $general_course_item = 1; if($general_course_query->have_posts()) : ?>
  <h3 class="course_title">Our Top Courses</h3>
   <?php while($general_course_query->have_posts()) : $general_course_query->the_post() ?>
  <?php get_template_part('card_profile');?>
<?php $general_course_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>
