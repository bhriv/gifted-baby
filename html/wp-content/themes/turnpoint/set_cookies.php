<?php
  // Hard reset all cookies
  // $blank = "";
  // setcookie("Cookie_1hour", $blank, time()-3600, "/");
  // setcookie("Cookie_1minute", $blank, time()-3600, "/");
  // setcookie("Cookie_value_site_has_been_viewed", $blank, time()-3600, "/");
  // setcookie("Cookie_my_first_view_url", $blank, time()-3600, "/");

// Cookies basic
  // $value = 'cookie_expire_1hour';
  // setcookie("Cookie_1hour", $value, time()+3600, "/"); // cookie name, cookie value, time to expire (3600 = 1 hour), accessible on all pages, accessible on subdomains, http request only

  // $value = 'cookie_expire_1minute';
  // setcookie("Cookie_1minute", $value, time()+60, "/"); // cookie name, cookie value, time to expire (3600 = 1 hour), accessible on all pages, accessible on subdomains, http request only

  // debug UNSET
  // unset("Cookie_value_site_has_been_viewed","",time()-3600, "/");
  // set a cookie for the first view
  $value_site_has_been_viewed = 'site_has_been_viewed_1';
  setcookie("Cookie_value_site_has_been_viewed_1", $value_site_has_been_viewed, time()+3600, "/");
  
  // if (!isset($_COOKIE['Cookie_value_site_has_been_viewed'])) { // should be !
  //   $value_my_first_view_url = $_SERVER['REQUEST_URI'];
  //   setcookie("Cookie_my_first_view_url", $value_my_first_view_url, time()+3600, "/"); // 1 min save
  // }

  // if the lat lng is not already set then set the value, if the cookie is blank, then update the cookie
  if ( !isset($_COOKIE['user_location_lat']) ) {
    $user_lat = $_GET["lat"]; 
    $user_lng = $_GET["lng"]; 
    setcookie("user_location_lat", $user_lat, time()+3600, "/");
    setcookie("user_location_lng", $user_lng, time()+3600, "/");
  }
 
   if (!isset($_COOKIE['Cookie_value_site_has_been_viewed_1'])) {
    $value_my_first_view_url_1 = $_SERVER['REQUEST_URI'];
    setcookie("Cookie_my_first_view_url_1", $value_my_first_view_url_1, time()+3600, "/"); 
  }
 
  // only set the first view cookie once

// set the cookies array
  // setcookie("cookie[three]", "cookiethree");
  // setcookie("cookie[two]", "cookietwo");
  // setcookie("cookie[one]", "cookieone");

?>