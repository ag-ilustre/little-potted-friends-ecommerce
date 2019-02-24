<?php
	// $host = "localhost";
	// $db_username = "root";
	// $db_password = "";
	// $db_name = "demoNewStore";
	
	// $host = "db4free.net"; 
	// $db_username = "agilustre";
	// $db_password = "csp2ecommerce";
	// $db_name = "db_csp2_agci";

	$host = "sql12.freemysqlhosting.net"; 
	$db_username = "sql12280390";
	$db_password = "KNwbwNCGCL";
	$db_name = "sql12280390";

	// Create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	// Check connection
	if(!$conn){
		die("Connection failed: " . mysqli_error($conn));
	}
?>