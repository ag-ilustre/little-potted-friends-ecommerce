<?php session_start(); ?>

<?php 

	require_once 'connect.php';

	$editUserId = $_POST['editUserId'];
	$editUserAccess = $_POST['editUserAccess'];
	$data = "";

	$sql = "UPDATE tbl_users
			SET access = '$editUserAccess' 
			WHERE id = '$editUserId'";

	if (mysqli_query($conn, $sql)) { 
		$data = 1;
	} else {
		$data = 0;
	}

	echo $data;

?>