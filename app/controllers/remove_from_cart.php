<?php 
session_start();

$id = $_POST["productId"];

//unset()

unset($_SESSION["cart"][$id]);

$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "<i class='fas fa-shopping-cart'></i>CART <span class='badge badge-danger' id='itemCount'>". $_SESSION['item_count'] ."</span>";
?>