<?php
	//connect to the database
	require 'connect.php';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = ($_POST['email']);
	$password = sha1($_POST['password']);
	// $password = $_POST['password'];
	$address = $_POST['address'];

	$sql = "INSERT INTO tbl_users (firstname, lastname, email, password, address)
				VALUES('$firstname', '$lastname', '$email', '$password', '$address')";  
	$result = mysqli_query($conn, $sql); // this is like clicking the "Go" in MySQL

	header("Location: ../views/catalog.php");
	 

?>