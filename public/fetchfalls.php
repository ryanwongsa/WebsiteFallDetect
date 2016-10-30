<?php
// getting falls from database (userID, lat, lng)
function getFalls()
{
	$configs = include('config.php');
	$conn = mysqli_connect($configs["HOST"],$configs["USERNAME"],$configs["PASSWORD"],$configs["DATABASE"]);
	$sql = " Select * from falllocations";
	$result = mysqli_query($conn,$sql);
	$falls = array();
	if(mysqli_num_rows($result) > 0 ){
		while ($row = mysqli_fetch_assoc($result)) {
			$falls[] = array($row["userID"],$row["lat"],$row["lng"]);
		}
	}
	return $falls;
}

?>
