<?php require_once '../partials/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
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
						while($row = mysqli_fetch_assoc($result)){
							// row: id | transaction_code | purchase_date | user_id | status_id | payment_mode |
							$data1 = "";
							$data1 = "<h4>$row[transaction_code] | $row[purchase_date]</h4>
							<table class='table table-hover'>
							  <thead>
							    <tr>
							      <th>Product</th>
							      <th>Quantity</th>
							      <th>Price</th>
							    </tr>
							  </thead>
							  <tbody>";

							  $order_id = "";
							  $order_id = $row["id"];
							$sql1 = "SELECT * FROM tbl_order_items WHERE order_id = '$order_id'";
							$result1 = mysqli_query($conn, $sql1);
								if(mysqli_num_rows($result1) > 0) {
									if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_assoc($result1)){
										// row: id | quantity | price | order_id | item_id
											$data2 = "";
											$data2 ="<td>$row[quantity]</td><td>$row[price]</td></tr>";

											$item_id ="";
											$item_id = $row['item_id'];
											
											//to get the name of the item_id (1:1)
											$sql2 = "SELECT * FROM tbl_items WHERE id = '$item_id'";
											$result2 = mysqli_query($conn, $sql2);
													while($row = mysqli_fetch_assoc($result2)){
														$data3 = "";
														$data3 = "<tr><td>$row[name]</td>";
													}

										$data .= $data3 . $data2;
										}
									}	
						    }

				  		$data .= $data1 . $data;

					} 
				echo $data . "</tbody></table>";
				$data = "";
				}
			?>

		</div>
	</div>
</div>



<?php require '../partials/footer.php'; ?>