<?php /* Template Name: Dashboard  */
  $current_user = wp_get_current_user();
?>	
<?php if ( is_user_logged_in() ) {  ?>
<section>
  <!-- <h3>Account Settings</h3> -->
  <?php 
    $user = wp_get_current_user();
    $user_id = $user->ID;
    $all_meta_for_user = get_user_meta( $user_id );
    $user_nickname = $all_meta_for_user['nickname'][0]; // only print the first result in the table i.e. $single = yes
    $user_display_name = $all_meta_for_user['display_name'][0]; // only print the first result in the table i.e. $single = yes
    $user_display_name = $user->display_name;
    $user_name = $all_meta_for_user['user_login'][0]; // only print the first result in the table i.e. $single = yes
    $user_avatar = get_avatar( $user_id, 40 ); ?>
    
  <!-- <span><a href="'.site_url().'/profile/">'.$user_display_name.'</a></span> -->
  <p>
    <h3>
      <?php 
        echo '
        <a href="'.site_url().'/dashboard/user-settings/">'.$user_avatar.' <button><i class="fa fa-edit"></i> Edit Settings
        </button></a>'; 
      ?>
    </h3>
    (password, email, display name, profile image)
  </p>
</section> 
<?php
    $args = array(
        'post_type' => 'studio',
        'post_status' => array('publish', 'draft'),
        'posts_per_page' => -1,
        'author' => $current_user->ID,
        // 'meta_query' => array(
        //    array(
        //         'key' => 'artist_administrator',
        //         'value' => $current_user_id,
        //         'compare' => '='
        //      )
        // ),
        // 'orderby' => 'meta_value',
        // 'meta_key' => 'preferred_gig_date',
        'order' => 'ASC'
     );
    $artist_posts = new WP_Query($args);
  ?>
    <?php // if($artist_posts->have_posts()) : ?>
    <section>
      <?php echo "<h2>Studio Profiles</h2>"; ?>
      <table class="table dashboard">
      <thead>
        <tr>
          <th>Studio Image</th>
          <th>Studio Name</th>
          <!-- <th>Profile Link</th> -->
          <th>Create Invoice</th>
          <th>Status</th>
          <th>Edit</th>
          <th>View</th>
        </tr>
      </thead>
      <tbody>

       <?php while($artist_posts->have_posts()) : $artist_posts->the_post() ?>
      <?php $my_studio_id = $post->ID; ?>
        <tr>
            <td>
              <a href="/edit-studio/?pid=<?php echo $post->ID;?>">
              <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?> 
              </a>
            </td>
            <td><?php the_title() ?></td>
            <td><a href="<?php echo site_url();?>/add-invoice/?session_studio_id=<?php echo $post->ID;?>"><small><button>Create Invoice</button></small> </a></td>
            <td>
               <?php $status = get_post_status( $ID ); 
               switch ($status) {
                  case 'publish':
                      echo "Active";
                      break;       
                  case 'draft':
                      echo 'Preview';
                      break;
              }?>
            </td>
            <td><a href="/edit-studio/?pid=<?php echo $post->ID;?>">Edit <i class="fa fa-pencil-square-o"></i></small></a></td>
            <td><a href="<?php echo the_permalink(); ?>">View <i class="fa fa-eye"></i></small></a></td>
        </tr>  
       <?php endwhile ?>
        </tbody>
      </table>
      <a href="<?php echo site_url();?>/add-studio/"><button>List Studio</button></a>
    </section>
       <?php //else : ?>
       <?php //echo "<button>You haven't added a Studio yet.</button>";?>
    <?php //endif; 
    wp_reset_query(); ?>
<?php
    $args = array(
        'post_type' => 'session',
        'post_status' => array('publish'),
        'posts_per_page' => -1,
        'meta_query' => array(
           array(
                'key' => 'session_studio_id',
                'value' => $my_studio_id,
                'compare' => '='
             )
        ),
        'order' => 'ASC'
     );
    $artist_posts = new WP_Query($args);
    
  ?>
<?php if($artist_posts->have_posts()) : ?>
<section>
  <?php echo "<h2>Bookings <small>(Received)</small></h2>"; ?>
    <table class="table">
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Artist</th>
        <th>Contact</th>
        <!-- <th>Email</th> -->
        <th>Services</th>
        <!-- <th>Session Fee</th> -->
        <th>Start Date</th>
        <th># Songs</th>
        <th># Days</th>
        <!-- <th>Link</th> -->
        <th>Fee</th>
        <th>Studio</th>
      </tr>
    </thead>
    <tbody>
     <?php while($artist_posts->have_posts()) : $artist_posts->the_post() ?>
   
      <tr>
          <td><?php the_title() ?></td>
          <td><?php echo get_post_meta( $post->ID, 'artist_name', true ); ?></td>
          <td><a href="mailto:<?php echo the_author_meta( 'email');?>"><?php echo the_author_meta( 'display_name');?></a></td>
          <td><?php echo get_post_meta( $post->ID, 'services_needed', true ); ?> </td>
          <!-- <td><?php echo get_post_meta( $post->ID, 'session_fee', true ); ?> </td> -->
          <td><?php echo get_post_meta( $post->ID, 'proposed_start_date', true ); ?> </td>
          <td><?php echo get_post_meta( $post->ID, 'number_of_songs', true ); ?> </td>
          <td><?php echo get_post_meta( $post->ID, 'number_of_days', true ); ?> </td>
          <!-- <td><?php// echo get_post_meta( $post->ID, 'link_to_demo_or_previous_recordings', true ); ?> </td> -->
          <td>$<?php echo get_post_meta( $post->ID, 'session_quote', true ); ?> </td>
          <td>
            <?php
              $postid = get_post_meta( $post->ID, 'session_studio_id', true );
              $studio_args = array(
                  'post_type' => 'studio',
                  'p' => $postid
               );
              $studio_posts = new WP_Query($studio_args);
            ?> 
            <?php while($studio_posts->have_posts()) : $studio_posts->the_post() ?>
              <a href="<?php echo the_permalink();?>"><?php the_title();?></a>
            <?php endwhile; wp_reset_query(); ?>
          </td>
      </tr>
      <?php endwhile ?>
      </tbody>
    </table>
  </section>
    <?php else : ?>
  <section>
    <?php echo "<h2>Bookings <small>(Received)</small></h2>"; ?>
     <?php echo "<h4>You haven't received any Session Bookings yet.</h4>";?>
     <p>If you have a live profile share it on your Social Media profiles to promote your profile. We also recommend that you reach out to previous artists you've worked with and ask them to submit a review.</p> 
  </section>
     
  <?php endif; 
  wp_reset_query(); ?>


<?php // INVOICES
    $args = array(
        'post_type' => 'invoice',
        'post_status' => array('publish'),
        'posts_per_page' => -1,
        'order' => 'ASC'
     );
    $artist_posts = new WP_Query($args);
    
  ?>
<?php if($artist_posts->have_posts()) : ?>
<section>
  <?php echo "<h2>Invoices</h2>"; ?>
    <table class="table">
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Artist</th>
        <th>Contact</th>
        <!-- <th>Email</th> -->
        <th>Services</th>
        <!-- <th>Session Fee</th> -->
        <th>Start Date</th>
        <th># Songs</th>
        <th># Days</th>
        <!-- <th>Link</th> -->
        <th>Fee</th>
        <th style="display:none;">Studio</th>
      </tr>
    </thead>
    <tbody>
     <?php while($artist_posts->have_posts()) : $artist_posts->the_post() ?>
   
      <tr>
          <td><?php the_title() ?></td>
          <td><?php echo get_post_meta( $post->ID, 'artist_name', true ); ?></td>
          <td><a href="mailto:<?php echo the_author_meta( 'email');?>"><?php echo the_author_meta( 'display_name');?></a></td>
          <td><?php echo get_post_meta( $post->ID, 'services_needed', true ); ?> </td>
          <!-- <td><?php echo get_post_meta( $post->ID, 'session_fee', true ); ?> </td> -->
          <td><?php echo get_post_meta( $post->ID, 'proposed_start_date', true ); ?> </td>
          <td><?php echo get_post_meta( $post->ID, 'number_of_songs', true ); ?> </td>
          <td><?php echo get_post_meta( $post->ID, 'number_of_days', true ); ?> </td>
          <!-- <td><?php// echo get_post_meta( $post->ID, 'link_to_demo_or_previous_recordings', true ); ?> </td> -->
          <td>$<?php echo get_post_meta( $post->ID, 'session_quote', true ); ?> </td>
          <td style="display:none;">
            <?php
              $postid = get_post_meta( $post->ID, 'session_studio_id', true );
              $studio_args = array(
                  'post_type' => 'studio',
                  'p' => $postid
               );
              $studio_posts = new WP_Query($studio_args);
            ?> 
            <?php while($studio_posts->have_posts()) : $studio_posts->the_post() ?>
              <a href="<?php echo the_permalink();?>"><?php the_title();?></a>
            <?php endwhile; wp_reset_query(); ?>
          </td>
      </tr>
      <?php endwhile ?>
      </tbody>
    </table>
  </section>
    <?php else : ?>
  <section>
    <?php echo "<h2>Invoices</h2>"; ?>
     <?php echo "<h4>You haven't created any Invoices yet.</h4>";?>
  </section>
     
  <?php endif; 
  wp_reset_query(); ?>

<?php
    $args = array(
        'post_type' => 'session',
        'post_status' => array('publish'),
        'posts_per_page' => -1,
        'author' => $current_user->ID,
        'order' => 'ASC'
     );
    $artist_posts = new WP_Query($args);
  ?>
<?php if($artist_posts->have_posts()) : ?>
<section>
  <?php echo "<h2>Bookings <small>(Made)</small></h2>"; ?>
  <table class="table">
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Artist</th>
        <th>Contact</th>
        <!-- <th>Email</th> -->
        <th>Services</th>
        <!-- <th>Session Fee</th> -->
        <th>Start Date</th>
        <th># Songs</th>
        <th># Days</th>
        <!-- <th>Link</th> -->
        <th>Fee</th>
        <th>Studio</th>
      </tr>
    </thead>
    <tbody>

     <?php while($artist_posts->have_posts()) : $artist_posts->the_post() ?>
   
      <tr>
          <td><?php the_title() ?></td>
          
          <td><?php echo get_post_meta( $post->ID, 'artist_name', true ); ?></td>
          <td><a href="mailto:<?php echo the_author_meta( 'email');?>"><?php echo the_author_meta( 'display_name');?></a></td>
          <td><?php echo get_post_meta( $post->ID, 'services_needed', true ); ?> </td>
          <!-- <td><?php echo get_post_meta( $post->ID, 'session_fee', true ); ?> </td> -->
          <td><?php echo get_post_meta( $post->ID, 'proposed_start_date', true ); ?> </td>
          <td><?php echo get_post_meta( $post->ID, 'number_of_songs', true ); ?> </td>
          <td><?php echo get_post_meta( $post->ID, 'number_of_days', true ); ?> </td>
          <!-- <td><?php// echo get_post_meta( $post->ID, 'link_to_demo_or_previous_recordings', true ); ?> </td> -->
          <td>$<?php echo get_post_meta( $post->ID, 'session_quote', true ); ?> </td>
          <td>
            <?php
              $postid = get_post_meta( $post->ID, 'session_studio_id', true );
              $studio_args = array(
                  'post_type' => 'studio',
                  'p' => $postid
               );
              $studio_posts = new WP_Query($studio_args);
            ?> 
            <?php while($studio_posts->have_posts()) : $studio_posts->the_post() ?>
              <a href="<?php echo the_permalink();?>"><?php the_title();?></a>
            <?php endwhile; wp_reset_query(); ?>
          </td>
      </tr>  
     <?php endwhile ?>
   </tbody>
 </table>
 <a href="<?php echo site_url();?>/studios/near/"><button>Browse Studios</button></a>
</section>
     <?php else : ?>
<section>
   <?php echo "<h2>You haven't made any bookings with Trudio studios yet.</h2>";?>
   <?php echo '<a href="'.site_url() .'/advanced-search/" class="btn cta success">Browse Studios</a>'; ?>
<?php endif; wp_reset_query(); ?>
</section>

<section>
<?php
    $args = array(
        'post_type' => 'review',
        'post_status' => array('publish'),
        'posts_per_page' => -1,
        'author' => $current_user->ID,
        'order' => 'ASC'
     );
    $artist_posts = new WP_Query($args);
    
  ?>
    <?php echo '<div class="hidden"><h1>Manage Template</h1></div>'; ?>
    
    <?php // if($artist_posts->have_posts()) : ?>
      <?php echo "<h2>Reviews <small>(written)</small></h2>"; ?>
      <table class="table">
      <thead>
        <tr>
          <th>Review Title</th>
          <th>Edit</th>
          <th>View on Studio</th>
        </tr>
      </thead>
      <tbody>

       <?php while($artist_posts->have_posts()) : $artist_posts->the_post() ?>
      <?php $review_of_studio_id = get_post_meta( $post->ID, 'review_studio_id', true ); ?>
        <tr>
            <td><?php the_title() ?></td>
            <td><a href="/edit-review/?pid=<?php echo $post->ID;?>">Edit <i class="fa fa-pencil-square-o"></i></small></a></td>
            <td><a href="/?post_type=studio&amp;p=<?php echo $review_of_studio_id;?>">View <i class="fa fa-eye"></i></small></a></td>
        </tr>  
       <?php endwhile ?>
       <?php //else : ?>
       <?php //echo "<h2>You haven't written any Reviews yet.</h2>";?>
    <?php //endif; 
    wp_reset_query(); ?>
      </tbody>
  </table>
  <a href="<?php echo site_url();?>/studios/near/"><button>Browse Studios</button></a>
</section>

<?php } else{ ?>
<p>Please login to see your profile.</p>
<?php } ?>
