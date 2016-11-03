function createMarker(markers,locations,type,map){
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
      populateInfoWindow(this, largeInfowindow,map);
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
function populateInfoWindow(marker, infowindow,map) {
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
function showListings(markers,map) {
  var bounds = new google.maps.LatLngBounds();
  // Extend the boundaries of the map for each marker and display the marker
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
    bounds.extend(markers[i].position);
  }
  map.fitBounds(bounds);
}
