<?php  /* Template Name: Archive Podcasts */
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'podcast',
    'posts_per_page' => -1,
    // 'tax_query' => array(
    //         array(
    //           'taxonomy' => 'Sections',
    //           'field' => 'slug',
    //           'terms' => 'general'
    //         )
    //       ),
    'order' => 'DESC'
 );
 $general_article_query = new WP_Query($general_args);
?>
<ul class="rslides">
    <li>
       <?php echo get_the_post_thumbnail( 132, 'full', array( 'class' => 'fill_width' ) ); ?>
    </li>
 </ul>
 <div class="clearfix push"></div>
 <?php 
      $id=132; 
      $post = get_page($id); 
      $content = apply_filters('the_content', $post->post_content); 
      echo $content; 
      wp_reset_query();
  ?>
<?php $general_article_item = 1; if($general_article_query->have_posts()) : ?>
  
   <?php while($general_article_query->have_posts()) : $general_article_query->the_post() ?>

   <?php get_template_part('card_profile');?>

<?php $general_article_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>
<?php get_template_part('courses_you_might_like'); ?>