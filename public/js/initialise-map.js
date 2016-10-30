var map;
function initMap() {
  // plots map
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 55.8642, lng: -4.2518},
    zoom: 13
  });
  // plots markers on map
  var uog = {lat: 55.8734, lng: -4.2891};
  var marker = new google.maps.Marker({
    position: uog,
    map: map,
    title: 'University of Glasgow'
  });
}
