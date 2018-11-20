<?php require_once '../partials/header.php'; ?>
<?php require_once '../partials/navbar.php'; ?> 

<!-- Page Content -->
<div class="container">
	<div class="row mt-2">
		<div class="col-lg-3">
			<h4 id="catalog-category-selected">COLLECTION</h4>
			<hr>
			<h2>Categories</h2>
			<div class="list-group">
	      		<ul class="list-group">
	      			<li class="list-group-item"><button class="btn btn-link" id="btn-catalog-c1">Category 1</button></li>
	      			<li class="list-group-item"><button class="btn btn-link" id="btn-catalog-c2">Category 2</button></li>
	      			<li class="list-group-item"><button class="btn btn-link" id="btn-catalog-c3">Category 3</button></li>
	      		</ul>
	      	<!-- removed php codes -->
			</div>
			<!-- /.list-group -->
		</div>
		<!-- /.col-lg-3 -->
		
		<div class="col-lg-9">
			<div class="row mt-5" id="products">
				<?php
					//connect to the database
					include '../controllers/connect.php';

					$data = "";

					$sql = "SELECT * FROM tbl_items";

					$result = mysqli_query($conn, $sql);

					while($row = mysqli_fetch_assoc($result)){
						$data .= "<div class='col-lg-4 col-md-6 mb-5'>
				              <div class='card h-100'>
				              <img src='$row[img_path]'>
				                <div class='card-body'>				                	
				                  <h4 class='card-title'><a href='product.php?id=$row[id]'>$row[name]</a></h4>
				                  <h5>&#8369 $row[price]</h5>
				                  <p class='card-text'>
				                    $row[description]
				                  </p>
				                </div>
				                <div class='card-footer'>
				                	<input type='number' class='form-control mb-3'>
				                  <button class='btn btn-block btn-primary'><i class='fas fa-shopping-cart'></i>  Add to Cart</button>
				                </div>
				              </div>
				            </div>";
				    }
				    echo $data;
				?>
			</div>
		</div>
		<!-- /.col-lg-9 -->
	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

<!-- footer -->
<?php include '../partials/footer.php'; ?>

<!-- <script type="text/javascript">
	function showCategories(categoryId){
		// alert(categoryId);
		$.ajax({
			"url": "controllers/show_items.php",
			"method": "POST",
			"data": {
				categoryId : categoryId
			},
			"dataType": "text",
			"success": function(datafromPHP){
				//
				$('#products').html(datafromPHP);
			}
		});
	}
</script> -->

<!-- <script type="text/javascript">
	$(document).ready(()=>{
		let categoryId = "";

	   function showCategories(categoryId){
			$.ajax({
				"url": "show_items.php",
				"method": "POST",
				"data": {
					categoryId : categoryId
				},
				"success": function(datafromPHP){
					$('#products').html(datafromPHP);
				}
			});
			
		}

		$('#btn-catalog-c1').click(()=>{
			categoryId = 1;
			$('#products').html("");
			$('#catalog-category-selected').html("");
			showCategories(categoryId);
			$('#catalog-category-selected').html("CATEGORY 1");
		});

		$('#btn-catalog-c2').click(()=>{
			categoryId = 2;
			$('#products').html("");
			$('#catalog-category-selected').html("");
			showCategories(categoryId);
			$('#catalog-category-selected').html("CATEGORY 2");
		});

		$('#btn-catalog-c3').click(()=>{
			let categoryId = 3;
			$('#products').html("");
			$('#catalog-category-selected').html("");
			showCategories(categoryId);
			$('#catalog-category-selected').html("CATEGORY 3");
		});
	});
</script> -->