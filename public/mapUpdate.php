<script type="text/javascript">
var markersCarer = [];
var locationsCarer = [];
var markerPatientAttending = [];
var locationPatientAttending = [];
var markerPatientUnattended = [];
var locationPatientUnattended = [];
var markerPatientCompleted = [];
var locationPatientCompleted = [];

  function createMarker(markers,locations,type){
    var largeInfowindow = new google.maps.InfoWindow();
    for (var i = 0; i < locations.length; i++) {
      // Get the position from the location array.

      var position = locations[i].location;
      var title = locations[i].title;
      var typeFull="";
      var statusF="";
      // Create a marker per location, and put into markers array.
      var icon="http://maps.google.com/mapfiles/ms/icons/red-dot.png";
      if(type=="C"){
        icon = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
        typeFull ="Carer";
      }
      else if(type=="U"){
        icon="http://maps.google.com/mapfiles/ms/icons/green-dot.png";
        typeFull ="Unattended";
      }
      else if(type=="A"){
        icon="http://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
        typeFull ="Attending";
      }
      else{
        icon="http://maps.google.com/mapfiles/ms/icons/red-dot.png";
        typeFull ="Completed";
      }
       var marker = new google.maps.Marker({
        position: position,
        title: title,
        typeF: typeFull,
        status: statusF,
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
      infowindow.setContent('<div><h5>'+marker.typeF+'</h5><b>ID:</b>' + marker.title +'</div>');
      infowindow.open(map, marker);
      // Make sure the marker property is cleared if the infowindow is closed.
      infowindow.addListener('closeclick', function() {
        infowindow.marker = null;
      });
    }
  }

  function showMarkers(markers1,markers2,markers3,markers4) {
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

    for (var i = 0; i < markers3.length; i++) {
      markers3[i].setMap(map);
     bounds.extend(markers3[i].position);
    }

    for (var i = 0; i < markers4.length; i++) {
      markers4[i].setMap(map);
     bounds.extend(markers4[i].position);
    }

   map.fitBounds(bounds);
  }

  function removeMarkers(markers1,markers2,markers3,markers4) {
    var bounds = new google.maps.LatLngBounds();
    // Extend the boundaries of the map for each marker and display the marker
    for (var i = 0; i < markers1.length; i++) {
      markers1[i].setMap(null);
     bounds.extend(markers1[i].position);
    }

    for (var i = 0; i < markers2.length; i++) {
      markers2[i].setMap(null);
     bounds.extend(markers2[i].position);
    }

    for (var i = 0; i < markers3.length; i++) {
      markers3[i].setMap(null);
     bounds.extend(markers3[i].position);
    }

    for (var i = 0; i < markers4.length; i++) {
      markers4[i].setMap(null);
     bounds.extend(markers4[i].position);
    }

   map.fitBounds(bounds);

   locationPatientUnattended = [];
   locationPatientAttending = [];
   markerPatientUnattended = [];
   locationPatientCompleted = [];
   markerPatientCompleted = [];
   markerPatientAttending = [];
   markersCarer = [];
   locationsCarer = [];
  }

</script>
