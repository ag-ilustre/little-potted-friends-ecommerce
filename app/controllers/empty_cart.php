<?php 
session_start();

$value = $_POST['value'];

if ($value == 1) {
	//REMOVE ALL ITEMS FROM THE CART
	unset($_SESSION["cart"]);

	$_SESSION["item_count"] = 0;

	echo "<i class='fas fa-shopping-cart'></i>CART <span class='badge badge-info itemCount'>". $_SESSION['item_count'] ."</span>";
}

?>