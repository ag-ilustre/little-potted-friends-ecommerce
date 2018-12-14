<?php session_start(); ?>

<?php
	//connect to the database
	require_once 'connect.php';

	function generate_trans_number(){
		$ref_number = '';
		$source = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
		for($i=0; $i <16; $i++){
		$index = rand(0,15);
			$ref_number = $ref_number.$source[$index];
		}
		return $ref_number;
	}

	$address = $_POST["address"];
	$email = $_SESSION["email"];

//Update the address in USERS table using the email
	$sql = "UPDATE tbl_users SET address = '$address' WHERE email = '$email'";
	
	$user_id = $_SESSION["id"];
	$_SESSION["transaction_code"] = generate_trans_number();
	$transaction_code = $_SESSION["transaction_code"];
	date_default_timezone_set("Asia/Manila");
	$purchase_date = date_default_timezone_get();
	$purchase_date = date("Y/m/d H:i:s");
	$status_id = 1; //The default is always 1 since it is a new order. (tbl_status)
	$payment_mode_id = $_POST["paymentMethod"];

	if(mysqli_query($conn, $sql)){
		$sql1 = "INSERT INTO tbl_orders (transaction_code, purchase_date, user_id, status_id, payment_mode_id)
				VALUES ($transaction_code', '$purchase_date', '$user_id', '$status_id', '$payment_mode_id')";

		if(mysqli_query($conn, $sql1)){
			$order_id = mysqli_insert_id($conn);

		//Insert items to ORDER_ITEMS table
			//order_id, item_id, quantity, price
			foreach($_SESSION["cart"] as $item_id => $quantity) {
			   $sql2= "SELECT * FROM tbl_items where id = '$item_id'";
			             $result2 = mysqli_query($conn, $sql2);
			               if(mysqli_num_rows($result2) > 0){
			                  while($row = mysqli_fetch_assoc($result2)){
			                    $price = $row["price"];
			                       
		                      $sql3 = "INSERT INTO tbl_order_items (order_id, item_id, quantity, price)
		                       				VALUES ('$order_id', '$item_id', '$quantity', '$price')";
				               		$result3 = mysqli_query($conn, $sql3);
		                   }
			               }
			}

			//cart back to ZERO
			unset($_SESSION["cart"]);

			//check if inserted to database
			$sql4 = "SELECT * FROM tbl_orders WHERE id = '$order_id'";
			$result4 = mysqli_query($conn, $sql4);

			if (mysqli_num_rows($result4) == 1) {
				header("Location: ../views/confirmation.php");			
			} 
		}
	}
	
//Insert to ORDERS table
	
	

?>