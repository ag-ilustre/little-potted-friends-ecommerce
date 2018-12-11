
<?php require_once '../partials/header.php'; ?>

<?php                        
    if(!isset($_SESSION['email'])){ 
      header("Location: login.php");
    }
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

  <div class='row'>
  	<div class='col-lg-8'>
    	<h5 id='#orderSummary'>Order Summary</h5>
      <p>Total
        <span id="totalWidth">
        <?php echo $_SESSION["total"]; ?>
        </span>
      </p>
  	</div>
  </div>

</div>
		




<!-- footer -->
<?php require '../partials/footer.php'; ?>