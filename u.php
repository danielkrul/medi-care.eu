<?php
	require 'engine/connect.php';

	if(!isset($_GET['id'])){
		die('Nezadano ID zarizeni!');
	}
	$device_ID = $conn->real_escape_string($_GET['id']);
	$temp = $conn->real_escape_string($_GET['t']);
	$heart_rate = $conn->real_escape_string($_GET['hr']);
	$saturation = $conn->real_escape_string($_GET['s']);
	$humidity = $conn->real_escape_string($_GET['h']);
	$longitude = $conn->real_escape_string($_GET['lo']);
	$latitude = $conn->real_escape_string($_GET['la']);
	$voltage = $conn->real_escape_string($_GET['vo']);

	$insert = "INSERT INTO data (device_ID, temp, heart_rate, saturation, humidity, longitude, latitude, voltage)
	VALUES ('$device_ID', $temp, $heart_rate, $saturation, $humidity, $longitude, $latitude, $voltage)";

	if (mysqli_query($conn, $insert)) {
    	echo "Ok";
	} else {
    	echo "Error: " . $insert . "<br>" . mysqli_error($conn);
	}
?>