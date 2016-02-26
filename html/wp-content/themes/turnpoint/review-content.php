<?php 
  $author_email = get_the_author_meta('user_email');
  $author_name = get_the_author_meta('display_name');
  $simple_date = get_the_date('', '', '', FALSE);
  $full_date = get_the_date('Y-m-d', '', '', FALSE);
  $rating = get_post_meta( $post->ID, 'would_you_recommend_that_others_book_a_session_here?', true );
  $review_studio_id = get_post_meta( $post->ID, 'review_studio_id', true );
  switch ($rating) {
    case 'Definitely - my session was awesome':
        $review_star = 5;
        break;  
    case 'Probably - my session was really good':
        $review_star = 4;
        break;       
    case 'Maybe - my session was ok':
        $review_star = 3;
        break;
    case 'Probably Not - my session wasn\'t ok':
        $review_star = 2;
        break;       
    case 'Never - my session was terrible':
        $review_star = 1;
        break;
  }
?>        
  <div class="single-review media">
    <div itemscope itemtype="http://data-vocabulary.org/Review">
      <a class="pull-left">
        <?php 
          echo get_avatar( $author_email, '80' ); 
        ?>
      </a>
      <div class="media-body">
        <p class="h1 media-heading"><small><span itemprop="summary"><?php echo the_title();?></span></small></p>
        <?php 
          $star_rating = '
            <div class="star_rating">
              <h4>Rating: <span class="rating-foreground star-'.$review_star.'"><meta itemprop="rating" content="'.$review_star.'" /><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
            </div>
          ';
          echo $star_rating;
        ?>
        <span itemprop="description"><?php the_content();?></span>
        
        <footer>
          <p>
            <small>
              <span class="author" itemprop="reviewer"><?php echo $author_name;?></span> reviewed 
              <span itemprop="itemreviewed">
              <?php 
                // Get Studio Page Title by ID
                $id=$review_studio_id; $post = get_page($id); $title = apply_filters('the_content', $post->post_title); ?>
              <?php echo strip_tags($title); wp_reset_query(); ?>
              </span>on <time itemprop="dtreviewed" datetime="<?php echo $full_date ?>"><?php echo $simple_date ?></time>
            </small>
          </p>
        </footer>
      </div>
    </div>
  </div><!--  end review -->