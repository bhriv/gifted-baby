<?php /*  Menu Switch  */
    global $current_user;
   // get_currentuserinfo();
    $current_post_id = $post->ID;
    $current_user = wp_get_current_user(); 
    $current_user_id = $current_user->ID;
?>	
<?php

    $blank_value = '0';
    $args = array(
        'post_type' => 'studio',
        'post_status' => array('publish'),
        'posts_per_page' => -1,
        'author' => $current_user_id,
        // 'meta_query' => array(
        //    array(
        //       'key' => 'protest_is_live',
        //       'value' => 'yes',
        //       'compare' => '='
        //    )
        // ),
        'order' => 'ASC'
     );
    $artist_posts = new WP_Query($args);
  ?>
    
  <?php if($artist_posts->have_posts()) : ?>
   
     <?php while($artist_posts->have_posts()) : $artist_posts->the_post() ?>
            <?php $post_count = 'yes'; ?>
      <?php echo '<a id="" href="'.get_permalink().'" class="">My Studio</a>'; ?>
     <?php 
          endwhile;
          else :  
            echo '<a href="'.site_url() .'/add-studio/">Add Studio</a>';
      ?>
  <?php endif; wp_reset_query(); ?>
