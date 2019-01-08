<?php session_start(); ?>

<?php 

	require_once 'connect.php';

	$deactivateId = $_POST['deactivateId'];
	$data = "";

	$sql = "UPDATE tbl_users
			SET status = 'Inactive', access = 'NONE' 
			WHERE id = '$deactivateId'";

	if (mysqli_query($conn, $sql)) { 
		$data = 1;
		session_destroy();
	} else {
		$data = 0;
	}

	echo $data;

?>