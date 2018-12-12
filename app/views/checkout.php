
<?php require_once '../partials/header.php'; ?>

<?php                        
    /*if(!isset($_SESSION['email'])){ 
      header("Location: login.php");
    } */

    
?>



<div class="container">
	<div class='row'>
		<h3>This is the checkout page.</h3>
	</div>

  <div class='row'>
  	<div class='col-lg-8'>
  		<h5>Shipping Address</h5>
  		<input type='text' class ='form-control'>
  	</div>
  	<div class='col-lg-4'>
  		<h5>Payment Method<h5>
  		<select class='custom-select'>
  		  <option value='COD'>COD</option>
  		  <option value='Paypal'>Paypal</option>					    		  
  		</select>
  	</div>
  </div>

  <div class='row mb-3'>
  	<div class='col-lg-8'>
    	<h5 id='#orderSummary'>Order Summary</h5>
      <p>TOTAL
        <span id="totalWidth">
         <?php echo " &#x20B1; " . $_SESSION["total"]; ?>
        </span>
      </p>

      <button class='btn btn-primary' id='btnPlaceOrder'>Place Order Now</button>
    </div>
  </div>

  <div class='row'>
    <div class='col-lg-8'>

<?php
     
      include '../controllers/connect.php';

      $data = "<table class='table table-hover'>
        <thead>
          <tr>
            <th width='40%'>Product</th>
            <th width='30%'>Price</th>
            <th width='30%'>Quantity</th>

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
                                   <td><img src='$row[img_path]' width='25%' height='25%'> $name</td>
                                   <td id='price$id'> $price</td>
                                   <td><input disabled type='number' class ='form-control' value ='$quantity' id='quantity$id'  min='1' onchange = changeNoItems($id)></td>
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