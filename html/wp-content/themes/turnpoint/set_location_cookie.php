<?php // set_location_cookie ?>
<script type="text/javascript">
  // get users location and center map based on their coordinates
   var user_location_data=document.getElementById("geoDemo");
   var user_location_link=document.getElementById("view_studios");

   function getLocation()
     {
     if (navigator.geolocation)
       {
       navigator.geolocation.getCurrentPosition(showPosition,showError);
       }
     else{
        user_location_data.innerHTML="Geolocation is not supported by this browser. The map center has defaulted to Los Angeles.";
        alert("Geolocation not supported by this browser so we can't center the map to your location.");
      }
     }
   function showPosition(position)
     {           
      var user_position = position.coords.latitude + "," + position.coords.longitude;  
      // http://bhriv.local:5757/%22%20+%20user_position_link%20+%20%22
      var user_position_link = "/studios/near/?lat=" + position.coords.latitude + "&lng=" + position.coords.longitude;
      var user_location_content = "<p><a href='" + user_position_link + "'><button><i class='fa fa-map-marker'></i> View Studios Near You</button></a></p><p>or,</p>";
      // , or filter by genre, service and rate: <a href='" + user_position_link + "'>Advanced Search <i class='fa fa-arrow-circle-right'></i></a>
      // alert(user_position_link);
      // alert(user_location_content);
      user_location_data.innerHTML= user_position;
      user_location_link.innerHTML= user_location_content;
     }
   function showError(error)
     {
     switch(error.code) 
       {
       case error.PERMISSION_DENIED:
         alert("Request for current location denied. The map center has defaulted to Los Angeles.");
         break;
       case error.POSITION_UNAVAILABLE:
         alert("Location information is unavailable. The map center has defaulted to Los Angeles.");
         break;
       case error.TIMEOUT:
         alert("The request to get user location timed out. The map center has defaulted to Los Angeles.");
         break;
       case error.UNKNOWN_ERROR:
         alert("An unknown error occurred. The map center has defaulted to Los Angeles.");
         break;
       }
     }
     // setTimeout(getLocation,5000);
     getLocation();
  </script>