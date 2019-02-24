<?php session_start(); ?>

<?php require_once '../partials/header.php'; ?>

<?php
	
	if(!isset($_SESSION['email'])){ 
	  header("Location: login.php");
	} 

	if (!isset($_SESSION["cart"])) {
	    header("location: catalog.php");
	} else {
		echo "<div class='container'>
						
				<div class='row mt-3'>
					<div class='col-lg-2'></div>
					<div class='col-lg-8 text-center mx-3' id='confirmationMessage'>
						<h1>Thank you for your order</h1>
						<p><strong>Reference Number is " . $_SESSION["transaction_code"] . "</strong></p> 
						<p>You will receive an email confirmation at " . $_SESSION["email"] . "</p>
					</div>
					
					<div class='col-lg-2'></div>				
				</div>

				<div clas='row'>
					<div class='col-lg-12 text-center'>
						<a href='catalog.php' class='btn btn-info btnWider mt-5 text-center'>KEEP SHOPPING</a>
					</div>
				</div>

			</div>";



		
	}


?>




<?php require '../partials/footer.php'; ?>