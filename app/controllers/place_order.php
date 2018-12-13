<?php
	//connect to the database
	require 'connect.php';

	$userAddress = $_POST['userAddress'];
	$payment_mode_id = $_POST['paymentMethodId'];
	$email = $_SESSION['email'];
	$user_id = $_SESSION['id'];

//Update the address in USERS table using the email
	$sql = "UPDATE tbl_users SET address = 'userAddress' WHERE email = $email";
	$result = mysqli_query($conn, $sql);
	
//Insert to ORDERS table
	$transaction_code = generate_trans_number();	
	
	date_default_timezone_set('Asia/Manila');
	$purchase_date = date_default_timezone_get();
	$purchase_date = date("Y/m/d H:i:s");
	$status_id = 1; //The default is always 1 since it is a new order. (tbl_status)

	$sql1 = "INSERT INTO tbl_orders (user_id, transaction_code, purchase_date, status_id, payment_mode_id)
					VALUES ($user_id, '$transaction_code', '$purchase_date ', $payment_mode_id)";
	
	if(mysqli_query($conn, $sql1){
		$order_id = mysqli_insert_id($conn);

	//Insert items to ORDER_ITEMS table
		// order_id, item_id, quantity, price
		$sql2 =
	}




// to figure out how to insert the ITEMS 

	foreach($_SESSION['cart'] as $id => $quantity) {
	   $sql = "SELECT * FROM tbl_items where id = '$id' ";
	             $result = mysqli_query($conn, $sql);
	               if(mysqli_num_rows($result) > 0){
	                   while($row = mysqli_fetch_assoc($result)){
	                     $name = $row["name"];
	                     $description = $row["description"];
	                     $price = $row["price"];

	                       //For computing the sub total and grand total
	                       $subTotal = $quantity * $price;
	                       $grand_total += $subTotal;

	                        $_SESSION["total"] = $grand_total;

	                       $data .=
	                         "<tr>
	                             <td><img src='$row[img_path]' width='25%' height='25%'> $name</td>
	                             <td id='price$id'> $price</td>
	                             <td><input type='number' class ='form-control' value ='$quantity' id='quantity$id'  min='1' onchange = changeNoItems($id)></td>
	                             <td class='sub-total' id='subTotal$id'>$subTotal</td>
	                             <td><button class='btn btn-danger' onclick='removeFromCart($id)'><i class='fas fa-trash-alt'></i></button></td>
	                         </tr>";
	                   }
	               }
	}





		
	



?>
	

	
	