<?php /* Template Name: Wide Image Page */ ?>
<?php while (have_posts()) : the_post(); ?>
  <ul class="rslides">
    <li>
      <?php the_post_thumbnail()?>
      <div class="main-container">
        <div class="main">
          <?php if ( get_field('slider_details') ) : ?>
          <span>
            <?php the_field('slider_details');?>
          </span>
          <?php endif ?>
        </div>
      </div>
    </li>
  </ul>
  <div class="main-container">
    <div class="main clearfix wrapper">
      <article <?php post_class(); ?>>
        <?php the_content()?>
      </article>
    </div>
  </div>
<?php endwhile; ?>


