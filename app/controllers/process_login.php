<?php session_start(); ?>

<?php
	//connect to the database
	require_once 'connect.php';

	// Get vaues fromt the login form
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$data = "";

	$sql = "SELECT * FROM tbl_users WHERE email = '$email' && password = '$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			// echo $row['lastname'];
			// echo "<br>";
			// echo $row['firstname'];

			// $_SESSION['EMAIL'] = $row['email'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['firstname'] = $row['firstname'];
		}
		header("Location: ../views/catalog.php");
	} 
?>