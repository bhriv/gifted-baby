<?php  /* Sidebar Top Authors */ ?>
<h3>Our Top Contributors</h3>
<?php
  // $blogusers = get_users('blog_id=1&orderby=nicename'); // ALL Authors //&role=editor
  $meta_key = 'top_author';
  $meta_value = 'yes';
  $blogusers = get_users('blog_id=1&orderby=nicename&meta_key='.$meta_key.'&meta_value='.$meta_value); // ALL Authors
  foreach ($blogusers as $user) {
      
      $user_id = $user->ID;
      $all_meta_for_user = get_user_meta( $user_id );
      // echo $user_id . '<br>';
      //print_r($all_meta_for_user);
      $user_nickname = $all_meta_for_user['nickname'][0]; // only print the first result in the table i.e. $single = yes
      $user_description = $all_meta_for_user['description'][0]; // only print the first result in the table i.e. $single = yes
      $top_mentor = $all_meta_for_user['top_author'][0]; //
        if ($top_mentor == 'yes') { ?>
        <div class="author_comment">
          <div class="author_comment-image">
            <?php echo get_avatar( $user_id , 95 ); ?>
          </div>
          <div class="author_comment-content">
            <p><?= $user_description ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">Read all posts by <?= $user_nickname ?> <i class="fa fa-chevron-right"></i> </a></p>
           <p class="author_comment-detail">
              <small>w <a href="<?php echo get_the_author_meta( 'user_url' ) ?>"><?php echo get_the_author_meta( 'user_url' ) ?></a><br></small>
              <small>e <a href="mailto:<?php echo get_the_author_meta( 'user_email' ) ?>"><?php echo get_the_author_meta( 'user_email' ) ?></a></small>
            </p>
          </div>
        </div>
      <?php }
    } 
  ?>
