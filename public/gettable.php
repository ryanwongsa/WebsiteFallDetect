<?php
$id=filter_has_var(INPUT_POST,'id')?trim($_REQUEST['id']):null;
$sqline=NULL;

if(strcasecmp($id,"unattend")==0){
	$sqline="
SELECT a.*, b.id AS 'userid', c.`S/N` AS 'fallid', c.`userID` AS 'fUID', c.`carerID`, c.`status` as 'fallStats'
FROM `FallEvent`a
LEFT JOIN `User`b
ON a.`uuid`=b.`devide_uuid`
AND b.`timestamp` = (	SELECT MAX(`timestamp`)
			FROM `User` z
			WHERE z.`devide_uuid` = a.`uuid`)
LEFT JOIN `AssignFall` c
ON a.`uuid`=c.`UUID`
WHERE a.`timestamp` IN (
		SELECT MAX(`timestamp`)
		FROM FallEvent
		GROUP BY `uuid`)
AND c.`UUID`IS NULL AND a.`landed`=1
GROUP BY a.`uuid`
";

}else if(strcasecmp($id,"attending")==0){
	$sqline="
SELECT a.*, b.id AS 'userid', c.`S/N` AS 'fallid', c.`userID` AS 'fUID', c.`carerID`, c.`status` as 'fallStats'
FROM `FallEvent`a
LEFT JOIN `User`b
ON a.`uuid`=b.`devide_uuid`
AND b.`timestamp` = (	SELECT MAX(`timestamp`)
			FROM `User` z
			WHERE z.`devide_uuid` = a.`uuid`)
LEFT JOIN `AssignFall` c
ON a.`uuid`=c.`UUID`
WHERE a.`timestamp` IN (
		SELECT MAX(`timestamp`)
		FROM FallEvent
		GROUP BY `uuid`)
AND c.`UUID` NOT IN (a.`uuid`)
AND (a.`landed`=1  OR a.`timeout`=1 or a.`confirmed`=1)
AND c.`status`!=4
GROUP BY a.`uuid`
";
}else if(strcasecmp($id,"completed")==0){
	$sqline="
SELECT a.*, b.id AS 'userid', c.`S/N` AS 'fallid', c.`userID` AS 'fUID', c.`carerID`, c.`status` as 'fallStats'
FROM `FallEvent`a
LEFT JOIN `User`b
ON a.`uuid`=b.`devide_uuid`
AND b.`timestamp` = (	SELECT MAX(`timestamp`)
			FROM `User` z
			WHERE z.`devide_uuid` = a.`uuid`)
LEFT JOIN `AssignFall` c
ON a.`uuid`=c.`UUID`
WHERE a.`timestamp` IN (
		SELECT MAX(`timestamp`)
		FROM FallEvent
		GROUP BY `uuid`)
AND c.`UUID` NOT IN (a.`uuid`)
AND (a.`landed`=1  OR a.`timeout`=1 OR a.`confirmed`=1)
AND c.`status`=4
GROUP BY a.`uuid`

";

}else{
$sqline=NULL;
echo 'error';
}


if(!is_null($sqline)){

	include('location.class.php');
	include('dPat.class.php');
	include('carer.class.php');
	include ("connection.php");
	$patList=array();
	$locList=array();
	$carerList=array();
	try{
		$db = getConnection();
		$sqlqry = $sqline;
		$code= $db->prepare($sqlqry);
		$code->execute();
		while ($data = $code->fetchObject()) {

			$type;
			if($data->landed==1&&$data->timeout==0&&$data->confirmed==0){
				$type="FALL DETECTED";
			}else if($data->landed ==1&&$data->timeout ==1&&$data->confirmed ==0){
				$type="FALL TO";
			}else if($data->landed ==1&&$data->timeout ==0&&$data->confirmed ==1){
				$type="*** CONFIRMED ***";
			}else if($data->landed ==0&&$data->timeout ==0&&$data->confirmed ==1){
				$type="False Alarm";
			}


			$patData=new dPat($data->userid,$data->uuid ,$data->lon ,$data->lat ,$data->timestamp ,$type);
			$locData=new location($data->lon ,$data->lat ,$data->userid ,"P");
			array_push($patList , $patData);
			array_push($locList , $locData);
		}
		$sqlqry = 'SELECT a.`S/N` AS "cID",`Name`,`mobile`,`lon`,`lan`,a.`status` as "cStatus", b.`S/N` as "fallID", b.`UUID`as "pUUID", b.`userID`as "pID", b.`status` as "pStatus" FROM `Carer` a LEFT JOIN `AssignFall` b ON a.`S/N`= b.`carerID` AND b.`status`=( SELECT `status`FROM `AssignFall` c where c.`status` NOT IN (4,5)) WHERE a.`status` =1';
		$db1 = getConnection();
		$code= $db1->prepare($sqlqry);
		$code->execute();
		while ($data = $code->fetchObject()) {

			$carerData=new carer($data->cID ,$data->lon ,$data->lan ,$data->Name ,$data->mobile ,$data->cStatus );
			$locData=new location($data->lon ,$data->lan ,$data->cID ,"C");
			array_push($carerList , $carerData);
			array_push($locList , $locData);
		}
	}catch(Exception $e){
		echo "File Insert Error".$e;
	}

}

?>




<table class="table">
	<thread>
		<tr class="success">
			<th> Time </th>
			<th> Patient ID </th>
			<th> latitude </th>
			<th> longitude </th>
			<th> FD Status </th>
			<th> CarerID </th>
		</tr>
</thread>
<?php
foreach($patList as $patInfo){
?>
<tbody>
<tr>
	<td style="font-size: 12px;">	<?php echo $patInfo->getFalltime(); ?>	</td>
	<td style="font-size: 12px;">	<?php echo $patInfo->getPid(); ?>	</td>
	<td style="font-size: 12px;">	<?php echo $patInfo->getLang(); ?>	</td>
	<td style="font-size: 12px;">	<?php echo $patInfo->getLong(); ?>	</td>
	<td style="font-size: 12px;">	<?php echo $patInfo->getType(); ?>	</td>
	<td style="font-size: 12px;">
		<form action="" method="post">
<?php
if(is_null($patInfo->getStatus())){
	echo "<select name='taskOption'>\n";
	foreach($carerList as $careInfo){
		if(is_null($careInfo->getPatStatus())){
			echo "<option value='".$careInfo->getId()."'> ".$careInfo->getName()." </option> \n";
		}
	}
	echo "</select>\n";
}
?>
<input type="submit" name="submit" value="Go"/>
</form>
</td>
</tr>
</tbody>
<?php
}
?>
</table>

<?php include 'mapUpdate.php';?>
<script type="text/javascript">
locationPatientUnattended = [];
locationPatientAttending = [];
markerPatientUnattended = [];
markerPatientAttending = [];
markersCarer = [];
locationsCarer = [];
convertToLocations(locationPatientUnattended);
convertToLocationsCarer(locationsCarer);
createMarker(markerPatientUnattended,locationPatientUnattended,"U");
createMarker(markersCarer,locationsCarer,"C");
showListings(markerPatientUnattended);
showListings(markersCarer);
</script>
