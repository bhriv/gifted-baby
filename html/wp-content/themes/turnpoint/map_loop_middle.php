<?php  
        $offer_latlong_values = get_post_meta( get_the_ID(), 'studio_location_street_address', true );
        $bgmp_address_lat = stristr($offer_latlong_values, ',', true); // As of PHP 5.3.0, 
        $bgmp_address_long = stristr($offer_latlong_values, ',');
        $bgmp_address_long_clean = str_replace(",","",$bgmp_address_long);
        $show_gig_on_map = $bgmp_address_lat ."," .$bgmp_address_long_clean;
      ?>
    <?php # @TODO - Add User Location Marker to Map ?>
         L.marker([ <?php echo $show_gig_on_map; ?> ], { icon: defaultIcon }).addTo(map).bindPopup('<?php $post_id = get_the_ID(); ?><div class="card_profile"><div class="card-image slider_holder"><div class="studio_overview"><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><h1><?php the_title();?></h1></a></div><ul class="rslides"><li><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><?php echo get_the_post_thumbnail(); ?></a></li></ul><div class="card_rate">$<?php echo get_post_meta( $post_id, "studio_day_rate", true ); ?></div></div><div class="card-header"><a href="<?php echo the_permalink() ?>" title="Studio - <?php the_title();?>"><i class="fa fa-map-marker"></i> <?php echo get_post_meta( $post_id, "studio_location_city", true ); ?></a></div><div class="card-copy"><ul class="key_terms"><li><ul><li><h2><i class="fa fa-music"></i> Genres</h2></li><?php the_terms( $post->ID, "genre", "<li><h2>", "<h2>", "</h2></li>" ); ?></ul></li><li><ul><li><h2><i class="fa fa-file-sound-o"></i> Services</h2></li><?php the_terms( $post->ID, "service", "<li><h2>", "<li><h2>", "</h2></li>" ); ?></ul></li></ul></div></div>');