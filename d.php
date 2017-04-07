<?php
	require 'engine/connect.php';

	if(!isset($_GET['id'])){
		die('Nezadano ID zarizeni!');
	}
	$device_ID = $conn->real_escape_string($_GET['id']);
	$t = 1;
	$resultArray = array();

	if (isset($_GET['t'])) {
		$t = $_GET['t'];
	}

	$sql = "SELECT * FROM data ORDER BY id DESC LIMIT $t";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
        	array_push($resultArray, array(
    			'id' => $row['id'],
    			'temp' => $row['temp'],
    			'heart_rate' => $row['heart_rate'],
    			'saturation' => $row['saturation'],
    			'humidity' => $row['humidity'],
   				'longitude' => $row['longitude'],
   				'latitude' => $row['latitude'],
   				'voltage' => $row['voltage']
  			));
    	}
    	echo json_encode($resultArray);
	} else {
    	echo "Zadne data!";
	}

?>