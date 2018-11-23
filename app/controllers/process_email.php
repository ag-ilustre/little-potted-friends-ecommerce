<?php
	//connect to the database
	require_once 'connect.php';

	$email = $_POST['email'];
	$data = "";
	
	$sql = 	"SELECT * FROM tbl_users WHERE email = '$email'";

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		$data = "<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister' disabled>";
	} else {
		$data = "<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister'>";
	}
	echo $data;

?>