<?php
    // Find all reviews of the current Post
    $studio_id = get_the_ID();
    $args = array(
        'post_type' => 'review',
        'post_status' => array('publish'),
        'posts_per_page' => -1,
        // 'author' => $current_user_id,
        'meta_query' => array(
           array(
                'key' => 'review_studio_id',
                'value' => $studio_id,
                'compare' => '='
             )
        ),
        'order' => 'DESC'
     );
    $review_posts = new WP_Query($args);
    $review_count = 0;  
    $star_total = 0;
  ?>
  <?php if($review_posts->have_posts()) : ?>
    <?php while($review_posts->have_posts()) : $review_posts->the_post() ?>
      <?php 
        $rating = get_post_meta( $post->ID, 'would_you_recommend_that_others_book_a_session_here?', true );
         switch ($rating) {
            case 'Definitely - my session was awesome':
                // echo "5";
                $review_star = 5;
                break;  
            case 'Probably - my session was really good':
                // echo "4";
                $review_star = 4;
                break;       
            case 'Maybe - my session was ok':
                // echo '3';
                $review_star = 3;
                break;
            case 'Probably Not - my session wasn\'t ok':
                // echo "2";
                $review_star = 2;
                break;       
            case 'Never - my session was terrible':
                // echo '1';
                $review_star = 1;
                break;
        }
        $review_count++;
        $star_total = $star_total+$review_star;
    ?>
  <?php endwhile ?>
  <?php 
    $star_average = $star_total / $review_count;
    $star_average_rounded = round($star_average);
    // Debuggin
    // echo "Total review: ".$review_count; 
    // echo " Total Stars: ".$star_total; 
    // echo " Ave Stars: ".$star_average_rounded;

    $star_rating = '
      <div class="star_rating">
        <h4>Average Rating: <span class="star-'.$star_average_rounded.'"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
      </div>
    ';
  ?>
<?php endif; wp_reset_query(); ?>
<?php if( is_single() ) : ?>
    <?php if ($review_count > 0 ) : ?>
    <div itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
        <?php echo $star_rating; ?>
    <!-- <img itemprop="photo" src="pizza.jpg" /> -->
        <span itemprop="itemreviewed"><?php the_title() ?></span> is rated 
        <span itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">
            <span itemprop="average"><?php echo $star_average ?></span>/<span itemprop="best">5</span>
        </span>
        based on <span class="hidden"><span itemprop="votes"><?php echo $review_count ?></span> ratings.</span>
        <span itemprop="count"><?php echo $review_count ?></span> reviews.
        <?php include_once('studio_reviews.php');?> 
    </div>  
    <?php 
        else :
            echo "<small>No reviews received.</small>";
        endif 
    ?>
<?php endif ?>    
<?php // END Review Star Count ?>