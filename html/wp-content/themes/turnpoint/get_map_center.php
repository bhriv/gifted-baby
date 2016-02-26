<?php
  // Get the users current location for centering the map 
    // try for updated lat lng
    // if not found, use the cookie value of lat lng
    // if not found, default to Los Angeles
  $user_lat = '';
  $user_lng = '';
  $user_lat = $_GET["lat"]; 
  $user_lng = $_GET["lng"];
  if ($user_lat == '' || $user_lng == '') {
    $user_lat = htmlspecialchars($_COOKIE["user_location_lat"]); 
    $user_lng = htmlspecialchars($_COOKIE["user_location_lng"]); 
    if ($user_lat == '' || $user_lng == '') {
      $user_lat = 34.052;
      $user_lng = -118.244;
    }
  };
?>