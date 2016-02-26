<div class="author_comment outlined">
  <div class="author_comment-image">
    <span class="rounded"><?php echo get_avatar( get_the_author_meta( 'ID' ), 95 ); ?></span>
  </div>
  <div class="author_comment-content">
    <h1><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'nickname' ); ?></a></h1>
    <p><?php the_author_meta( 'description' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">Read all posts by <?php the_author_meta( 'nickname' ); ?> <i class="fa fa-chevron-right"></i> </a></p>
    <p class="author_comment-detail">
      w <a href="">www.clareharrison.com</a><br>
      e <a href="">hello@clareharrison.com</a>
    </p>
  </div>
</div>
<p><span class="prev_posts_link"><?php previous_post_link( '<strong>< Prev</strong>' ); ?></span> <span class="next_posts_link"><?php next_post_link( '<strong>Next ></strong>' ); ?></span></p>