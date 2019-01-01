<?php
	//connect to the database
	require_once 'connect.php';

	$email = $_POST['email'];

	$data = "";
	$status = "";

	// Remove all illegal characters from email
	// $email = filter_var($email, FILTER_SANITIZE_EMAIL);

	// Validate e-mail
	// $email = (filter_var($email, FILTER_VALIDATE_EMAIL);

	$sql = 	"SELECT * FROM tbl_users WHERE email = '$email'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 0) {
		$data = "Success";
	} else if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$status = $row['status'];

			//check to reuse deactivated email
			if ($status == "Inactive") {
				$data = "Success";
			}
		}
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