<?php  /* Sidebar Latest Articles */
$article_count = 4;
if (is_single('article')) {
  $article_count = 4;
}
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'article',
    'posts_per_page' => $article_count,
    'order' => 'DESC'
 );
 $general_course_query = new WP_Query($general_args);
?>
<?php $general_course_item = 1; if($general_course_query->have_posts()) : ?>
  <h3 class="latest">Latest</h3>
   <?php while($general_course_query->have_posts()) : $general_course_query->the_post() ?>
   <?php if ($general_course_item == 1) : ?>
  <?php  endif ?>
  <?php get_template_part('card_profile');?>
<?php $general_course_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>
