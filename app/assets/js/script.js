$(document).ready(()=>{
	let categoryId = "";

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