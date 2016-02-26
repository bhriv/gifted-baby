<h1>Tax Posts</h1>
<?php // Taxonomy > Category ?>
<?php //include_once('map-loop.php');
$general_args = array(
    'post_status' => 'publish',
    'post_type' => array('post','article'),
    'posts_per_page' => -1,
    // 'tax_query' => array(
    //         array(
    //           'taxonomy' => 'Sections',
    //           'field' => 'slug',
    //           'terms' => 'general'
    //         )
    //       ),
    'order' => 'ASC'
 );
 $general_tax_query = new WP_Query($general_args);
?>
<?php $general_tax_item = 1; if($general_tax_query->have_posts()) : ?>

   <?php while($general_tax_query->have_posts()) : $general_tax_query->the_post() ?>
    <div class="expander" id="faq-<?= $general_faq_item ?>">
      <a href="javascript:void(0)" class="expander-toggle"><?php the_title();?></a>
      <div class="expander-content">
        <?php the_content();?>
      </div>
    </div>
   <?php $general_tax_item++; endwhile ?>
<?php endif ?>
