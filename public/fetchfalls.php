<?php
// getting falls from database (userID, lat, lng)
function getFalls()
{
	$conn = mysqli_connect("localhost","homestead","secret","fcm");
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
