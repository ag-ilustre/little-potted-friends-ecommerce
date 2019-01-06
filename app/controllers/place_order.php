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

	$address = $_POST["deliveryAddress"];
	$_SESSION["address"] = $address;
	$email = $_SESSION["email"];
	$total = $_SESSION["total"];

//Update the address in USERS table using the email
	$sql = "UPDATE tbl_users SET address = '$address' WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);

	$user_id = $_SESSION["id"];
	$_SESSION["transaction_code"] = generate_trans_number();
	$transaction_code = $_SESSION["transaction_code"];
	date_default_timezone_set("Asia/Manila");
	$purchase_date = date("Y/m/d H:i:s");
	$_SESSION["purchase_date"] = $purchase_date;
	$status_id = 1; //The default is always 1 since it is a new order. (ref: tbl_status)
	$payment_mode_id = $_POST["paymentMethod"];
	
	//this is for the email (body) to be sent to the user
	switch($payment_mode_id){
		case 1:
			$_SESSION["paymentMode"] = "COD";
			break;
		case 2:
			$_SESSION["paymentMode"] = "PayPal";
			break;
	}



	// echo $user_id ." ". $transaction_code ." ". $purchase_date ." ". $status_id ." ". $payment_mode_id . "<br>"; // to check

	$sql1 = "INSERT INTO tbl_orders (transaction_code, purchase_date, user_id, status_id, payment_mode_id, total)
				   VALUES ('$transaction_code', '$purchase_date', '$user_id', '$status_id', '$payment_mode_id', '$total')";
	
	if (mysqli_query($conn, $sql1)){
		$_SESSION["order_id"] = mysqli_insert_id($conn);
	} else {
      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
  }

	
//Insert order_id, item_id, quantity, price to ORDER_ITEMS table
	
	// $data = ""; //to check
	$subtotal = "";
	foreach($_SESSION["cart"] as $item_id => $quantity) {
	  $sql2= "SELECT * FROM tbl_items where id = '$item_id'";
	  $result2 = mysqli_query($conn, $sql2);
	    if(mysqli_num_rows($result2) > 0){
	      while($row = mysqli_fetch_assoc($result2)){
          $sql3 = "";
          $price = $row["price"];
          $order_id = $_SESSION["order_id"];   //assign value of $order_id here for visibility
          $subtotal = $price * $quantity;
                    //$data .= $order_id ." ". $item_id ." ". $quantity ." ". $price; //to check

          $sql3 = "INSERT INTO tbl_order_items (order_id, item_id, quantity, price, subtotal)
           				VALUES ('$order_id', '$item_id', '$quantity', '$price', '$subtotal'); ";

          $result3 = mysqli_query($conn, $sql3);

          	//remove item from "cart"
         	unset($_SESSION["cart"][$item_id]);

         //to check
       		// if (mysqli_query($conn, $sql3)){
       	//      echo "Success";		
       		// } else {
       	 //      echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
       	 //  }
       }
     }
	}

	//to check if inserted to database
	$sql4 = "SELECT * FROM tbl_orders WHERE id = '$order_id'";
	$result4 = mysqli_query($conn, $sql4);

	if (mysqli_num_rows($result4) == 1) {
		
		//to avoid reuse
		unset($_SESSION["order_id"]);
		unset($_SESSION["total"]);

		$_SESSION["item_count"] = array_sum($_SESSION["cart"]); //item count should be ZERO

		echo "<i class='fas fa-shopping-cart'></i>CART <span class='badge badge-danger itemCount'>". $_SESSION['item_count'] ."</span>";

		header("Location: ../views/confirmation.php");			
	} 
	
	require '../../vendor/sample_mail.php';
	
?>