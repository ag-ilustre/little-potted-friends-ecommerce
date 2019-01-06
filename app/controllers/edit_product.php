<?php
	//connect to the database
	require_once 'connect.php';

	$editProductId = $_POST["editProductId"];
	$editProductName = $_POST["editProductName"];
	$editProductPrice = $_POST["editProductPrice"];
	$editProductDescription = $_POST["editProductDescription"];
	$editProductCategoryId = $_POST["editProductCategoryId"];

	$sql = "UPDATE tbl_items 
			SET name = '$editProductName', price = '$editProductPrice', description = '$editProductDescription', category_id = '$editProductCategoryId'
			WHERE id = $editProductId";  
	
	if (mysqli_query($conn, $sql)) {
		echo 1;
	} else {
  //to catch the error 
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>