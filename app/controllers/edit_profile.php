<?php session_start(); ?>

<?php
	//connect to the database
	require 'connect.php';

	$userId = $_POST['userId'];
	$editFirstName = $_POST['editFirstName'];
	$editLastName = $_POST['editLastName'];
	$editEmail = ($_POST['editEmail']);
	$editMobile = $_POST['editMobile'];
	$editAddress = $_POST['editAddress'];

	$sql = "UPDATE tbl_users 
			SET firstname = '$editFirstName', lastname = '$editLastName', email = '$editEmail',  mobile = '$editMobile', address = '$editAddress'
			WHERE id = '$userId'";
	

	if (mysqli_query($conn, $sql)){ 
		//set new SESSION details:
		$_SESSION["lastname"] = $editLastName;
		$_SESSION["firstname"] = $editFirstName;
		$_SESSION["email"] = $editEmail;
		$_SESSION["mobile"] = $editMobile;
		$_SESSION["address"] = $editAddress;

		// header("location: ../views/profile.php");
	}	
	 

?>