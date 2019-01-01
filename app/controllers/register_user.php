<?php
	//connect to the database
	require 'connect.php';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];

	//check if email is new or deactivated/inactive

	$sql = 	"SELECT * FROM tbl_users WHERE email = '$email'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 0) {
		$sql1 = "INSERT INTO tbl_users (firstname, lastname, email, password, mobile, address)
					VALUES('$firstname', '$lastname', '$email', '$password', '$mobile', '$address')";  
		$result1 = mysqli_query($conn, $sql1); 

		header("location: ../views/login.php");

	} else if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$status = $row['status'];

			//check to reuse deactivated email
			if ($status == "Inactive") {
				$sql2 = "UPDATE tbl_users 
							SET firstname = '$firstname', lastname = '$lastname', password = '$password', mobile = '$mobile', address = '$address', status = 'Active'
							WHERE email = '$email'";
				$result2 = mysqli_query($conn, $sql2); 

				header("location: ../views/login.php");

			}
		}
	}



	//add using deaactivated email


	//add using new email
	

	
	 

?>