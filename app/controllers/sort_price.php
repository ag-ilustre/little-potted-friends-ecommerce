<?php
	//connect to the database
	include 'connect.php';

	$data = "";
	
	$order = $_POST['order'];

	switch ($order){
		case 0 :
			$sql = "SELECT * FROM tbl_items ORDER BY price";
			break;
		case 1:
			$sql = "SELECT * FROM tbl_items ORDER BY price DESC";
			break;
	}

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$data .= "<div class='col-lg-4 col-md-6 mb-5'>
	              <div class='card h-100'>
	              <img src='$row[img_path]'>
	                <div class='card-body'>
	                  <h4 class='card-title'><a href='product.php?id=$row[id]'>$row[name]</a></h4>
	                  <h5>&#8369 $row[price]</h5>
	                  <p class='card-text'>
	                    $row[description]
	                  </p>
	                </div>
	                <div class='card-footer'>
	                	<input type='number' class='form-control mb-3'>
	                  <button class='btn btn-block btn-primary'><i class='fas fa-shopping-cart'></i>  Add to Cart</button>
	                </div>
	              </div>
	            </div>";
		}
	}
	echo $data;
?>