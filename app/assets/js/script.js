$(document).ready(()=>{
	let categoryId = "";
	let minPrice = "";
	let maxPrice = "";
	let order = "";

   function showCategories(categoryId){
		$.ajax({
			"url": "../controllers/show_items.php",
			"method": "POST",
			"data": {
				categoryId : categoryId
			},
			"success": function(datafromPHP){
				$('#products').html(datafromPHP);
			}
		});
		
	}

	function filterPrice(minPrice, maxPrice){
		

		$.ajax({
			"url": "../controllers/filter_price.php",
			"method": "POST",
			"data": {
				minPrice : minPrice,
				maxPrice : maxPrice
			},
			"success": function(datafromPHP){
				$('#products').html(datafromPHP);
			}
		});
		
	}

	function sortPrice(order){
		

		$.ajax({
			"url": "../controllers/sort_price.php",
			"method": "POST",
			"data": {
				order : order
			},
			"success": function(datafromPHP){
				$('#products').html(datafromPHP);
			}
		});
		
	}

// CATALOG BUTTONS AND LINKS

	$('#btn-catalog-c1').click(()=>{
		categoryId = 1;
		$('#products').html("");
		$('#catalog-category-selected').html("");
		$('#catalog-category-selected').html("CATEGORY 1");
		showCategories(categoryId);
	});

	$('#btn-catalog-c2').click(()=>{
		categoryId = 2;
		$('#products').html("");
		$('#catalog-category-selected').html("");
		$('#catalog-category-selected').html("CATEGORY 2");
		showCategories(categoryId);
	});

	$('#btn-catalog-c3').click(()=>{
		let categoryId = 3;
		$('#products').html("");
		$('#catalog-category-selected').html("");
		$('#catalog-category-selected').html("CATEGORY 3");
		showCategories(categoryId);
	});

 	$("#searchAnItem").keyup(function(){

 		let word = $(this).val();
 		// to check if it's working
 		// console.log(word);

 		if (word != "") {
 			// AJAX Request (shorter version)
 			$.post("../controllers/search_an_item.php", {word:word}, function(data){
 				$("#products").html(data);
	 			})
 		} else {
 			$("#products").html("");
 		}  		
 	});

 	$('#click-priceRange1').click(()=>{
		$('#products').html("");
		filterPrice(0, 499);
	});

	$('#click-priceRange2').click(()=>{
		$('#products').html("");
		filterPrice(500, 749);
	});

	$('#click-priceRange3').click(()=>{
		$('#products').html("");
		filterPrice(750, 999);
	});

 	$('#click-priceLowToHigh').click(()=>{
		$('#products').html("");
		sortPrice(0);
	});

 	$('#click-priceHighToLow').click(()=>{
		$('#products').html("");
		sortPrice(1);
	});
 	
});