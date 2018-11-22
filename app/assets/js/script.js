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

// THIS IS THE PRICE RANGE FEATURE. RESTORE LATER!!!

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

function validateEmail(email) {
	$.ajax({
		"url" : "../controllers/process_email.php",
		"data" : {"email" : email},
		"type" : "POST",
		"success" : (data) => {
			$('#error_email').css("color","red");
			$('#error_email').html(data);				
		}
	});
}

$('#email').blur(()=>{
	let email = $('#email').val();
	validateEmail(email);
	
});

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

// REGISTER A USER - INSERT TO DATABASE
$("#btnRegister").click(()=>{
		let firstname = $("#firstname").val();
		let lastname = $("#lastname").val();
		let email = $("#email").val();
		let password = $("#password").val();
		let address = $("#address").val();

		let error_flag = 0; //if any error is detected, the form should not be submitted

		// to debug
		// alert(username + " " + password);

		// validation for the firstname
		if (firstname == "") {
			$("#firstname").next().css("color","red");
			$("#firstname").next().html("First Name is required!");
			error_flag = 1;
		} else {
			$("#firstname").next().html("");
		}

		// validation for the lastname
		if (lastname == "") {
			$("#lastname").next().css("color","red");
			$("#lastname").next().html("Last Name is required!");
			error_flag = 1;
		} else {
			$("#lastname").next().html("");
		}

		// validation for the email
		if (email == "") {
			$("#email").next().css("color","red");
			$("#email").next().html("Email is required!");
			error_flag = 1;
		} else {
			$("#email").next().html("");
		}

		// validation for the password
		if (password == "") {
			$("#password").next().css("color","red");
			$("#password").next().html("Password is required!");
			error_flag = 1;
		} else {
			$("#password").next().html("");
		}

		// validation for the address
		if (address == "") {
			$("#address").next().css("color","red");
			$("#address").next().html("Address is required!");
			error_flag = 1;
		} else {
			$("#address").next().html("");
		}

		if(error_flag == 0){
			// then we can submit the form
			$.ajax({
				"url" : "../controllers/register_user.php",
				"data" : {"firstnmame" : firstnmame,    //  left side = key; right side = value from username variable
						"lastname" : lastname,
						"email" : email,
						"password" : password,
						"address" : address},
				"type" : "POST",
				"success" : (dataFromPHP) => {
						if(dataFromPHP == "Success") {
							// $("#error_message").css("color", "green");
							// $("#error_message").html(dataFromPHP);
							$("#form_register").submit();						
						} else {
							$("#error_message").css("color", "red");
							$("#error_message").html(dataFromPHP);
						}
					}
			});
		}
	});

