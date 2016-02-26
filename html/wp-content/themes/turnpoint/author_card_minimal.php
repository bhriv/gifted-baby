<?php 
  $all_meta_for_user = get_user_meta( get_the_author_meta( 'ID' ) );
  $user_website = $all_meta_for_user['last_name'][0]; // only print the first result in the table i.e. 
  $user_nickname = $all_meta_for_user['nickname'][0]; // only print the first result in the table i.e. $single = yes
  $user_tagline = $all_meta_for_user['tagline'][0]; // only print the first result in the table i.e. $single = yes
  $user_facebook = $all_meta_for_user['facebook'][0]; // only print the first result in the table i.e. $single = yes
  $user_twitter = $all_meta_for_user['twitter'][0]; // only print the first result in the table i.e. $single = yes
  
  $user_instagram = $all_meta_for_user['instagram'][0];
  $user_avatar = get_avatar( $user_id, 240 );

 ?>
 <?php
  //$path = $user_twitter;
  //$twitter_handle = substr(strrchr($path, "/"), 1);
?>
<style type="text/css">
  .next_posts_link{
    float: left;
    margin-left: 16px;
  }
</style>
<p style="height:30px;"><span class="prev_posts_link"><?php previous_post_link( '%link', '< Previous Article' ); ?></span> <span class="next_posts_link"><?php next_post_link( '%link', 'Next Article >' ); ?></span></p>
<div class="author_comment outlinedXX">
  <div class="author_comment-image">
    <?php echo get_avatar( get_the_author_meta( 'ID' ), 95 ); ?>
  </div>
  <div class="author_comment-content">
    <h1><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'nickname' ); ?></a></h1>
    <p id="tagline"><?php the_author_meta( 'tagline' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">Read all posts by <?php the_author_meta( 'nickname' ); ?> <i class="fa fa-chevron-right"></i> </a></p>
    <p id="biography"><?php the_author_meta( 'biography' ); ?></p>
    <p class="author_comment-detail">
      w <a href="<?php echo get_the_author_meta( 'user_url' ) ?>" target="blank"><?php echo get_the_author_meta( 'user_url' ) ?></a><br>
      <?php if ($user_twitter != '') { ?>
        t <a href="https://twitter.com/<?php echo $user_twitter ?>" target="blank">@<?php echo $user_twitter ?></a>
        <?php }else{ ?>  
        L: <a href="<?= $all_meta_for_user['linkedin'][0] ?>" target="blank"><?= $all_meta_for_user['linkedin'][0] ?></a>  
        <?php } ?>
    </p>
  </div>
</div>