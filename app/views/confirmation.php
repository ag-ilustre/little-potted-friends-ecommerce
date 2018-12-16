<?php require_once '../partials/header.php'; ?>

<?php

?>

<div class="container">
			
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8 text-center" id="confirmationMessage">
			<h1>Thank you for your order</h1>
			<h4><strong>Reference Number is <?= $_SESSION["transaction_code"]?></strong></h4> 
			<p>You will receive an email confirmation at <?= $_SESSION["email"]?></p>
		</div>
		<!-- <div class="col-lg-4 text-center">
			<img src="../assets/images/favicon.png" id="confirmationFavicon">
		</div> -->
		<div class="col-lg-2"></div>
		

	</div>

</div>



<?php require '../partials/footer.php'; ?>