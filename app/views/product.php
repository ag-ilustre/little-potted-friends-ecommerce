<?php require_once '../partials/header.php'; ?>

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
		      <input type='number' class='mb-3' min='1' value='1' id='quantity$row[id]'>
		      <button class='btn btn-dark' id='addToCart' data-id='$row[id]'><i class='fas fa-shopping-cart'></i>  Add to Cart</button>
			  </div>";
			 }
		?>		
	</div>
	<!-- /.row -->

</div>
<!-- /.container -->


<!-- footer -->
<?php require '../partials/footer.php'; ?>