<?php
	$host = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "demoNewStore";

	// Create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	// Check connection
	if(!$conn){
		die("Connection failed: " . mysqli_error($conn));
	}
?>
