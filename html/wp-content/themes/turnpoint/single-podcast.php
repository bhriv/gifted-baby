<?php while (have_posts()) : the_post(); ?>
  <div class="outlined">
    <article <?php post_class(); ?>>
      <!-- podcast series img -->
       <?php 
          $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) )
        ?>
     <!--  <div class="vert_block" style=" background-image: url('<?php echo $url; ?>');">
          <div class="vert_block_centered">
              <img src="<?php site_url();?>/images/logoTP.png">
              <p class="h1">Podcast Series</p>
          </div>
      </div> -->
      <ul class="rslides">
        <li>
          <?php the_post_thumbnail(); ?>
        </li>
      </ul>
      <?php get_template_part('post_header');?>
      <div class="entry-content">
        <div class="podcast_player">
          <?php echo do_shortcode('[powerpress]'); ?>
        </div>
        <?php the_content(); ?>
      </div>
      <footer>
      <hr>
      <?php get_template_part('author_card_minimal'); ?>
      <?php get_template_part('key_tags'); ?>
      <p id="archive_nav">
        <span class="prev_posts_link"><?php previous_post_link( '<strong>< %link</strong>' ); ?></span> <span class="next_posts_link"><?php next_post_link( '<strong>%link ></strong>' ); ?></span>
      </p>
        <?php //wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      </footer>
      <?php comments_template('/templates/comments.php'); ?>
    </article>
  </div>
<?php endwhile ?>
<?php get_template_part('courses_you_might_like'); ?>

