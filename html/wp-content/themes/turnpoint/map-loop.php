<div class="wrapper">
  <?php if( have_posts() ): ?>
  <header>
    <div>
      <h1 class="tax_title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );if ( is_tax() ) { echo '<em>' .$term->name.'</em>'; }?> Recording Studios</h1>
      <div id="filter_view">
        <a href="#">
          <big><i class="fa fa-sliders"></i></big>
          <span id="show_filter">Show Filter <i class="fa fa-caret-down"></i></span>
          <span id="hide_filter" class="hidden">Hide  Filter <i class="fa fa-caret-up"></i></span>
        </a>
      </div>
    </div>
    <div class="clearfix"></div>
    <section id="filter_results" class="hidden">
      <div id="search_filter">
      <?php include_once( get_stylesheet_directory() . '/filter_form.php'); ?>
      </div>
    </section>
    <div class="clearfix"></div>
    <ul class="accordion-tabs-minimal" id="toggle_views">
      <li class="tab-header-and-content" id="map_view">
        <a href="#" class="tab-link is-active"><h5><i class="fa fa-map-marker"></i> Map View</h5><small>Results Near You</small></a>
      </li>
      <li class="tab-header-and-content" id="list_view">
        <a href="#" class="tab-link"><h5><i class="fa fa-list-ul"></i> List View</h5><small>All Search Results</small></a>
      </li>
    </ul>
    <div class="clearfix"></div> 
  </header>
  <?php 
    else : echo "<h2>To find studios use the Filter or Search Box</h2>";
    endif;
  ?>
  <?php 
    // Prepare the loop for the Map to show all Protest locations
    $map_args = array(
      'post_status' => 'publish',
      'post_type' => 'studio',
      'order' => 'ASC',
      'posts_per_page' => -1,
      'meta_query' => array(
         array(
              'key' => 'studio_location_city',
              'value' => '',
              'compare' => '!='
           )
      ),
    );
    $map_posts = new WP_Query($map_args);
  ?>
  <div id="left_side">
    <section>
      <!-- <p><i class="fa fa-eye"></i> Studios in your current location are displayed on the map. Zoom out to see studios in other locations.</p> -->
      <div id="map"></div>
      <style type="text/css">#map{min-height: 700px !important;display: block;}</style>
      <?php  
        // debug
          //print_r($_COOKIE); 
        
        // Get the users current location for centering the map 
        // try for updated lat lng via GET Method
        $user_lat = $_GET["lat"]; 
        $user_lng = $_GET["lng"]; 
        // if not found, use the cookie value of lat lng
        if ($user_lat == '') {
          if ( isset($_COOKIE['user_location_lat']) ) 
          { 
            $user_lat = htmlspecialchars($_COOKIE["user_location_lat"]);
            $user_lng = htmlspecialchars($_COOKIE["user_location_lng"]); 
          }
          else{
            $user_lat = 34.052;
            $user_lng = -118.244;
          }
        }
        // debug
        // echo $user_lat;
      ?>
      <script>
      $(document).ready(function(){
          var map = L.mapbox.map( 'map', 'virtualunrest.hmjo6i88', {zoomControl: true, center: [<?= $user_lat ?>, <?= $user_lng ?>], zoom: 10, minZoom: 2, maxZoom:11 });
          var defaultIcon = L.icon({
                iconUrl:        'https://d2xcq4qphg1ge9.cloudfront.net/assets/2976/2475429/original_trudio-icon-20x20.png',
                iconSize:       [ 20, 20 ],
                popupAnchor:    [ 0, -7 ]
            });
    <?php while (have_posts()) : the_post(); ?>
      <?php // include_once( get_stylesheet_directory() . '/map_loop_middle.php'); ?>
      <?php  
          $offer_latlong_values = get_post_meta( get_the_ID(), 'studio_location_street_address', true );
          $bgmp_address_lat = stristr($offer_latlong_values, ',', true); // As of PHP 5.3.0, 
          $bgmp_address_long = stristr($offer_latlong_values, ',');
          $bgmp_address_long_clean = str_replace(",","",$bgmp_address_long);
          $show_gig_on_map = $bgmp_address_lat ."," .$bgmp_address_long_clean;
        ?>
      <?php # @TODO - Add User Location Marker to Map ?>
           L.marker([ <?php echo $show_gig_on_map; ?> ], { icon: defaultIcon }).addTo(map).bindPopup('<?php $post_id = get_the_ID(); ?><div class="card_profile"><div class="card-image slider_holder"><div class="studio_overview"><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><h1><?php the_title();?></h1></a></div><ul class="rslides"><li><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><?php echo get_the_post_thumbnail(); ?></a></li></ul><div class="card_rate">$<?php echo get_post_meta( $post_id, "studio_day_rate", true ); ?></div></div><div class="card-header"><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><i class="fa fa-map-marker"></i> <?php echo get_post_meta( $post_id, "studio_location_city", true ); ?></a></div><div class="card-copy"><ul class="key_terms"><li><ul><li><h2><i class="fa fa-music"></i> Genres</h2></li><?php the_terms( $post->ID, "genre", "<li><h2>", "<h2>", "</h2></li>" ); ?></ul></li><li><ul><li><h2><i class="fa fa-file-sound-o"></i> Services</h2></li><?php the_terms( $post->ID, "service", "<li><h2>", "<li><h2>", "</h2></li>" ); ?></ul></li></ul></div></div>');
    <?php endwhile; ?>
  <?php // include_once( get_stylesheet_directory() . '/map_loop_bottom.php'); ?>
    });
      </script>
      <footer>
        <!-- <h5>Studio Matches in Your Area</h5> -->
        <p><i class="fa fa-eye"></i> Zoom in to see all studios located in the same city. Zoom out to see studios in other areas.</p>
      </footer>
    </section>
  </div>
  <div id="right_side" class="hidden">
    <section id="map_results">
      <?php if( have_posts() ): $card_count = 0; ?>
      <div class="card_deck">
    <?php while (have_posts()) : the_post(); $card_count++; ?>
      <?php $post_id = get_the_ID(); ?>
          <div class="card_profile" id="card-<?= $card_count ?>">
            <?php $is_featured = get_post_meta( $post_id, 'studio_featured', true ); ?>
            <?php if ($is_featured != '') { ?>
            <a href="<?php echo the_permalink() ?>" title="Recording Studio - <?php the_title();?>">
              <div class="ribbon-wrapper"><div class="ribbon">FEATURED</div></div>
            </a>
            <?php } ?>
            <div class="card-image slider_holder">
                <div class="studio_overview">
                  <a href="<?php echo the_permalink() ?>" title="Recording Studio - <?php the_title();?>">
                    <h1><?php the_title();?></h1>
                  </a>
                </div>
                <ul class="rslides">
                  <li>
                    <a href="<?php echo the_permalink() ?>" title="Recording Studio - <?php the_title();?>">
                      <?php echo get_the_post_thumbnail( $post_id, 'thumbnail' ); ?>
                    </a>
                  </li>
                  <?php 
                    $images = get_post_meta( $post->ID, 'studio_image_gallery' );
                    if ( $images ) {
                        foreach ( $images as $attachment_id ) {
                            // $thumb = wp_get_attachment_image( $attachment_id, 'full' );
                            $thumb = wp_get_attachment_image( $attachment_id, 'thumbnail' );
                            $permalink = get_permalink();
                            $full_size = wp_get_attachment_url( $attachment_id );
                            // print_r($full_size);
                            printf( '<li><a href="%s">%s</a></li>', $permalink, $thumb );
                        }?>
                    <script type="text/javascript">$("#card-<?= $card_count ?> .rslides").responsiveSlides({speed: 1000,auto: false,nav: true});</script>
                  <?php           
                    }
                  ?>
                </ul>
                <?php $rate = get_post_meta( $post->ID, 'hide_my_day_rate', true ); ?>
                <?php if ($rate != 'Yes - do not let users see my day rate.') { ?>
                  <div class="card_rate">$<?php echo get_post_meta( $post_id, 'studio_day_rate', true ); ?></div>
                <?php } ?>
                <?php //include_once('key_terms.php'); ?>
            </div>
            <div class="card-header">
              <a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>">
                <?php 
                    $the_city = get_the_terms( $post_id, 'location_city');
                   if ( !empty( $the_city ) && !is_wp_error( $the_city ) ){
                       foreach ( $the_city as $term ) {
                         echo '<i class="fa fa-map-marker"></i> '.$term->name;
                       }
                   }else{
                    echo '<i class="fa fa-map-marker"></i> '.get_post_meta( $post_id, 'studio_location_city', true );
                   }
                   $the_state = get_the_terms( $post_id, 'location_state');
                   if ( !empty( $the_state ) && !is_wp_error( $the_state ) ){
                       foreach ( $the_state as $term ) {
                         echo ' - '.$term->name;
                       }
                   }
                ?>
              </a>
            </div>
            <div class="card-copy">
              <ul class="key_terms">
                <li>
                  <ul>
                    <li><h2><i class="fa fa-music"></i> Genres</h2></li>
                    <?php the_terms( $post->ID, "genre", "<li><h2>", "<h2>", "</h2></li>" ); ?>    
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><h2><i class="fa fa-file-sound-o"></i> Services</h2></li>
                    <?php the_terms( $post->ID, "service", "<li><h2>", "<li><h2>", "</h2></li>" ); ?>
                  </ul>  
                </li>
              </ul>
            </div>
          </div>
        <?php
        endwhile; ?>
      </div>
      <?php 
        else : echo "<h2>To find studios use the Filter or Search Box</h2>";
        endif;
    ?>
    </section>
  </div>
</div>