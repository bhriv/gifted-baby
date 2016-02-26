<h1><?php single_cat_title('Category <i class="fa fa-angle-right"> '); ?></h1>
<?php //include_once('map-loop.php');
$general_args = array(
    'post_status' => 'publish',
    'post_type' => array('post','article','course','podcast'),
    'category__in' => 4,
    'posts_per_page' => -1,
    'order' => 'DESC'
 );
 $general_tax_query = new WP_Query($general_args);
?>
<?php $general_tax_item = 1; if($general_tax_query->have_posts()) : ?>

   <?php while($general_tax_query->have_posts()) : $general_tax_query->the_post() ?>
    <?php get_template_part('card_profile');?>
   <?php $general_tax_item++; endwhile ?>
<?php endif ?>