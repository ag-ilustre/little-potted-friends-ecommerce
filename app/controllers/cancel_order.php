<?php 
	
	require_once 'connect.php';

	$id = $_POST['id'];
	$data = "";

	//to delete a product from the admin/manage products
	$sql = "UPDATE tbl_orders
			SET status_id = 3 
			WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) { 
		$data = "Cancelled";
	} 
	echo $data;

?>