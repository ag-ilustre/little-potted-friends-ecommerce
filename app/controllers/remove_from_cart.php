<?php 
session_start();

$id = $_POST["productId"];

//unset()

unset($_SESSION["cart"][$id]);

$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "<span class='badge badge-success'>". $_SESSION['item_count'] ."</span>";
?>