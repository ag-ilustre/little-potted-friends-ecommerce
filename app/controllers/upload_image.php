<?php
	$id = $_POST["uploadImageProductId"];
	$data = "";

	$errorimg = $_FILES['upload']['error'];

	$target_dir = '../assets/images/uploads/';

	// cat.jpg
	$target_file = $target_dir . basename($_FILES['upload']['name']); 
	// this is a two-dimensional array; 'upload' is from the input "name" attribute in upload.php file.

	// echo $target_file + $id;
	// uploads/cat.jpg

	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// echo $imageFileType;

	if(file_exists($target_file)){
		// echo "Sorry, file already exists";
		echo $errorimg;
	}

	if ($_FILES['upload']['size'] > 100000) {
		// echo "Sorry, your file is too large";
		echo $errorimg;
	}
	
	if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
		// echo "Only JPG, JPEG, and PNG files are allowed";
		echo $errorimg;
	} else{
		move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
		$data = 1;
	}


	if ($data = 1) {
		require_once 'connect.php';

		$img_path = $target_file;

		$sql = "UPDATE tbl_items
				SET img_path = '$img_path'
				WHERE id = $id";

		if (mysqli_query($conn, $sql)){ 
			header("location: ../views/manageProducts.php");
		} 
		//to check for error
		// else {
		// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		// }
	} 

?>