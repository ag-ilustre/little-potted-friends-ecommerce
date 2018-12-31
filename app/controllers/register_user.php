<?php
	//connect to the database
	require 'connect.php';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];

	$sql = "INSERT INTO tbl_users (firstname, lastname, email, password, mobile, address)
				VALUES('$firstname', '$lastname', '$email', '$password', '$mobile', '$address')";  
	$result = mysqli_query($conn, $sql); // this is like clicking the "Go" in MySQL

	header("location: ../views/login.php");
	 

?>