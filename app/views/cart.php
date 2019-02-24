<?php session_start(); ?>

<?php                        
    if (isset($_SESSION['email'])) {
       	if($_SESSION['access'] == "ADMIN") {
       		header("Location: profile.php");
       	}
   	} 
?>

<?php require_once '../partials/header.php'; ?>
 

<div class='container'>
	<div class='row'>
		<h1 class="mb-4 mx-auto text-center">Your Cart</h1>
	</div>

	<div class='row'>
		<div class='col-lg-12 col-md-12 col-sm-12 mx-auto text-center table-responsive' id='loadCart'>		  
			


	  	</div>
	</div>
</div>

<!-- EMPTY CART MODAL -->
<div class="modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content bg-light">
	    	<div class="modal-header">
	        	<h5 class="modal-title" id="emptyCartModalTitle">Empty Cart</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span class="text-dark" aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
	      		<div class="row m-2">
		      		<p class="text-dark">Are you sure you want to empty your cart?</p>
	      		</div>
	      		<div class="row">
	      			<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
	      				<button type="button" class="btn btn-info btnWider mr-2" onclick="emptyCart(1)" data-dismiss="modal">YES</button>
      					<button type="button" class="btn btn-dark btnWider" data-dismiss="modal">NO</button>
	      			</div>
	      		</div>
	      	</div> <!-- end of modal-body -->
	    </div> <!-- end of modal-content -->
	</div> <!-- end of modal-dialog -->
</div> <!-- end of modal -->

<!-- REMOVE FROM CART MODAL -->
<div class="modal fade" id="removeFromCartModal" tabindex="-1" role="dialog" aria-labelledby="removeFromCartModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content bg-light">
	    	<div class="modal-header">
	        	<h5 class="modal-title" id="removeFromCartModalTitle">Remove Item from Cart</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span class="text-dark" aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
	      		<div class="row m-2">
		      		<p class="text-dark">Are you sure you want to REMOVE this item from the cart?</p>
	      		</div>
	      		<div class="row">
	      			<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
	      				<button type="button" class="btn btn-info btnWider mr-2" id="btnRemoveCartItem" data-dismiss="modal">YES</button>
      					<button type="button" class="btn btn-dark btnWider" data-dismiss="modal">NO</button>
	      			</div>
	      		</div>
	      	</div> <!-- end of modal-body -->
	    </div> <!-- end of modal-content -->
	</div> <!-- end of modal-dialog -->
</div> <!-- end of modal -->

<!-- footer -->
<?php require '../partials/footer.php'; ?>