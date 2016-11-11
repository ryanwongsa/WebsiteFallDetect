<!DOCTYPE html>
<html lang="en">
<head>
		<title>Mobile Care</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="css/maruti-style.css" />
		<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
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
				<div id="breadcrumb"><a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>	<a href="#" class="current">Patient</a></div>

			</div>
            			  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
          <li> <a href="index.php"> <i class="icon-home"></i> Home </a> </li>
          <li> <a href="patients.php"> <i class="icon-client"></i> Patient </a> </li>
          <li> <a href="carers.php"> <i class="icon-people"></i> Carer </a> </li>

    </ul>
  </div>

			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-signal"></i>
								</span>
								<h5>Patient</h5>
							</div>
							<div class="widget-content">
								<!-- TODO TABLE PHP TABLE HERE -->
								<div class="Patienttable"><table class="table table-bordered">
                                      <thead>
                                         <tr>
                                         <th>Patient ID</th>
                                         <th>Name</th>
                                         <th>Contact Number</th>
                                         </tr>
                                       </thead>
                                        <tbody>
                                        <?php
																				// 	$configs["HOST"],$configs["USERNAME"],$configs["PASSWORD"],$configs["DATABASE"]);
                                        //  $user = "123456";
                                        //  $password = "123456";
																				$configs = include('config.php');
																        $conn = mysqli_connect($configs["HOST"],$configs["USERNAME"],$configs["PASSWORD"],$configs["DATABASE"]);
																        $sql = "Select id, name, contactNumber From User";
																        $result = mysqli_query($conn,$sql);
																        // $tokens = array();
																        if(mysqli_num_rows($result) > 0 ){
																        	while ($row = mysqli_fetch_assoc($result)) {
																						echo "<tr>";
																        		echo "<td>".$row["id"]."</td>";
																						echo "<td>".$row["name"]."</td>";
																						echo "<td>".$row["contactNumber"]."</td>";
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

		</div>

		<div class="row-fluid">
					<div id="footer" class="span12"> 2016 &copy; Mobile Care </div>
				</div>
            <script src="js/excanvas.min.js"></script>
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery.ui.custom.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.flot.min.js"></script>
            <script src="js/jquery.flot.pie.min.js"></script>
            <script src="js/jquery.flot.resize.min.js"></script>
            <script src="js/maruti.js"></script>
            <script src="js/maruti.charts.js"></script>
            <script src="js/maruti.dashboard.js"></script>
<script src="js/jquery.peity.min.js"></script>


	</body>
</html>
