<?php  /* Recent Quotes */
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'quote',
    'posts_per_page' => 3,
    // 'tax_query' => array(
    //         array(
    //           'taxonomy' => 'Sections',
    //           'field' => 'slug',
    //           'terms' => 'general'
    //         )
    //       ),
    'order' => 'ASC'
 );
 $general_quote_query = new WP_Query($general_args);
?>
<div class="quote_holder">
<?php $general_quote_item = 1; if($general_quote_query->have_posts()) : ?>
  
   <?php while($general_quote_query->have_posts()) : $general_quote_query->the_post() ?>

   <div class="quote_card">
    <div class="tooltip-item">
      <div class="tooltip" style="visibility: visible !important;opacity:1 !important;display: block !important;">
      <?php the_content();?>
      </div>
      <div class="author_comment">
       <div class="author_comment-image">
            <?php the_post_thumbnail() ?>
          </div>
          <div class="author_comment-content">
            <p><strong><?php the_title() ?></strong>, <?= get_post_meta( $post->ID, 'course_category',true ); ?></p>
          </div>
        </div>   
    </div>
  </div>
<?php $general_quote_item++; 
        endwhile ?>
<?php endif; wp_reset_query(); ?>
</div>
