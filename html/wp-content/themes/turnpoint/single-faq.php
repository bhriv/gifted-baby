 <!-- <div class="outlined"> -->
 <?php while (have_posts()) : the_post(); ?>
      <?php 
        $post_id = get_the_ID();
        $meta = get_post_meta($post_id);
        // print_r($meta);
    ?>
    <div class="outlined">
      <div class="media-body">
        <h1 class="media-heading"><?php echo the_title();?></h1>
        <?php the_content();?>
        <footer><span class="author">By <?php echo the_author_meta( 'display_name');?></span></footer>
      </div>
    </div>
  <?php endwhile ?>
<!-- </div> -->