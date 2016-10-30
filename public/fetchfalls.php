<?php

$conn = mysqli_connect("localhost","homestead","secret","fcm");
$sql = " Select * from falllocations";
$result = mysqli_query($conn,$sql);
$falls = array();
if(mysqli_num_rows($result) > 0 ){
	while ($row = mysqli_fetch_assoc($result)) {
		$falls[] = array($row["userID"],$row["lat"],$row["lng"]);
	}
}


foreach ($falls as &$value) {
	foreach ($value as &$element) {
    	echo $element,"\n";
    }
}

?>
