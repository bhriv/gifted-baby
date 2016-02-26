<?php /* Template Name: Authors */ ?>
<div class="clearfix">
  <section>
    <h1><?php the_title()?></h1>
    <?php the_content()?>
    <ul id="profile_cards">
    <?php
      // $blogusers = get_users('blog_id=1&orderby=nicename'); // ALL users
      $blogusers = get_users('blog_id=1&orderby=nicename&role=contributor'); // ALL Authors
      // $blogusers = get_users('blog_id=1&orderby=nicename&role=author&meta_key=protest_following_id&meta_value='.$this_protest_id); // ALL Authors
      foreach ($blogusers as $user) {
          // setup user tests
          $user_id = $user->ID;
          $all_meta_for_user = get_user_meta( $user_id );
          $user_website = $all_meta_for_user['last_name'][0]; // only print the first result in the table i.e. 
          $user_nickname = $all_meta_for_user['nickname'][0]; // only print the first result in the table i.e. $single = yes
          $user_tagline = $all_meta_for_user['tagline'][0]; // only print the first result in the table i.e. $single = yes
          $user_facebook = $all_meta_for_user['facebook'][0]; // only print the first result in the table i.e. $single = yes
          $user_twitter = $all_meta_for_user['twitter'][0]; // only print the first result in the table i.e. $single = yes
          $user_instagram = $all_meta_for_user['instagram'][0]; // only print the first result in the table i.e. $single = yes
          $user_url = $all_meta_for_user['user_url'][0]; // only print the first result in the table i.e. $single = yes
          // $current_user_email = $user->user_email;
          // echo "Email: ";
          $user_avatar = get_avatar( $user_id, 100 );
          // $user_avatar = get_wp_user_avatar('medium');

          // if ($im_following == $this_protest_id) 
          if ($user_avatar != '') {
            $has_avatar = 'has_avatar';
          }else{
            $has_avatar = 'no_avatar hide';
          }
            ?>
            <?php 
            echo '<li class="staff '.$has_avatar.'">'; ?>
            <div class="author_comment">
              <div class="author_comment-image">
                <?php 
                  // echo 'test ' .$all_meta_for_user['description'][0];
                  echo $user_avatar;
                ?>
              </div>
              <div class="author_content">
                <?php // ' . $user_tagline . 
                echo '<span><a href="'.get_author_posts_url($user_id).'"><h3>'.$user_nickname .'</span></h3></a></span>
                      <p><em></em></p>';
                ?>
                <ul class="social_media">
                  <?php if ($user_facebook != '') : ?>
                  <li>
                    <a href="<?= $all_meta_for_user['facebook'][0] ?>" target="blank" alt="Facebook Link">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                  </li>
                  <?php endif ?>
                  <?php if ($user_twitter != '') : ?>
                  <li>
                    <a href="https://twitter.com/<?= $all_meta_for_user['twitter'][0] ?>" target="blank" alt="Twitter Link">
                        <i class="fa fa-twitter-square"></i>
                    </a>
                  </li>
                  <?php endif ?>
                  <?php if ($user_instagram != '') : ?>
                      <li>
                        <a href="<?= $all_meta_for_user['instagram'][0] ?>" target="blank" alt="Instagram Link">
                            <i class="fa fa-instagram"></i>
                        </a>
                      </li>
                  <?php endif ?>
                </ul>
              </div>
            </div>
          <?php
            echo "</li>"; 
        } ?>
      </ul>
  </section>
</div>
