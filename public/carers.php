<!DOCTYPE html>
<html lang="en">

<head>
		<title>Mobile Care</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="css/maruti-style.css" />
		<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/style.css" />

	</head>
	<body>


<!--Header-part-->
<div id="header">
	<h2 style="color:white;position:relative;left:100px">Mobile Care</h2>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse"><ul class="nav">
    <li class="" ><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
    <li class=""><a title="" href="login.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->

		<div id="content">
			<div id="content-header">
			<div id="breadcrumb">
				<a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Carer</a>
			</div>

			</div>
    <div  class="quick-actions_homepage">
    	<ul class="quick-actions">
          <li> <a href="index.php"> <i class="icon-home"></i> Home </a> </li>
          <li> <a href="patients.php"> <i class="icon-client"></i> Patient </a> </li>
          <li> <a href="#"> <i class="icon-people"></i> Carer </a> </li>

    	</ul>
  	</div>

			<div class="container-fluid">

                <div class="row-fluid">
				<div class="span12">

						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-time"></i></span>
								<h5>Carer</h5>
							</div>
							<div class="widget-content nopadding">
								<!-- TODO TABLE PHP STUFF HERE -->
								<table class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>CarerID</th>
															<th>Name</th>
                              <th>Availability</th>
                              <th>Location</th>
                          </tr>
                      </thead>
                      <tbody>
												<?php
												$configs = include('config.php');
												$conn = mysqli_connect($configs["HOST"],$configs["USERNAME"],$configs["PASSWORD"],$configs["DATABASE"]);
												$sql = "Select CarerId, name, status, lon, lan From Carer";
												$result = mysqli_query($conn,$sql);
												// $tokens = array();
												if(mysqli_num_rows($result) > 0 ){

													while ($row = mysqli_fetch_assoc($result)) {
														$status ="";
														switch($row["status"]){
														case 0: $status="OFFLINE";
																		echo "<tr class='danger'>";
																		break;
														case 1: $status="ONLINE";
																		echo "<tr class='success'>";
																break;
														case 2: $status="ASSIGNED TASK";
															echo "<tr class='info'>";
																break;
														case 3: $status="BREAK";
														echo "<tr class='warning'>";
																break;
														}

														echo "<td>".$row["CarerId"]."</td>";
														echo "<td>".$row["name"]."</td>";

														echo "<td>".$status."</td>";
														echo "<td> latitude: ".$row["lan"]." longitude: ".$row["lon"]." </td>";
														echo "</tr>";
													}
												}
												mysqli_close($conn);
												?>
                      </tbody>
                  </table>
							</div>
						</div>
				</div>
				 </div>
			</div>
		</div>
		<div class="row-fluid">
		      <div id="footer" class="span12"> 2016 &copy; Mobile Care </div>
		    </div>

            <script src="js/jquery.min.js"></script>
            <script src="js/jquery.ui.custom.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/maruti.js"></script>
	</body>

</html>
