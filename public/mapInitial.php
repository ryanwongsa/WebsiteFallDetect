<script type="text/javascript">
  var map;
  var markersCarer = [];
  var locationsCarer = [];
  var markerPatientAttending = [];
  var locationPatientAttending = [];
  var markerPatientUnattended = [];
  var locationPatientUnattended = [];
  var markerPatientCompleted = [];
  var locationPatientCompleted = [];

  function initMap() {
    // Constructor creates a new map - only center and zoom are required.
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 55.8642, lng: -4.2518},
      zoom: 13,
      mapTypeControl: false
    });
  }


</script>
