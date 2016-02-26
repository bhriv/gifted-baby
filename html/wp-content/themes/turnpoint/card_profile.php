<?php $current_post_type = get_post_type( get_the_ID() ); ?>
<div class="card_profile show-me
<?php 
  echo ' '.$current_post_type; 
  echo ' post-'.get_the_ID();
  $the_category = get_the_terms( $post->ID, 'category');
   if ( !empty( $the_category ) && !is_wp_error( $the_category )) {
      foreach ( $the_category as $term ) {
        echo ' '.$term->slug.' ';
      }
   }
?>">
  <div class="card_profile-image">
  <?php //if ( ($current_post_type == 'article') && !is_single() ) : ?>
    <a href="<?php the_permalink()?>">
      <?php the_post_thumbnail('thumbnail');?>
    <span>
      <?php get_template_part('key_terms'); ?>
    </span>
    </a>
  <?php //endif ?>
  </div>
  <div class="card_profile-header">
    <p class="h1">
      <a href="<?php the_permalink()?>">
        <?php the_title();?>
      </a>
    </p>
    <?php get_template_part('templates/entry-meta'); ?>
  </div>
  <div class="card_profile-copy">
    <?php the_excerpt();?> 
    <?php // get_template_part('templates/readmore');?>
  </div>
 

<?php if (is_tax('category')) : ?>
  <div class="card_profile-stats">
    <?php get_template_part('key_terms'); ?>
  </div>
<?php endif ?>  
<?php
  if ($current_post_type == 'course') : ?>
  <a href="<?php the_permalink()?>">
    <button class="alt_cta">View Course</button>       
  </a>
<?php 
  endif ?>
</div>