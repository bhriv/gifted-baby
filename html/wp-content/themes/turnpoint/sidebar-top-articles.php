<?php  /* Sidebar Top Articles */
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'article',
    'posts_per_page' => 2,
    'meta_query' => array(
           array(
              'key' => 'top_article',
              'value' => 'yes',
              'compare' => '='
           )
        ),
    'order' => 'ASC'
 );
 $general_course_query = new WP_Query($general_args);
?>
<?php $general_course_item = 1; if($general_course_query->have_posts()) : ?>
  <h3 class="article_title">Our Top Articles</h3>
   <?php while($general_course_query->have_posts()) : $general_course_query->the_post() ?>

   <?php if ($general_course_item == 1) : ?>
  <?php  endif ?>
  <?php get_template_part('card_profile');?>
<?php $general_course_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>
