<?php session_start(); ?>

<?php                        
     if (!isset($_SESSION['email'])) {
       header("Location: login.php");
    } elseif ($_SESSION['access'] == "ADMIN") {
       header("Location: profile.php");
     }  

    // if ($_SESSION["item_count"] == 0) {
    //     header("location: ../views/cart.php");
    // } else
    if (!isset($_SESSION["item_count"])) {
      header("location: ../views/cart.php");
    } 

?>

<?php require_once '../partials/header.php'; ?>

<div class="container">
	<div class='row mb-3'>
    <div class='col-lg-12'>
      <h1 class="text-center">Checkout</h1>
  	</div>
  </div>

  <form action="../controllers/place_order.php" method="POST" id="formCheckout">
  <div class='row mb-4'>      
    	<div class='col-lg-8'>
    		<label for='shipAddress'>Shipping Address:</label>
    		<input type='text' id='shipAddress' class ='form-control' name="deliveryAddress" value='<?= $_SESSION["address"]?>'>
        <p id='error_shippingAdress'></p>
    	</div>
    	<div class='col-lg-4'>
    		<label for='paymentMethod'>Payment Method</label>
    		<select class='custom-select' id='paymentMethod' name="paymentMethod">
          <option value=''>------</option>
    		  <option value='1'>COD</option>
    		  <option value='2'>PayPal</option>					    		  
    		</select>
        <p id='error_paymentMethod'></p>
    	</div>
  </div>
  </form>

  <div class='row mb-4'>
  	<div class='col-lg-12 text-center'>
    	<h3 id='#orderSummary'class='mb-3'>Order Summary</h3>
      <div class="row">
        <div class="col-lg-8 table-responsive">

        <?php
         
          require_once '../controllers/connect.php';

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

                                  if ($quantity != 0) {
                                   $data .=
                                     "<tr>
                                         <td class='text-center'>$name<br><img src='$row[img_path]' width='30%' height='auto'></td>
                                         <td class='text-center'>&#x20B1; $price</td>
                                         <td class='text-center'>$quantity</td>
                                     </tr>";
                                  }
                             }
                         }
          }
          $data .= "</tbody></table>";

          echo $data;
          $total = $_SESSION["total"];
          $formatted_total = number_format($total, 2, '.', ',');
        ?>
  	    </div>

        <div class="col-lg-4">
          <table class="table table-hover text-left">
            <tr>
              <td scope="row"><strong>SUBTOTAL</strong></td>
              <td><?= "&#x20B1; " . $formatted_total; ?></td>
            </tr>
            <tr>
              <td scope="row"><strong>SHIPPING (FREE*)</strong></td>
              <td>&#x20B1; 0</td> 
              <!-- ECHO MOBILE NUMBER -->
            <tr>
              <td scope="row"><strong>TOTAL</strong></td>
              <td><?= "&#x20B1; " . $formatted_total; ?></td>
            </tr>
            </tr>
          </table>
          <p class="text-left"><small>*Until March 31, 2019 only!</small></p>
          <button class='btn btn-info btnWider mt-3' id='btnPlaceOrder' type="button">PLACE ORDER</button>
        </div>
      </div>

    </div>
  </div>
</div>
		




<!-- footer -->
<?php require '../partials/footer.php'; ?>