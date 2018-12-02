<?php
session_start();

require_once 'connect.php';

echo "<style>
table, th, td {
    border: 1px solid black;
    text-align: center;
}
</style>
<table align='center'>
				<tr>
			    <th width='10%'>PRODUCT</th>
			    <th>PRICE</th> 
			    <th>QUANTITY</th>
			    <th>SUB-TOTAL</th>
			    <th> </th>
				</tr>";

$data = "";
$total = 0;
foreach($_SESSION['cart'] as $id => $quantity) {
	// echo "product id: " .$id. "<br />";
	$sql = "SELECT * FROM tbl_items WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$name = $row['name'];
				$description = $row['description'];
				$price = $row['price'];
				$image = $row['img_path'];
				$subtotal = $price * $quantity;
				$data .= "<tr>
										<td><img src='$image'></td>
										<td>$price</td>
										<td><input type='number' value='$quantity' min='1'></td>
										<td>$subtotal</td>
										<td><button type='button'>REMOVE</button></td>
									</tr><br>";
				$total += $subtotal;
			}
		}
} 

echo $data;

echo "<tr>
			    <th colspan=4>TOTAL</th>
			    <th>$total</th>
			</tr>
		</table>";

?>