<?php session_start(); ?>

<?php 

	require 'connect.php';

	$orderId = $_POST['orderId'];
	$orderStatusId = $_POST['orderStatusId'];
	$data="";

	$sql = "UPDATE tbl_orders
			SET status_id = '$orderStatusId' 
			WHERE id = '$orderId'";

	if (mysqli_query($conn, $sql)) { 
		$data = 1;
	} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

	echo $data;
?>