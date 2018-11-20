<?php require_once '../partials/header.php'; ?>
<?php require_once '../partials/navbar.php'; ?>

<div class="container">
			
	<div class="row">
		<?php
			//connect to the database
			include '../controllers/connect.php';

			$id = $_GET['id'];

			$sql = "SELECT * FROM tbl_items WHERE id = '$id'";


			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
			echo "
					<div class='col-lg-4 col-md-6 col-sm-6 mb-5'>
			      <img src='$row[img_path]'>       	              
			    </div>
			    
			    <div class='col-lg-8 col-md-6 col-sm-6 mb-5'>
				    <h3>PRODUCT INFORMATION<h3><hr>
				    <h4 class='card-title'>$row[name]</h4>
			      <p>$row[description]</p>       
				    <h5>&#8369 $row[price]</h5>
			    	<input type='number' class='mb-3'>
			      <button class='btn btn-dark'><i class='fas fa-shopping-cart'></i>  Add to Cart</button>
			    </div>
			    </div>";
			 }
		?>		
	</div>
	<!-- /.row -->

</div>
<!-- /.container -->


<!-- footer -->
<?php include '../partials/footer.php'; ?>