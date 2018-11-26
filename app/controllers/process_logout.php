<?php 
// Logout

	session_start();
	session_destroy();

	header("location: ../views/catalog.php");

?>