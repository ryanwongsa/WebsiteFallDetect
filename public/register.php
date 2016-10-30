<?php 
	if (isset($_POST["Token"])) {
		
		   $_uv_Token=$_POST["Token"];
		   $conn = mysqli_connect("192.168.10.10”,”homestead”,”secret”,”fcm") or die("Error connecting");
		   $q="INSERT INTO users (Token) VALUES ( '$_uv_Token') "
              ." ON DUPLICATE KEY UPDATE Token = '$_uv_Token';";
              
      mysqli_query($conn,$q) or die(mysqli_error($conn));
      mysqli_close($conn);
	}
 ?>