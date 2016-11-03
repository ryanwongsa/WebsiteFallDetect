<?php

require "fetchfalls.php";
$falls =getFalls();
$carers = getCarers();
?>

<script type="text/javascript">
  var falls = <?php echo json_encode($falls);?>;
  var carers = <?php echo json_encode($carers);?>;
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

    convertToLocations(locationPatientAttending,falls);

    // TODO
    // If I want to run both of these methods below in the index.php page, how would I do this in php?
    createMarker(markerPatientAttending,locationPatientAttending,"A");
    // showListings(markerPatientAttending);

    convertToLocations(locationsCarer,carers);

    createMarker(markersCarer,locationsCarer,"C");
    showListings(markersCarer,markerPatientAttending);

  }

  //
  function createMarker(markers,locations,type){
    // The following group uses the location array to create an array of markers on initialize.
    var largeInfowindow = new google.maps.InfoWindow();
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
  function showListings(markers1,markers2) {
    var bounds = new google.maps.LatLngBounds();
    // Extend the boundaries of the map for each marker and display the marker
    for (var i = 0; i < markers1.length; i++) {
      markers1[i].setMap(map);
      bounds.extend(markers1[i].position);
    }
    for (var i = 0; i < markers2.length; i++) {
      markers2[i].setMap(map);
      bounds.extend(markers2[i].position);
    }

    map.fitBounds(bounds);
  }
</script>
