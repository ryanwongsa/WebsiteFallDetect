<!DOCTYPE html>
<html lang="en">

<head>
		<title>Mobile Care</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="css/maruti-style.css" />
		<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
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
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
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
                              <th>Availability</th>
                              <th>Location</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="taskDesc"><i class="icon-info-sign"></i> Making The New Suit</td>
                              <td class="taskStatus">			<input type="checkbox" id="checkbox_c1" class="chk_4" /><label for="checkbox_c1"></label></td>
                              <td Style="text-align:center;padding-top:25px">(192,568)</td>
                              <td class="taskOptions"> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove" style="margin-top:20px"></i></a></td>
                          </tr>
                          <tr>
                              <td class="taskDesc"><i class="icon-plus-sign"></i> Luanch My New Site</td>
                              <td class="taskStatus"><span class="pending">pending</span></td>
                              <td Style="text-align:center">(192,568)</td>
                              <td class="taskOptions"> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                          </tr>
                          <tr>
                              <td class="taskDesc"><i class="icon-ok-sign"></i> Maruti Excellant Theme</td>
                              <td class="taskStatus"><span class="done">done</span></td>
                              <td Style="text-align:center">(192,568)</td>
                              <td class="taskOptions"> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                          </tr>
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
