<?php session_start(); ?>

<?php 

	require 'connect.php';

	$transactionCode = $_POST['transactionCode'];
	$statusId = $_POST['statusId']; //change to status_id
	$data = "";

	$sql = "UPDATE tbl_orders
			SET status_id = '$statusId' 
			WHERE id = '$transactionCode'";

	if (mysqli_query($conn, $sql)) { 
		$data = 1;
	} else {
		$data = 0;
	}

	echo $data;

?>