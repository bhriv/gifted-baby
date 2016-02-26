<?php /* Template Name: Settings */ ?>
<?php while (have_posts()) : the_post(); ?>
<h2>Settings</h2>
  <?php
    $current_user = wp_get_current_user();

    /**
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     */
    echo '<ul class="current_user_details">
         <li>Logged In As: ' . $current_user->user_login . ' (ID: ' . $current_user->ID . ') </li>
         <li>Display Name: ' . $current_user->display_name . '</li>
         <li>Nicename: ' . $current_user->nicename . '</li>
         <li>Email: ' . $current_user->user_email . '</li>
         <li>First Name:' . $current_user->user_firstname.'</li>
         <li>Last Name: ' . $current_user->user_lastname .'</li>';


      // add input for user id
  if(current_user_can('delete_users')){
    echo " <li>level 5 (admin) </li>"; 
  }
  elseif(current_user_can('edit_pages')){
    echo " <li>level 4 (editor) </li>"; 
  }
  elseif(current_user_can('publish_posts')){
    echo " <li>level 3 (author) </li>"; 
  } 
  elseif(current_user_can('edit_posts')){
    echo " <li>level 2 (contributor) </li>"; 
  }
  else{
    echo " <li>level 1 (subscriber) </li>";
  }
  echo '</ul>';           
?>
<div class="clearfix"></div>

  <article <?php post_class(); ?>>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>

<span class="blackline"></span>
<?php  
    $faq_count = 0;
    $faq_args = array(
      'post_status' => 'publish',
      'post_type' => 'faq',
      'posts_per_page' => -1
   );
   $faq_posts = new WP_Query($faq_args);
  ?>
  <h2 class="tac"><big>Frequently Asked Questions</big></h2>

   <?php if($faq_posts->have_posts()) : ?>
     <?php while($faq_posts->have_posts()) : $faq_posts->the_post() ?>
     <h2><small><span class="red">Q:</span> <?php the_title(); ?></small></h2>
     <?php the_content();?>
<?php 
     $faq_count++;
    endwhile; 
  endif; wp_reset_query();
?>


