<?php

$test_registrationIds = array('fRdn523NQgw:APA91bFJTqAiMXeESXUp5eNBj3FTGKHrh9fLojVm-qgK9k2Gzo4DsfL3f_zD0Fu2j_86qvd7NXadfcvD7nbJAkxXmY5989f6VToWPe9cZJ6qlDb6tFJq1krkYQSkzphbbyryqUpRR5Dw');//'dclP--HKsqs:APA91bHfVu9XfTt5F5zjYNz-T8LzHON2vFwExNNY3wCPpgtZAa4iqjZoceyfRf4_haO0nXpqyEMAHQj4CziCQgOw2GQEyUifWAdu8uh4Erqx-0UKdvWAAbfdEkoYTYNizLqB_QgLMA5r');

// prep the bundle
$message = array
(
    'message'   => 'TestMessagebad',
    'title'     => 'TestTitle',
    'subtitle'  => 'TestSubtitle',
    'tickerText'    => 'TestTicker',
    'vibrate'   => 1,
    'sound'     => 1,
    'largeIcon' => 'large_icon',
    'smallIcon' => 'small_icon'
);


$test_message = array("message" => "casc2");

function connectToDB($userID){
  $configs = include('config.php');
  $conn = mysqli_connect($configs["HOST"],$configs["USERNAME"],$configs["PASSWORD"],$configs["DATABASE"]);
	$sql = "Select Token From users WHERE UserID = \"". $userID . "\"";
	$result = mysqli_query($conn,$sql);
	$tokens = array();
	if(mysqli_num_rows($result) > 0 ){
		while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["Token"];
		}
	}
	mysqli_close($conn);
  return $tokens;
}

function send_notification ($registrationIds, $message)
{
  $configs = include('config.php');
  $fields = array
  (
      'registration_ids'  => $registrationIds,
      'data'          => $message
  );

  $headers = array
  (
      'Authorization: key=' . $configs["API_ACCESS_KEY"],
      'Content-Type: application/json'
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
  curl_setopt($ch, CURLOPT_POST, true );
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
  $result = curl_exec($ch );
  curl_close( $ch );

  echo $result;
}
// $registrationIds = connectToDB("Ben");
send_notification($test_registrationIds,$test_message);

?>
