<?php
	//connect to the database
	require_once 'connect.php';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$address = $_POST['address'];

	$sql = "INSERT tbl_users (firstname, lastname, email, password, address)
				VALUES('$firstname ', '$lastname', '$email', '$password', '$address')";  
	$result = mysqli_query($conn, $sql); // this is like clicking the "Go" in MySQL

	$count = mysqli_num_rows($result);

	if($count = 1){	
		header("Location: ../views/catalog.php");	
	} else {
		header("Location: ../views/register.php");	
	} 
?>