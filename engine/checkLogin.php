<?php
	session_start();
	require 'connect.php';

	function getOut(){
		header("Location: ../index.php");
		die();
	}

	$ID = $_SESSION['ID'];
	$password = $_SESSION['password'];

	$sqlPasswordCorrect = "SELECT device_ID FROM medicare_devices WHERE password='$password'";
	$resultPasswordCorrect = mysqli_query($conn, $sqlPasswordCorrect);
	if(mysqli_num_rows($resultPasswordCorrect) == 0){
		getOut();
	} else {
		$rowPasswordCorrect = mysqli_fetch_assoc($resultPasswordCorrect);
		if($rowPasswordCorrect['device_ID'] != $ID){
			getOut();
		}
	}
?>