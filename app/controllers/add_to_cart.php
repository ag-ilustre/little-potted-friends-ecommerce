<?php
session_start();

$id = $_POST["productId"];
$quantity = $_POST["quantity"];

// update the items for session cart variable
$_SESSION["cart"][$id] = $quantity;

$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "<i class='fas fa-shopping-cart'></i>CART <span class='badge badge-info itemCount'>". $_SESSION['item_count'] ."</span>";

?>