// =================================== THIS IS THE PRICE RANGE FEATURE. RESTORE LATER!!! =================================== //
// let minPrice = "";
// let maxPrice = "";

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
	

// REGISTER A USER - VALIDATION using .blur()

// $('#firstname').blur(()=>{
// 	let firstname = $('#firstname').val();

// 	$.ajax({
// 		"url" : "process_fname.php",
// 		"data" : {"firstname" : firstname},
// 		"type" : "POST",
// 		"success" : (data) => {
// 			$('#error_firstname').css("color","red");
// 			$('#error_firstname').html(data);				
// 		}
// 	});
// });


// $('#lastname').blur(()=>{
// 	let lastname = $('#lastname').val();

// 	$.ajax({
// 		"url" : "process_lname.php",
// 		"data" : {"lastname" : lastname},
// 		"type" : "POST",
// 		"success" : (data) => {
// 			$('#error_lastname').css("color","red");
// 			$('#error_lastname').html(data);				
// 		}
// 	});
// });


// $('#address').blur(()=>{
// 	let address = $('#address').val();

// 	$.ajax({
// 		"url" : "process_address.php",
// 		"data" : {"address" : address},
// 		"type" : "POST",
// 		"success" : (data) => {
// 			$('#error_address').css("color","red");
// 			$('#error_address').html(data);				
// 		}
// 	});
// });


// $('#password').blur(()=>{
// 	let password = $('#password').val();

// 	$.ajax({
// 		"url" : "process_password.php",
// 		"data" : {"password" : password},
// 		"type" : "POST",
// 		"success" : (data) => {
// 			$('#error_password').css("color","red");
// 			$('#error_password').html(data);				
// 		}
// 	});
// });


// $('#cpassword').blur(()=>{
// 	let password = $('#password').val();
// 	let cpassword = $('#cpassword').val();

// 	$.ajax({
// 		"url" : "process_cpassword.php",
// 		"data" : {"password" : password, "cpassword" : cpassword},
// 		"type" : "POST",
// 		"success" : (data) => {
// 			$('#error_cpassword').css("color","red");
// 			$('#error_cpassword').html(data);				
// 		}
// 	});
// });