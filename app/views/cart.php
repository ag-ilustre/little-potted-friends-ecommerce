<?php require_once '../partials/header.php'; ?>
 

<?php
      if(isset($_SESSION['email'])){ 
        echo "<div class='container>
        				<div class='row'>
        					<div class='col-lg-10 mx-auto' id='loadCart'>		  


		  			  		</div>
		  			  	</div>
		  			  	<div class='row'>
		  	  			  <div class='col-lg-10 mx-auto text-right'>		  	  			  
			  	  			  <table class='table table-hover'>
					  			  	<tbody>
						  			  	<tr>
				          				<td colspan=4><a class='btn btn-success' id='btnCheckOut' href='checkout.php'>Proceed to Checkout</a><h4></td>
				         					<td></td>
			          				</tr>
		         					</tbody>
	         					</table>
			  			  	</div>
		  			  	</div>
		  			  </div>
		  			  ";
  		} else {
  			header("Location: login.php");
  		}
?>

<!-- footer -->
<?php include '../partials/footer.php'; ?>