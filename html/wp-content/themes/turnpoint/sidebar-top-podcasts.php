<?php  /* Sidebar Top Courses */
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'podcast',
    'posts_per_page' => 4,
    'meta_query' => array(
           array(
              'key' => 'top_podcast',
              'value' => 'yes',
              'compare' => '='
           )
        ),
    'order' => 'ASC'
 );
 $general_course_query = new WP_Query($general_args);
?>
<?php $general_course_item = 1; if($general_course_query->have_posts()) : ?>
  <div class="clearfix"></div>
  <h3 class="podcast_title">Trending Podcasts</h3>
   <?php while($general_course_query->have_posts()) : $general_course_query->the_post() ?>

   <?php if ($general_course_item == 1) : ?>
  <?php  endif ?>
  <?php get_template_part('card_profile');?>
<?php $general_course_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>
