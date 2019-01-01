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
	$data = "";

	$sql = "UPDATE tbl_users 
			SET firstname = '$editFirstName', lastname = '$editLastName', email = '$editEmail',  mobile = '$editMobile', address = '$editAddress'
			WHERE id = '$userId'";
	

	if (mysqli_query($conn, $sql)){ 
		$data = 1;
		// header("location: ../views/profile.php");
	} else {
		$data = 0;
	}

	echo $data;

	if ($data == 1) {
		$sql = "SELECT * FROM tbl_users WHERE id = '$userId'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			
			//set new SESSION details:
			$_SESSION["firstname"] = $editFirstName;
			$_SESSION["lastname"] = $editLastName;
			$_SESSION["email"] = $editEmail;
			$_SESSION["mobile"] = $editMobile;
			$_SESSION["address"] = $editAddress;
			
		}
	}
	
?>