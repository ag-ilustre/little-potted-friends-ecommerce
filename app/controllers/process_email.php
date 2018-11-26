<?php
	//connect to the database
	require_once 'connect.php';

	$email = $_POST['email'];

	$error_email = "";
	$data = "";

	// Remove all illegal characters from email
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	// Validate e-mail
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    $error_email = 0;
	}

	$sql = 	"SELECT * FROM tbl_users WHERE email = '$email'";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 0 && $error_email == 0){
		$data = "<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister'>";
	} else {
		$data = "<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister' disabled>";
		}
	echo $data;
	
	// $data = "";
	
	// $sql = 	"SELECT * FROM tbl_users WHERE email = '$email'";

	// $result = mysqli_query($conn, $sql);
	// if(mysqli_num_rows($result) > 0){
	// 	$data = "<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister' disabled>";
	// } else {
	// 	$data = "<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister'>";
	// }
	// echo $data;

?>