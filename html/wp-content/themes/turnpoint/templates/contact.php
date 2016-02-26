<?php /* Template Name: Contact */ ?>
<?php while (have_posts()) : the_post(); ?>
  <ul class="rslides">
    <li>
      <?php the_post_thumbnail()?>
      <div class="main-container">
        <div class="main">
          <span>
            <h1>What's Up</h1>
          </span>
        </div>
      </div>
    </li>
  </ul>
  <div class="main-container">
    <div class="clearfix">
      <article <?php post_class(); ?>>
        <?php the_content();?>
      </article>
    </div>
  </div>
  <ul class="rslides">
    <li>
      <img src="<?php the_field('second_image');?>">
      <div class="main-container">
        <div class="main">
          <span>
            <?php the_field('second_image_content'); ?>
          </span>
        </div>
      </div>
    </li>
  </ul>
<?php endwhile; ?>


