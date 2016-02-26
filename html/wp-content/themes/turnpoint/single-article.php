<?php while (have_posts()) : the_post(); ?>
  <?php setPostViews(get_the_ID()); ?>
  <div class="outlined">
    <article <?php post_class(); ?>>
      <?php get_template_part('post_header');?>
      <div class="entry-content">
        <?php the_post_thumbnail(); ?>
        <?php the_content(); ?>
      </div>
      <footer>
        <!-- <h5>Tags</h5> -->
        <p><?php the_tags(); ?></p>
      <?php get_template_part('author_card_minimal'); ?>
      
      </footer>
      <?php comments_template('/templates/comments.php'); ?>
    </article>
  </div>
  <div class="fb_holder">
    <div class="fb-comments" data-href="http://turnpoint.io<?php the_permalink()?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
  </div>
<?php endwhile; ?>
<?php get_template_part('courses_you_might_like'); ?>
