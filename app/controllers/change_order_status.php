<?php session_start(); ?>

<?php 

	require_once 'connect.php';

	$orderId = $_POST['modalOrderId'];
	$orderStatusId = $_POST['orderStatusId'];
	$data="";

	$sql = "UPDATE tbl_orders
			SET status_id = '$orderStatusId' 
			WHERE id = '$orderId'";

	if (mysqli_query($conn, $sql)) { 
		if ($orderStatusId == 2) {
			$data = "Completed";
		} else if ($orderStatusId == 3) { 
			$data = "Cancelled";
		}

	} 
	// to check for errors
	// else {
 //      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 //    }

	echo $data;
?>