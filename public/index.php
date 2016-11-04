<!DOCTYPE html style="height:100%">
<html lang="en">

<head>

<title>Mobile Care</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/maruti-style.css" />
<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
<script type='text/javascript' src='config.js'></script> <!-- config file for google maps api key-->
</head>
<body>

<!--Header-part-->
<div id="header">
  <h2 style="color:white;position:relative;left:100px">Mobile Care</h2>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class="" ><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
          <li> <a href="index.html"> <i class="icon-home"></i> Home </a> </li>
          <li> <a href="patients.html"> <i class="icon-client"></i> Patient </a> </li>
          <li> <a href="carers.html"> <i class="icon-people"></i> Carer </a> </li>
    </ul>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12" style="display:inline">
        <div class="widget-box" style="width:40%;float:left">
          <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Patient Status</h5>
            <div class="selects" style="float:right"> <select>
            <option value="unattend">unattend</option>
            <option value="attending">attending</option>
            <option value="completed">completed</option>
            </select></div>
          </div>
          <div class="widget-content" >
            <div class="row-fluid">
              <div class="span12">
                <!-- <div class="chart"></div> -->
              </div>
            </div>
          </div>
        </div>

    <div id="map" style="height:80%;width:55%;float:right"></div>
    <?php
      include "mapfunction.php";
      // echo "<script type='text/javascript' src='markerFunctions.js'></script>";
    ?>
    <div>
      <input id="show-listings" type="button" value="Show Listings">
      <input id="hide-listings" type="button" value="Hide Listings">
      <input id="send-to-phone" type="button" onclick="echoHello()" value="Send to Phone">
    </div>


      <script async defer src='https://maps.googleapis.com/maps/api/js?v=3&callback=initMap&key='+config.Google_Maps_API_Key></script>

      </div>
      <?php
        include "push_notification.php";
        // echo "<script type='text/javascript' src='markerFunctions.js'></script>";
      ?>
    </div>
  </div>
</div>

<div class="row-fluid">
      <div id="footer" class="span12"> 2016 &copy; Mobile Care </div>
    </div>
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/maruti.js"></script>
<script src="js/maruti.dashboard.js"></script>
<script src="js/maruti.chat.js"></script>
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>

</html>
