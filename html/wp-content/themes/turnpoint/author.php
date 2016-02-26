<?php /* Template Name: Author Custom */ ?>
<div id="content" class="">
<!-- This sets the $curauth variable -->
  <?php
      $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
      //echo $curauth->ID;
      $all_meta_for_user = get_user_meta( $curauth->ID  );
      
      $user_website = $all_meta_for_user['last_name'][0]; // only print the first result in the table i.e. 
      $user_nickname = $all_meta_for_user['nickname'][0]; // only print the first result in the table i.e. $single = yes
      $user_tagline = $all_meta_for_user['tagline'][0]; // only print the first result in the table i.e. $single = yes
      $user_facebook = $all_meta_for_user['facebook'][0]; // only print the first result in the table i.e. $single = yes
      $user_twitter = $all_meta_for_user['twitter'][0]; // only print the first result in the table i.e. $single = yes
      
      $user_instagram = $all_meta_for_user['instagram'][0];
      $user_avatar = get_avatar( $user_id, 240 );
  ?>
  <div class="author_comment outlined">
    <div class="author_comment-image">
      <span><?php echo get_avatar( $curauth->ID , 150 ); ?></span>
      <?php //get_template_part('author_social_links'); ?>
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
              <a href="https://www.instagram.com/<?= $all_meta_for_user['instagram'][0] ?>" target="blank" alt="Instagram Link">
                  <i class="fa fa-instagram"></i>
              </a>
            </li>
        <?php endif ?>
      </ul>
    </div>
    <div class="author_comment-content">
      <?php // echo $curauth->ID; ?>
      <?php 
        $user_id = $curauth->ID;
        $key = 'nickname';
        $single = true;
        $user_nickname = get_user_meta( $user_id, $key, $single ); 
        // echo '<p>The '. $key . ' value for user id ' . $user_id . ' is: ' . $user_last . '</p>'; 
        $user_id = $curauth->ID;
        $all_meta_for_user = get_user_meta( $user_id );
        $user_bio = $all_meta_for_user['biography'][0];
        
        // $first_name = $all_meta_for_user['first_name'][0]; // only print the first result in the table i.e. 
        // $last_name = $all_meta_for_user['last_name'][0]; // only print the first result in the table i.e. 
        // $user_nickname = $all_meta_for_user['nickname'][0]; // only print the first result in the table i.e. $single = yes
        // $user_tagline = $all_meta_for_user['tagline'][0]; // only print the first result in the table i.e. $single = yes
        // $user_url = $all_meta_for_user['user_url'][0]; // only print the first result in the table i.e. $single = yes


      ?>
      <h1><?php echo $user_nickname ?></h1>
      <?php if ($user_bio != '') { ?>
         <p id="biography"><?= $all_meta_for_user['biography'][0] ?></p>
      <?php }else{ ?>
        <p><?= $all_meta_for_user['description'][0] ?></p>
      <?php } ?>
      <p class="author_comment-detail">
        w <a href="<?php echo get_the_author_meta( 'user_url', $user_id ); ?>"><?php echo get_the_author_meta( 'user_url', $user_id ); ?></a><br>
        <?php
         // $path = $user_twitter;
          //$twitter_handle = substr(strrchr($path, "/"), 1);
        ?>
        <?php if ($user_twitter != '') { ?>
        t <a href="https://twitter.com/<?= $all_meta_for_user['twitter'][0] ?>" target="blank" alt="twitter link">@<?php echo $user_twitter ?></a>
        <?php }else{ ?>  
        L: <a href="<?= $all_meta_for_user['linkedin'][0] ?>" target="blank"><?= $all_meta_for_user['linkedin'][0] ?></a>  
        <?php } ?>
      </p>
    </div>
  </div>

  <?php
  $general_args = array(
      'post_status' => 'publish',
      'post_type' => 'article',
      'posts_per_page' => -1,
      'author' => $curauth->ID,
      'order' => 'ASC'
   );
   $general_article_query = new WP_Query($general_args);
  ?>
    <div id="card_profile">
    <?php $article_item = 1; if($general_article_query->have_posts()) : ?>
      <h4><i class="fa fa-eye"></i> Articles by <?php echo get_the_author_meta( $curauth->ID, 'first_name' ) ?></h4>
      
       <?php while($general_article_query->have_posts()) : $general_article_query->the_post() ?>
            <?php get_template_part('card_profile');?>
       <?php $article_item++;
        endwhile;
          echo "<div class='clearfix'></div>";
        else : 
          echo '<h4><i class="fa fa-eye"></i> No Articles</h4>';
        endif;
        echo "<div class='clearfix'></div>";
    ?>
    </div> <!--.#card_profile-->

  <?php
  $general_args = array(
      'post_status' => 'publish',
      'post_type' => 'course',
      'posts_per_page' => -1,
      'author' => $curauth->ID,
      'order' => 'ASC'
   );
   $general_article_query = new WP_Query($general_args);
  ?>
  <?php $article_item = 1; if($general_article_query->have_posts()) : ?>
    <h4><i class="fa fa-eye"></i> Courses by <?php echo get_the_author_meta( 'first_name' ) ?></h4>
    <div id="card_profile_courses">
     <?php while($general_article_query->have_posts()) : $general_article_query->the_post() ?>
          <?php get_template_part('card_profile');?>
     <?php $article_item++;
      endwhile; ?>
    </div>
<?php echo "<div class='clearfix'></div>";
      endif;

      echo "<div class='clearfix'></div>";
    ?>
      

  <?php
  $general_args = array(
      'post_status' => 'publish',
      'post_type' => 'podcast',
      'posts_per_page' => -1,
      'author' => $curauth->ID,
      'order' => 'ASC'
   );
   $general_article_query = new WP_Query($general_args);
  ?>
  <?php $article_item = 1; if($general_article_query->have_posts()) : ?>
    <h4><i class="fa fa-eye"></i> Podcasts by <?php echo get_the_author_meta( 'first_name' ) ?></h4>
    <div id="card_profile_podcast">
        <?php while($general_article_query->have_posts()) : $general_article_query->the_post() ?>
          <?php get_template_part('card_profile');?>
     <?php $article_item++;
      endwhile;
        echo "
    </div>
    <div class='clearfix'></div>";
      endif;
      echo "<div class='clearfix'></div>";
  ?>
  
</div>
  