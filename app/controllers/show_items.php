<?php
	//connect to the database
	require_once 'connect.php';

	$data = "";
	
	$categoryId = $_POST['categoryId'];

	$sql = "SELECT * FROM tbl_items WHERE category_id = '$categoryId'";

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
	                	<input type='number' class='form-control mb-3' min='1' value='1' id='quantity$row[id]'>
	                	<button class='btn btn-block btn-dark' id='addToCart' data-id='$row[id]'><i class='fas fa-shopping-cart'></i>  Add to Cart</button>
	                </div>
	              </div>
	            </div>";
		}
	}
	echo $data;
?>