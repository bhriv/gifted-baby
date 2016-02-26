 <div class="outlined">
 <?php while (have_posts()) : the_post(); ?>
    <?php include( 'review-content.php' ) ;?>
  <?php endwhile ?>
</div>