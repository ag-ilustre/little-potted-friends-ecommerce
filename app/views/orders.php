<?php require_once '../partials/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="mb-4 text-center">Your Orders</h1>
			<?php
				//connect to the database
				require '../controllers/connect.php';


				$user_id = $_SESSION["id"];
				
				$data = "";
				$data1 = "";
				$data2 = "";
				$data3 = "";
				$order_id = "";
				$item_id = "";

				//filter by user id and sort by purchase date (most recent first)
				$sql = "SELECT * FROM tbl_orders WHERE user_id = '$user_id' ORDER BY purchase_date DESC";
				$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) > 0) {	
						$data = "";					
						while($row = mysqli_fetch_assoc($result)){
							// row: id | transaction_code | purchase_date | user_id | status_id | payment_mode |
							$data1 = "";
							$data1 = "<h5>Order ID: $row[transaction_code]</h5>
									  <h5>Placed on: $row[purchase_date]</h5>
									<table class='table table-hover'>
									  <thead>
									    <tr>
									      <th>Product</th>
									      <th>Price</th>
									      <th>Quantity</th>
									    </tr>
									  </thead>
									  <tbody>";

							  $order_id = "";
							  $order_id = $row["id"];
							$sql1 = "SELECT * FROM tbl_order_items WHERE order_id = '$order_id'";
							$result1 = mysqli_query($conn, $sql1);
								if(mysqli_num_rows($result1) > 0) {								
										$data23 = "";
										while($row = mysqli_fetch_assoc($result1)){
										// row: id | quantity | price | order_id | item_id
											
											$data3 ="<td>$row[price]</td>
													 <td>$row[quantity]</td>";

											$item_id ="";
											$item_id = $row['item_id'];
											
											//to get the name of the item_id (1:1)
											$sql2 = "SELECT * FROM tbl_items WHERE id = '$item_id'";
											$result2 = mysqli_query($conn, $sql2);
													while($row = mysqli_fetch_assoc($result2)){
														$data2 = "";
														$data2 = "<td><img src='$row[img_path]' width='100px' height='100px'> $row[name]</td>";
													}

										$data23 .= "<tr>".$data2 . $data3."</tr>";
										$data2 = "";
										$data3 = "";
										}
										
						    	}

				  		$data .= $data1 . $data23 . "</tbody></table><hr>";
				  		$data1 = "";
				  		$data23 = "";

					} 
				echo $data;
				}
			?>

		</div>
	</div>
</div>



<?php require '../partials/footer.php'; ?>