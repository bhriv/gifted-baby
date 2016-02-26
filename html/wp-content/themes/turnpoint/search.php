<?php if (have_posts()) : ?>
  <h2>Search Results For: <strong><em><?php echo esc_html( get_search_query( false ) ); ?></em></strong></h2>
<?php while (have_posts()) : the_post(); ?>

  <div class="outlined">
    <h3 class=""><a href="<?php the_permalink()?>"><?php the_title(); ?></h3></a>
    <div class="entry-content">
      <?php the_excerpt(); ?>
    </div>
  </div>
  <div class="clearfix"><br></div>
<?php endwhile; 
  endif;
?>
