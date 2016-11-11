<script type="text/javascript">
var markersCarer = [];
var locationsCarer = [];
var markerPatientAttending = [];
var locationPatientAttending = [];
var markerPatientUnattended = [];
var locationPatientUnattended = [];

  function createMarker(markers,locations,type){
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

  function convertToLocations(locations){
    <?php
    foreach($patList as $patInfo){
    ?>
      var loc = {title: "<?php echo $patInfo->getPid(); ?>", location: {lat: parseFloat(<?php echo $patInfo->getLang(); ?>), lng: parseFloat(<?php echo $patInfo->getLong(); ?>)}};
       locations.push(loc);
    <?php
    }
    ?>

  }

  function convertToLocationsCarer(locations){
    <?php
    	foreach($carerList as $careInfo){
    		if(is_null($careInfo->getPatStatus())){
          ?>

          var loc = {title: "<?php echo $careInfo->getName(); ?>", location: {lat: parseFloat(<?php echo $careInfo->getLang(); ?>), lng: parseFloat(<?php echo $careInfo->getLong(); ?>)}};
          locations.push(loc);
          <?php
    		}
    	}
    ?>
  }

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

  function showListings(markers1) {
    var bounds = new google.maps.LatLngBounds();
    // Extend the boundaries of the map for each marker and display the marker
    for (var i = 0; i < markers1.length; i++) {
      markers1[i].setMap(map);
    //  bounds.extend(markers1[i].position);
    }

  //  map.fitBounds(bounds);
  }

</script>
