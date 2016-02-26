<?php /* Template Name: How it Works */ ?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <h1>How it Works</h1>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>

