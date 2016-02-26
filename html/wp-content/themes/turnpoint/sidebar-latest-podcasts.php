<?php  /* Sidebar Latest Courses */
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'podcast',
    'posts_per_page' => 3,
    // 'meta_query' => array(
    //        array(
    //           'key' => 'top_podcast',
    //           'value' => 'yes',
    //           'compare' => '='
    //        )
    //     ),
    'order' => 'DESC'
 );
 $general_course_query = new WP_Query($general_args);
?>
<?php $general_course_item = 1; if($general_course_query->have_posts()) : ?>
  <h3 class="podcast_title">Latest</h3>
  <div class="card_profile">
   <?php while($general_course_query->have_posts()) : $general_course_query->the_post() ?>
   <span id="box-<?php echo $general_course_item; ?>">
  <?php get_template_part('card_profile');?>
  </span>
<?php $general_course_item++; 
        endwhile ?>
  </div>
<?php endif; wp_reset_query(); ?>
<style type="text/css">
  aside .card_profile .card_profile{
    box-shadow: none;
    border: none;
    /*border-bottom: 1px solid #f5f5f5;*/
    border-radius: 0;
    margin-bottom: 0;
  }
  aside .card_profile .card_profile{
    border-bottom: none;
    margin-bottom: 0 !important;
  }

  aside .card_profile .card_profile .card_profile-copy{
    margin-bottom: 0;
    padding-bottom: 0;
  }
  aside .card_profile .card_profile .card_profile-copy p{
    border-bottom: 2px solid #ccc;
    padding-bottom: 20px;
    /*margin-bottom: 1em;*/
  }
  aside .card_profile #box-3 .card_profile .card_profile-copy p{
    border-bottom: none;
  }
  aside .card_profile .card_profile .card_profile-header{
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
  }

</style>
