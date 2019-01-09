<?php
	$host = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "demoNewStore";
	
	// $host = "db4free.net"; 
	// $db_username = "agilustre";
	// $db_password = "csp2ecommerce";
	// $db_name = "db_csp2_agci";

	// Create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	// Check connection
	if(!$conn){
		die("Connection failed: " . mysqli_error($conn));
	}
?>