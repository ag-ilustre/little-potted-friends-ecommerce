<?php
	//connect to the database
	require_once 'connect.php';

	$addProductName = $_POST["addProductName"];
	$addProductPrice = $_POST["addProductPrice"];
	$addProductDescription = $_POST["addProductDescription"];
	$addProductCategory = $_POST["addProductCategory"];

	$sql = "INSERT INTO tbl_items (name, price, description, category_id, img_path)
			VALUES('$addProductName', '$addProductPrice', '$addProductDescription', '$addProductCategory', '../assets/images/favicon.png')";  
	
	if (mysqli_query($conn, $sql)) {
		echo 1;
	} else {
  //to catch the error 
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>