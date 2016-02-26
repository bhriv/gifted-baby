<?php 
  /* Vegas Full Screen Background Rotator
  * - add Page titles
  * - styles imported via screen.scss
  *
  */

  /*
  * { src:'/vendor/vegas/images/studiopic1.jpg', fade:1000 },
  * { src:'/vendor/vegas/images/gigpig.jpg', fade:2000 },
  * { src:'/vendor/vegas/images/studiopic.jpg', fade:2000 }
  * src:'/vendor/vegas/overlays/13.png'
  */
  if ( is_page(array('Home')) ) { ?>
  <script type="text/javascript">
    $(function() {
      $.vegas('slideshow', {
        backgrounds:[
          { src:'https://d2xcq4qphg1ge9.cloudfront.net/assets/2976/2564678/original_studiopic1.jpg', fade:1000 },
          { src:'https://d2xcq4qphg1ge9.cloudfront.net/assets/2976/2564676/original_gigpig.jpg', fade:2000 },
          { src:'https://d2xcq4qphg1ge9.cloudfront.net/assets/2976/2564677/original_studiopic.jpg', fade:2000 }
        ]
      })('overlay', {
        src:'https://d2xcq4qphg1ge9.cloudfront.net/assets/2976/2562777/original_13.png'
      });
    });

  </script>
<?php } ?>

<?php 
  # Assumes lib.php > LOCATION_PICKER
  # Assumes User Front End > Add Action > LOCATION_PICKER
  # Required no jquery conflicts, load google maps api in header
  # load before wp_footer
  if (is_page(array('Pick Location', 386))) 
  {  ?>
    <script src="/vendor/jquery-geocomplete/jquery.geocomplete.js"></script>
    <script>
        // Geocomplete Google Map Places
        $(function(){
            $("#geocomplete").geocomplete(
                {
                    map: ".map_canvas",
                    details: ".geocomplete",
                    detailsAttribute: "data-geo",
                    types: ["geocode", "establishment"],
                }
            );
        });
        $( "input[name='wpuf_accept_toc']" ).click(function() {
          // alert( "Handler for .click() called." );

          var point_of_interest = $('input[name="geo[point_of_interest]"]').val();
          $('#point_of_interest').val(point_of_interest);

          var lat = $('input[name="geo[lat]"]').val();
          $('#lat').val(point_of_interest);

          var lng = $('input[name="geo[lng]"]').val();
          $('#lng').val(lng);

          var location = $('input[name="geo[location]"]').val();
          $('#location').val(location);

          var location_type = $('input[name="geo[location_type]"]').val();
          $('#location_type').val(location_type);

          var formatted_address = $('input[name="geo[formatted_address]"]').val();
          $('#formatted_address').val(formatted_address);

          var bounds = $('input[name="geo[bounds]"]').val();
          $('#bounds').val(bounds);

          var viewport = $('input[name="geo[viewport]"]').val();
          $('#viewport').val(viewport);

          var route = $('input[name="geo[route]"]').val();
          $('#route').val(route);

          var street_number = $('input[name="geo[street_number]"]').val();
          $('#street_number').val(street_number);

          var postal_code = $('input[name="geo[postal_code]"]').val();
          $('#postal_code').val(postal_code);

          var locality = $('input[name="geo[locality]"]').val();
          $('#locality').val(locality);

          var sublocality = $('input[name="geo[sublocality]"]').val();
          $('#sublocality').val(sublocality);           

          var country = $('input[name="geo[country]"]').val();
          $('#country').val(country);           

          var country_short = $('input[name="geo[country_short]"]').val();
          $('#country_short').val(country_short);           

          var sublocality = $('input[name="geo[sublocality]"]').val();
          $('#sublocality').val(sublocality);           

          var administrative_area_level_1 = $('input[name="geo[administrative_area_level_1]"]').val();
          $('#administrative_area_level_1').val(administrative_area_level_1);  

        var geo_id = $('input[name="geo[id]"]').val();
        $('#geo_id').val(geo_id);  

          var reference = $('input[name="geo[reference]"]').val();
          $('#reference').val(reference);  

          var geo_url = $('input[name="geo[url]"]').val();
          $('#geo_url').val(geo_url);  

          var geo_website = $('input[name="geo[website]"]').val();
          $('#geo_website').val(geo_website); 

          // alert('geo[city] = ' +geo_city +' geo[state] = ' +geo_state);
          // $('#location_city').val(geo_city);
          // $('#location_state').val(geo_state);
        });
    </script>
<?php 
  } 
?>
