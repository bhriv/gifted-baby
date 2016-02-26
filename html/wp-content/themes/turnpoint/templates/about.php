<?php /* Template Name: About */ ?>
<?php while (have_posts()) : the_post(); ?>
<ul class="rslides">
  <li>
    <?php the_post_thumbnail()?>
    <div class="main-container">
      <div class="main">
        <span>
          <h1><?php the_title();?></h1>
        </span>
      </div>
    </div>
  </li>
</ul>
<div class="main-container">
  <article <?php post_class(); ?>>
    <div class="main clearfix">
      <?php the_content(); ?>
    </div>
    <aside class="sidebar">
      <!-- <img src="<?= site_url()?>/assets/infographics-med.jpg"> -->
      <ul style="margin:0;list-style:none;padding:0;"><?php dynamic_sidebar('about-us-sidebar'); ?></ul>
    </aside>
    <div class="clearfix"></div>
      <section>
        <h2>Meet Our Team</h2>
        <?php the_field('meet_the_team'); ?>
        <ul id="profile_cards">
        <?php
          // $blogusers = get_users('blog_id=1&orderby=nicename'); // ALL Editors
          $blogusers = get_users('blog_id=1&orderby=nicename&role=editor'); // ALL Authors
          // $blogusers = get_users('blog_id=1&orderby=nicename&role=author&meta_key=protest_following_id&meta_value='.$this_protest_id); // ALL Authors
          foreach ($blogusers as $user) {
              // setup user tests
              $this_protest_id = $post->ID;
              $user_id = $user->ID;
              $all_meta_for_user = get_user_meta( $user_id );
              $user_website = $all_meta_for_user['last_name'][0]; // only print the first result in the table i.e. 
              $user_nickname = $all_meta_for_user['nickname'][0]; // only print the first result in the table i.e. $single = yes
              $user_tagline = $all_meta_for_user['tagline'][0]; // only print the first result in the table i.e. $single = yes
              $user_facebook = $all_meta_for_user['facebook'][0]; // only print the first result in the table i.e. $single = yes
              $user_twitter = $all_meta_for_user['twitter'][0]; // only print the first result in the table i.e. $single = yes
              $user_instagram = $all_meta_for_user['instagram'][0];
              $user_url = $all_meta_for_user['user_url'][0];
              $user_avatar = get_avatar( $user_id, 240 );
              // if ($im_following == $this_protest_id) 
                ?>
                <?php 
                echo '<li class="staff">'; ?>
                <div class="author_comment">
                  <div class="author_comment-image">
                    <?php 
                      // echo 'test ' .$all_meta_for_user['description'][0];
                      echo $user_avatar;
                    ?>
                  </div>
                  <div class="author_content">
                    <?php 
                    echo '<span><a href="'.get_author_posts_url($user_id).'"><h3>'.$user_nickname .'</span></h3></a></span>
                          <p><em>' . $user_tagline . '</em></p>
                          ';
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
                        <a href="<?= $all_meta_for_user['twitter'][0] ?>" target="blank" alt="Twitter Link">
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
  </article>
</div>  
<?php endwhile; ?>


