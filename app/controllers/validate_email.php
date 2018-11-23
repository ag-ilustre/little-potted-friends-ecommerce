<?php
	//connect to the database
	require_once 'connect.php';

	$email = $_POST['email'];
	$data = 0;

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$data = 1;
	}
	echo $data;
?>