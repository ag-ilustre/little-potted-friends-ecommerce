<?php session_start(); ?>

<?php                        
    if (isset($_SESSION['email'])) {
    	if($_SESSION['access'] == "ADMIN") {
    		header("Location: profile.php");
    	}
	}
?>

<?php require_once '../partials/header.php'; ?>

<!-- Page Content -->
<div class="container">
	<div class="row mt-2">
		<div class="col-lg-3 text-center">
			<h3 id="catalog-category-selected">Collection</h3>
		</div>
		<div class="col-lg-9">
			<div class="input-group mb-3">
			  <input type="text" class="form-control" placeholder="Search an item" aria-label="Search an item" aria-describedby="button-addon2" id="searchAnItem">
			 <!--  <div class="input-group-append">
			    <button class="btn btn-outline-secondary" type="button">      <i class="fas fa-search"></i>      </button>
			  </div> -->
			</div>
			<!-- <input type="text/number" name="searchItem" class="mx-0 px-0"></input><button><i class="fas fa-search"></i></button> -->
		</div>
	</div>

	<div class="row mt-1">
		<div class="col-lg-12">
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-lg-2 mb-4">	
			<h5>Categories</h5>
			<div class="list-group mb-2">
				
		      		<ul class="list-group favicon-list-style">
		      				      				
		      			<?php include "../controllers/show_categories.php"; ?>
		      							      			
		      		</ul>
	      	
			</div>
			<!-- /.list-group -->

			<h5>Price</h5>
				<select class="custom-select" id="price">
					<option selected="" value=""> ------ </option>
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
		
		<div class="col-lg-10 mx-0">
			<div class="row" id="products">
				<?php include '../controllers/show_catalog.php'; ?>
			</div>
		</div>
		<!-- /.col-lg-10 -->
	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

<!-- DISPLAY PRODUCT INFO MODAL -->
<div class="modal fade" id="displayProductInfoModal" tabindex="-1" role="dialog" aria-labelledby="displayProductInfoModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="displayProductInfoModalTitle">Product Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	  	<!-- display echoed product info -->
       	  	<span id="displayProductInfo"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btnWider" data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>


<!-- footer -->
<?php require '../partials/footer.php'; ?>

<script>
    $.validate({
        lang: 'en',
        form: '#form_register',
        modules: 'security'
    });

</script>

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