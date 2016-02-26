<?php  /* Template Name: FAQ */ 

 echo get_the_post_thumbnail( 25, 'full', array( 'class' => 'fill_width' ) );

$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'faq',
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
 $general_faq_query = new WP_Query($general_args);
?>
<div class="main-container">
  <div class="main clearfix wrapper">
    <div class="default-page">
      <h1>Frequently Asked Questions</h1>
      <p>Here's a bunch of questions we get asked a lot:</p>
    <?php $general_faq_item = 1; if($general_faq_query->have_posts()) : ?>
      <?php the_content(); ?>
       <?php while($general_faq_query->have_posts()) : $general_faq_query->the_post() ?>
        <div class="expander" id="faq-<?= $general_faq_item ?>">
          <a href="javascript:void(0)" class="expander-toggle"><?php the_title();?></a>
          <div class="expander-content">
            <?php the_content();?>
          </div>
        </div>
       <?php $general_faq_item++; endwhile ?>
    <?php endif; wp_reset_query(); ?>
      <footer>
        <?php 
          if (get_field('faq_footer')) :
            the_field('faq_footer');
          else :
            echo '<p><strong>Have a question not answered?</strong> Email us at <a href="mailto:team@turnpoint.io">team@turnpoint.io</a></p>';
          endif 
          ?>
      </footer>
    </div>
  </div>
</div>