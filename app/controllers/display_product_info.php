<?php
	//connect to the database
	include 'connect.php';

	$data = "";

	$id = $_POST['id'];

	$sql = "SELECT * FROM tbl_items WHERE id = '$id'";


	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
	$data = "
	<div class='container-fluid'>
      <div class='row'>
   		<div class='col-md-6 mb-2'>
   	   	<img src='$row[img_path]' class='productImageInModal'>       	              
   	  	</div>
  		  	<div class='col-md-6 mb-2'>					    
  		  		<h5 class='productName'>$row[name]</h5>
  		   	<p>$row[description]</p>       
  		    	<p class='my-1 productPrice'>&#8369 $row[price]</p>
  		    	  <span id='error_quantity$row[id]'></span>
  		    		<input type='number' class='form-control alignQuantity quantityProductInfo mr-2 my-2 p-0' min='1' value='1' id='quantity$row[id]' oninput='this.value = Math.abs(this.value)'>
  		    		<button class='btn btn-info btnWider m-0 p-0' id='addToCart' data-id='$row[id]' onclick='newAddToCart($row[id])'><i class='fas fa-shopping-cart'></i>  ADD TO CART</button>
  		  	</div>
 	  	</div>
 	</div>	
   ";
	
	}

	 echo $data;
?>		