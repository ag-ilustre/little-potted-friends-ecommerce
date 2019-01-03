<?php
	//connect to the database
	require 'connect.php';

	$data = "";

	$sql = "SELECT * FROM tbl_items";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
		$data .= "
            <div class='col-lg-4 col-md-6 mb-5'>
              <div class='card h-100 p-1'>
              <img src='$row[img_path]' class='productImageInModal mb-2'>
                <div class='card-body text-center  m-0 p-1'>
                    <button type='button' class='btn btn-link p-0' data-toggle='modal' data-target='#displayProductInfoModal' onclick='displayProductInfo($row[id])'><h5 class='card-title productName'>$row[name]</h5></button>
                    <p class='my-0 productPrice'>&#8369 $row[price]</p>
                  </div>
                <div class='card-footer'>
                    <input type='number' class='form-control mb-2 alignQuantity' min='1' value='1' id='quantity$row[id]' oninput='this.value = Math.abs(this.value)'>
                    <button class='btn btn-block btn-info' id='addToCart' data-id='$row[id]' onclick='newAddToCart($row[id])'><i class='fas fa-shopping-cart'></i>  ADD TO CART</button>
                </div>
              </div>
            </div>";
    }
    echo $data;
?>