<?php
	$configs = include('config.php');

	if (isset($_POST["Token"])) {

		   $_uv_Token=$_POST["Token"];
		   $conn = mysqli_connect($configs["HOST"],$configs["USERNAME"],$configs["PASSWORD"],$configs["DATABASE"]) or die("Error connecting");
		   $q="INSERT INTO users (Token) VALUES ( '$_uv_Token') "
              ." ON DUPLICATE KEY UPDATE Token = '$_uv_Token';";

      mysqli_query($conn,$q) or die(mysqli_error($conn));
      mysqli_close($conn);
	}
 ?>
