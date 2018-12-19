<?php
	//connect to the database
	require 'connect.php';

	$data = "";

	$sql = "SELECT * FROM tbl_items";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
		$data .= "<div class='col-lg-4 col-md-6 mb-5'>
        <div class='card h-100'>
        <img src='$row[img_path]'>
          <div class='card-body'>				                	
            <a href='product.php?id=$row[id]'><h4 class='card-title'>$row[name]</h4></a>
            <h5>&#8369 $row[price]</h5>
            <p class='card-text'>
              $row[description]
            </p>
          </div>
          <div class='card-footer'>
          	<input type='number' class='form-control mb-3' min='1' value='1' id='quantity$row[id]'>
          	<button class='btn btn-block btn-info' id='addToCart' data-id='$row[id]' onclick='newAddToCart($row[id])'><i class='fas fa-shopping-cart'></i>  ADD TO CART</button>
          </div>
        </div>
      </div>";
    }
    echo $data;
?>