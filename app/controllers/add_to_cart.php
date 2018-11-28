<?php
session_start();

$id = $_POST["productId"];
$quantity = $_POST["quantity"];

// update the items for session cart variable
$_SESSION["cart"][$id] = $quantity;
$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "<span class='badge badge-success'>". $_SESSION['item_count'] ."</span>";

?>