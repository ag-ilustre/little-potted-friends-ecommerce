<?php require_once '../partials/header.php'; ?>

<?php
  include '../controllers/connect.php';
  
  $grand_total = 0;
  foreach($_SESSION['cart'] as $id => $quantity) {
     $sql = "SELECT * FROM tbl_items where id = '$id' ";
               $result = mysqli_query($conn, $sql);
                 if(mysqli_num_rows($result) > 0){
                     while($row = mysqli_fetch_assoc($result)){
                       $name = $row["name"];
                       $description = $row["description"];
                       $price = $row["price"];

                         //For computing the sub total and grand total
                         $subTotal = $quantity * $price;
                         $grand_total += $subTotal;

                       }
                  }
   }
?>

<?php                        

    if(isset($_SESSION['email'])){ 
      echo "<div class='container'>

      				<div class='row'>
      					<h3>This is the checkout page.</h3>
      				</div>
			
					    <div class='row'>
					    	<div class='col-lg-8'>
					    		<p>Shipping Address</p>
					    		<input type='text' class ='form-control'>
					    	</div>
					    	<div class='col-lg-4'>
					    		<p>Payment Method<p>
					    		<select class='custom-select'>
					    		  <option value='COD'>COD</option>
					    		  <option value='Paypal'>Paypal</option>					    		  
					    		</select>
					    	</div>
					    </div>

					    <div class='row'>
					    	<div class='col-lg-8'>
						    	<p id='#orderSummary'></p>
					    	</div>
					    </div>

					   </div>";
		} else {
			header("Location: login.php");
		}

?>


<!-- footer -->
<?php include '../partials/footer.php'; ?>