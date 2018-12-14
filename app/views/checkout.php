
<?php require_once '../partials/header.php'; ?>

<?php                        
    if(!isset($_SESSION['email'])){ 
      header("Location: login.php");
    }     
?>


<div class="container">
	<div class='row mb-3'>
    <div class='col-lg-10'>
  		<h3>Please fill out the details below.</h3>
  	</div>
  </div>

  <form action="../controllers/place_order.php" method="POST" id="formCheckout">
  <div class='row mb-3'>      
    	<div class='col-lg-8'>
    		<label for='shipAddress'>Shipping Address:</label>
    		<input type='text' id='shipAddress' class ='form-control' name="address" value='<?= $_SESSION["address"]?>'>
        <p id='error_shippingAdress'></p>
    	</div>
    	<div class='col-lg-4'>
    		<label for='paymentMethod'>Payment Method</label>
    		<select class='custom-select' id='paymentMethod' name="paymentMethod">
          <option value=''>------</option>
    		  <option value='1'>COD</option>
    		  <option value='2'>Paypal</option>					    		  
    		</select>
        <p id='error_paymentMethod'></p>
    	</div>
  </div>
  </form>

  <div class='row mb-3'>
  	<div class='col-lg-12'>
    	<h3 id='#orderSummary'>Order Summary</h3>
      <p>TOTAL
        <span id="totalWidth">
         
        </span>
      </p>

      <button class='btn btn-primary' id='btnPlaceOrder' type="button">Place Order Now</button>
    </div>
  </div>


  <div class='row mb-3 mx-auto'>
    <div class='col-lg-10'>

<?php
     
      include '../controllers/connect.php';

      $data = "<table class='table table-hover'>
        <thead>
          <tr>
            <th width='40%' class='text-center'>Product</th>
            <th width='30%' class='text-center'>Price</th>
            <th width='30%' class='text-center'>Quantity</th>

          </tr>
        </thead>
        <tbody>";

      foreach($_SESSION['cart'] as $id => $quantity) {
         $sql = "SELECT * FROM tbl_items where id = '$id' ";
                   $result = mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result) > 0){
                         while($row = mysqli_fetch_assoc($result)){
                           $name = $row["name"];
                           $description = $row["description"];
                           $price = $row["price"];                             

                             $data .=
                               "<tr>
                                   <td class='text-center'><img src='$row[img_path]' width='25%' height='25%'> $name</td>
                                   <td class='text-center'>$price</td>
                                   <td class='text-center'>$quantity</td>
                               </tr>";
                         }
                     }
      }
      $data .= "</tbody></table>";

      echo $data;
?>
  	</div>
  </div>

</div>
		




<!-- footer -->
<?php require '../partials/footer.php'; ?>