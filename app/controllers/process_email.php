<?php
	//connect to the database
	require_once 'connect.php';

	$email = $_POST['email'];

	$sql = "SELECT * FROM tbl_users WHERE email = '$email'";  

	$result = mysqli_query($conn, $sql); // this is like clicking the "Go" in MySQL

	if(mysqli_num_rows($result) > 0) {
		echo "Email already exists!";
	}
?>