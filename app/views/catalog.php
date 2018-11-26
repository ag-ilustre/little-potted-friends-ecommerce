<?php require_once '../partials/header.php'; ?>

<!-- Page Content -->
<div class="container">
	<div class="row mt-2">
		<div class="col-lg-3">
			<h4 id="catalog-category-selected">COLLECTION</h4>
		</div>
		<div class="col-lg-9">
			<div class="input-group mb-3">
			  <input type="text" class="form-control" placeholder="Search an item" aria-label="Search an item" aria-describedby="button-addon2" id="searchAnItem">
			  <div class="input-group-append">
			    <button class="btn btn-outline-secondary" type="button">      <i class="fas fa-search"></i>      </button>
			  </div>
			</div>
			<!-- <input type="text/number" name="searchItem" class="mx-0 px-0"></input><button><i class="fas fa-search"></i></button> -->
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-lg-12">
		<hr>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-lg-2">	
			<div class="list-group">
	      		<ul class="list-group">
	      				      				
	      				<?php 
	      					require "../controllers/connect.php";

	      					$sql = "SELECT * FROM tbl_categories";
	      					$result = mysqli_query($conn, $sql);

	      					if (mysqli_num_rows($result) > 0) {
	      						while ($row = mysqli_fetch_assoc($result)) {
	      							echo "
	      							<li class='list-group-item'>
	      								<a href='#' class='dropdown-item' onclick='showCategories($row[id])'>$row[name]</a>
	      							</li>";
	      						}
	      					}
	      				?>	      				      			
	      		</ul>
	      	<!-- removed php codes -->
			</div>
			<!-- /.list-group -->
			<hr>

			<h4 class="mb-2">PRICE</h4>
				<select class="custom-select" id="price">
					<option selected=""> ------ </option>
					<option value="ASC">Lowest to Highest</option>
					<option value="DESC">Highest to Lowest</option>
				</select>

			<!-- <div class="dropdown">
			  <button class="btn btn-outline-secondary btn-block dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select a price range
			  </button>
			  <div class="dropdown-menu btn-block dropdown-menu-right" aria-labelledby="dropdownMenu2" class="text-left">
			    <a class="dropdown-item" href="#" id="click-priceRange1">&#8369 0 - &#8369 499</a>
			    <a class="dropdown-item" href="#" id="click-priceRange2">&#8369 500 - &#8369 749</a>
			    <a class="dropdown-item" href="#" id="click-priceRange3">&#8369 750 - &#8369 999</a>
			    <a class="dropdown-item" href="#" id="click-priceLowToHigh">Lowest to Highest</a>
			    <a class="dropdown-item" href="#" id="click-priceHighToLow">Highest to Lowest</a>
			  </div>
			</div> -->
			
		</div>
		<!-- /.col-lg-3 -->
		
		<div class="col-lg-10">
			<div class="row" id="products">
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
				                  <button class='btn btn-block btn-dark'><i class='fas fa-shopping-cart'></i>  Add to Cart</button>
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
			"url": "../controllers/show_items.php",
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