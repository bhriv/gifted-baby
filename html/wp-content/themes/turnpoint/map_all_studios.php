<?php 
    // Prepare the loop for the Map to show all Protest locations
    $map_args = array(
      'post_status' => 'publish',
      'post_type' => 'studio',
      'order' => 'ASC',
      'meta_query' => array(
         array(
              'key' => 'studio_location_city',
              'value' => '',
              'compare' => '!='
           )
      ),
      'posts_per_page' => -1
    );
    $map_posts = new WP_Query($map_args);
?>
  <?php  
      // debug
        //print_r($_COOKIE); 
      
      // Get the users current location for centering the map 
      // try for updated lat lng via GET Method
      $user_lat = $_GET["lat"]; 
      $user_lng = $_GET["lng"]; 
      // if not found, use the cookie value of lat lng
      if ( isset($_COOKIE['user_location_lat']) || $user_lat == '') 
      { 
        $user_lat = htmlspecialchars($_COOKIE["user_location_lat"]);
        $user_lng = htmlspecialchars($_COOKIE["user_location_lng"]); 
      }else{ // if not found, default to Los Angeles
        $user_lat = 34.052;
          $user_lng = -118.244;
        }
    ?>
  <script>
    $(document).ready(function(){
      <?php include_once( get_stylesheet_directory() . '/get_map_center.php'); ?>
      var map = L.mapbox.map( 'map', 'virtualunrest.hmjo6i88', {zoomControl: true, center: [<?= $user_lat ?>, <?= $user_lng ?>], zoom: 10, minZoom: 2, maxZoom:11 });
      var defaultIcon = L.icon({
          iconUrl:        'https://d2xcq4qphg1ge9.cloudfront.net/assets/2976/2475429/original_trudio-icon-20x20.png',
          iconSize:       [ 20, 20 ],
          popupAnchor:    [ 0, -7 ]
        });
<?php  while( $map_posts->have_posts() ) : $map_posts->the_post(); ?>
        <?php  
          $offer_latlong_values = get_post_meta( get_the_ID(), 'studio_location_street_address', true );
          $bgmp_address_lat = stristr($offer_latlong_values, ',', true); // As of PHP 5.3.0, 
          $bgmp_address_long = stristr($offer_latlong_values, ',');
          $bgmp_address_long_clean = str_replace(",","",$bgmp_address_long);
          $show_gig_on_map = $bgmp_address_lat ."," .$bgmp_address_long_clean;
        ?>
         L.marker([ <?php echo $show_gig_on_map; ?> ], { icon: defaultIcon }).addTo(map).bindPopup('<?php $post_id = get_the_ID(); ?><div class="card_profile"><div class="card-image slider_holder"><div class="studio_overview"><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><h1><?php the_title();?></h1></a></div><ul class="rslides"><li><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><?php echo get_the_post_thumbnail(); ?></a></li></ul><div class="card_rate">$<?php echo get_post_meta( $post_id, "studio_day_rate", true ); ?></div></div><div class="card-header"><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><i class="fa fa-map-marker"></i> <?php echo get_post_meta( $post_id, "studio_location_city", true ); ?></a></div><div class="card-copy"><ul class="key_terms"><li><ul><li><h2><i class="fa fa-music"></i> Genres</h2></li><?php the_terms( $post->ID, "genre", "<li><h2>", "<h2>", "</h2></li>" ); ?></ul></li><li><ul><li><h2><i class="fa fa-file-sound-o"></i> Services</h2></li><?php the_terms( $post->ID, "service", "<li><h2>", "<li><h2>", "</h2></li>" ); ?></ul></li></ul></div></div>');
  <?php endwhile; ?>
        });
  </script>