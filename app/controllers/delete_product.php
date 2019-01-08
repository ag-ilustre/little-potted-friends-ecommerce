<?php 
	
	require_once 'connect.php';

	$id = $_POST['id'];
	$data = "";

	//to delete a product from the admin/manage products
	$sql = "DELETE FROM tbl_items WHERE id = $id";

	if (mysqli_query($conn, $sql)) { 
		$data = 1;
	} else {
		$data = 0;
	}

	echo $data;

?>