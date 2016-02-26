<div id="left_side">
  <section>
    <div id="map"></div>
    <style type="text/css">#map{min-height: 700px !important;display: block;}</style>
    <?php include_once( get_stylesheet_directory() . '/get_map_center.php'); ?>
    <script>
    $(document).ready(function(){
        var map = L.mapbox.map( 'map', 'virtualunrest.hmjo6i88', {zoomControl: true, center: [<?= $user_lat ?>, <?= $user_lng ?>], zoom: 10, minZoom: 2, maxZoom:11 });
        var defaultIcon = L.icon({
              iconUrl:        'https://d2xcq4qphg1ge9.cloudfront.net/assets/2976/2475429/original_trudio-icon-20x20.png',
              iconSize:       [ 20, 20 ],
              popupAnchor:    [ 0, -7 ]
          });