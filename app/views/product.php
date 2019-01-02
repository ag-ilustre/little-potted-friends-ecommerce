<?php require_once '../partials/header.php'; ?>

<!-- NOT YET RESPONSIVE!!! -->
<div class="container">
			
	<div class="row">
		<div class="col-lg-12 text-center">
			<h4 class="display-4">PRODUCT INFORMATION</h4><hr>
		</div>
	</div>
	<div class="row">
		<?php
			//connect to the database
			include '../controllers/connect.php';

			$id = $_GET['id'];

			$sql = "SELECT * FROM tbl_items WHERE id = '$id'";


			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
			echo "<div class='col-lg-1'></div>
			<div class='col-lg-4 col-md-6 mb-5 m-0 p-0'>
			    <img src='$row[img_path]'>       	              
			  </div>
			    
			  <div class='col-lg-5 col-md-6 mb-5 m-0 p-0'>
			    
			    <h5>$row[name]</h5>
		      <p>$row[description]</p>       
			    <h5>&#8369 $row[price]</h5>
			  <div>
				  <div>   
				      <input type='number' class='text center btnWider mr-2 p-0' min='1' value='1' id='quantity$row[id]'>
				      <button class='btn btn-info btnWider p-0' id='addToCart' data-id='$row[id]' onclick='newAddToCart($row[id])'><i class='fas fa-shopping-cart'></i>  ADD TO CART</button>
			      </div>
			  </div>";
			 }
		?>		
	</div>
	<!-- /.row -->

</div>
<!-- /.container -->


<!-- footer -->
<?php require '../partials/footer.php'; ?>