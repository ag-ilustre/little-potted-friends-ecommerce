// $(document).ready(()=>{
	let minPrice = "";
	let maxPrice = "";

 	function showCategories(categoryId){
 		$('#catalog-category-selected').html("");
 		$('#catalog-category-selected').html("CATEGORY " + categoryId);

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

	// function filterPrice(minPrice, maxPrice){
	// 	$.ajax({
	// 		"url": "../controllers/filter_price.php",
	// 		"method": "POST",
	// 		"data": {
	// 			minPrice : minPrice,
	// 			maxPrice : maxPrice
	// 		},
	// 		"success": function(datafromPHP){
	// 			$('#products').html(datafromPHP);
	// 		}
	// 	});
		
	// }

	function sortPrice(order){	
		// alert(order);
		$.ajax({
			"url": "../controllers/sort_price.php",
			"method": "POST",
			"data": {
				order : order
			},
			"dataType": "text",
			"success": function(datafromPHP){
				$('#products').html(datafromPHP);
			}
		});
		
	}

	$('#price').change(function(){
		let order = $(this).val();
		sortPrice(order);
	})

// CATALOG BUTTONS AND LINKS

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

 // 	$('#click-priceRange1').click(()=>{
	// 	$('#products').html("");
	// 	filterPrice(0, 499);
	// });

	// $('#click-priceRange2').click(()=>{
	// 	$('#products').html("");
	// 	filterPrice(500, 749);
	// });

	// $('#click-priceRange3').click(()=>{
	// 	$('#products').html("");
	// 	filterPrice(750, 999);
	// });

 // 	$('#click-priceLowToHigh').click(()=>{
	// 	$('#products').html("");
	// 	sortPrice(0);
	// });

 // 	$('#click-priceHighToLow').click(()=>{
	// 	$('#products').html("");
	// 	sortPrice(1);
	// });
 	
// }); // end of (document).ready