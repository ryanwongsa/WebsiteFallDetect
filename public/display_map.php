<?php

require "fetchfalls.php";
$falls =getFalls();
// foreach ($falls as &$value) {
// 	foreach ($value as &$element) {
//       echo $element,"\n";
//     }
// }
?>

<script type="text/javascript">
  var falls = <?php echo json_encode($falls);?>;
</script>

<html>
 <head>
   <script type='text/javascript' src='config.js'></script>
   <style type="text/css">
     #map { height: 100%; }
   </style>
 </head>
 <body>

     <div id="map"></div>
     <!-- <script src="js/initialise-map.js"></script> -->
     <script>
       var map;
       // Create a new blank array for all the listing markers.
       var markersCarer = [];
       var locationsCarer = [];
       var markerPatientAttending = [];
       var locationPatientAttending = [];
       var markerPatientUnattended = [];
       var locationPatientUnattended = [];
       function initMap() {
         // Constructor creates a new map - only center and zoom are required.
         map = new google.maps.Map(document.getElementById('map'), {
           center: {lat: 55.8642, lng: -4.2518},
           zoom: 13,
           mapTypeControl: false
         });

         convertToLocations(locationsCarer,falls);

         var largeInfowindow = new google.maps.InfoWindow();

         createMarker(markersCarer,locationsCarer,"U");

         showListings(markersCarer);
       }
       //
       function createMarker(markers,locations,type){
         // The following group uses the location array to create an array of markers on initialize.
         for (var i = 0; i < locations.length; i++) {
           // Get the position from the location array.

           var position = locations[i].location;
           var title = locations[i].title;
           // Create a marker per location, and put into markers array.
           var icon="http://maps.google.com/mapfiles/ms/icons/red-dot.png";
           if(type=="C"){
             icon = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
           }
           else if(type=="U"){
             icon="http://maps.google.com/mapfiles/ms/icons/green-dot.png";
           }
           else if(type=="A"){
             icon="http://maps.google.com/mapfiles/ms/icons/green-dot.png";
           }
            var marker = new google.maps.Marker({
             position: position,
             title: title,
             icon: icon,
             animation: google.maps.Animation.DROP,
             id: i
           });

           // Push the marker to our array of markers.

           markers.push(marker);
           // Create an onclick event to open an infowindow at each marker.
           marker.addListener('click', function() {
             populateInfoWindow(this, largeInfowindow);
           });
          }
       }
       //
       function convertToLocations(locations,falls){
         for (var i = 0; i < falls.length; i++) {
           var loc = {title: falls[i][0], location: {lat: parseFloat(falls[i][1]), lng: parseFloat(falls[i][2])}};
            locations.push(loc);
         };
       }
       // This function populates the infowindow when the marker is clicked. We'll only allow
       // one infowindow which will open at the marker that is clicked, and populate based
       // on that markers position.
       function populateInfoWindow(marker, infowindow) {
         // Check to make sure the infowindow is not already opened on this marker.
         if (infowindow.marker != marker) {
           infowindow.marker = marker;
           infowindow.setContent('<div>' + marker.title + '</div>');
           infowindow.open(map, marker);
           // Make sure the marker property is cleared if the infowindow is closed.
           infowindow.addListener('closeclick', function() {
             infowindow.marker = null;
           });
         }
       }
       // This function will loop through the markers array and display them all.
       function showListings(markers) {
         var bounds = new google.maps.LatLngBounds();
         // Extend the boundaries of the map for each marker and display the marker
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(map);
           bounds.extend(markers[i].position);
         }
         map.fitBounds(bounds);
       }

     </script>
   <script async defer
         src='https://maps.googleapis.com/maps/api/js?v=3&callback=initMap&key='+config.Google_Maps_API_Key>
    </script>

 </body>
</html>
