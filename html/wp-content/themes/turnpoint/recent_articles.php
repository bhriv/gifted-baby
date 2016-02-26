<?php  /* Recent Articles */
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'article',
    'posts_per_page' => 3,
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
<?php $general_article_item = 1; if($general_article_query->have_posts()) : ?>
  
   <?php while($general_article_query->have_posts()) : $general_article_query->the_post() ?>

   <?php if (($general_article_item == 1) && (!is_page('Home')) ) : ?>
   <ul class="rslides">
    <li>
       <?php the_post_thumbnail(); ?>
       <span>
          <h1><?php the_title();?></h1>
          <?php the_excerpt() ?>
       </span>
    </li>
   </ul>
  <?php else : ?>
   <?php get_template_part('card_profile');?>
 <?php  endif ?>
<?php $general_article_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>
