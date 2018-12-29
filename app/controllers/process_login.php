<?php session_start(); ?>

<?php
	//connect to the database
	require_once 'connect.php';

	// Get vaues fromt the login form
	$loginEmail = $_POST['loginEmail'];
	$loginPassword = sha1($_POST['loginPassword']);
	

	$sql = "SELECT * FROM tbl_users WHERE email = '$loginEmail' AND password = '$loginPassword'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			// echo $row['lastname'];
			// echo "<br>";
			// echo $row['firstname'];
			$_SESSION["lastname"] = $row['lastname'];
			$_SESSION["firstname"] = $row['firstname'];
			$_SESSION["email"] = $row['email'];
			$_SESSION["mobile"] = $row['mobile'];
			$_SESSION["address"] = $row['address'];
			$_SESSION["id"] = $row['id'];
		}
	} else {
		echo "Invalid";
	}


?>

<!-- header("Location: ../views/catalog.php");	 -->