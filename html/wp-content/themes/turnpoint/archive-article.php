<?php  /* Template Name: Articles Archive */
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'article',
    'posts_per_page' => -1,
    'order' => 'DESC'
 );
 $general_article_query = new WP_Query($general_args);
?>
<?php $general_article_item = 1; if($general_article_query->have_posts()) : ?>
   <?php while($general_article_query->have_posts()) : $general_article_query->the_post() ?>

   <?php if ($general_article_item == 1) : ?>
   <ul class="rslides">
      <li>
         <?php the_post_thumbnail(); ?>
         <span>
            <a href="<?php the_permalink()?>"><h1><?php the_title();?></h1></a>
            <?php the_excerpt() ?>
         </span>
      </li>
   </ul>
   <div class="clearfix push"></div>
  
  <?php else : ?>
   <?php get_template_part('card_profile');?>
 <?php  endif ?>
  
<?php $general_article_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>
<?php get_template_part('courses_you_might_like'); ?>