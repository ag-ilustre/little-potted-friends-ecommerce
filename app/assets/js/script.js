// =================================== VARIABLE DECLARATIONS =================================== //

let minPrice = "";
let maxPrice = "";

// =================================== FUNCTIONS =================================== //

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


// =================================== CATALOG BUTTONS AND LINKS =================================== //

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


$('#email').keyup(function(){
	let email = $(this).val();	
	let error = 0;

	$("#btn_submit").html("<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister' disabled>");
	$("#error_email").html("");

	$.post("../controllers/validate_email.php", {email:email}, function(data){

			if (data == 1) {
				$('#error_email').css("color","red");
				$("#error_email").html("Please enter a valid and unique email!");
				error = 1;
			}
		})

	if (error == 0) {
		$.post("../controllers/process_email.php", {email:email}, function(data){
			$("#btn_submit").html(data);
			})
	}

});


// =================================== REGISTER A USER - INSERT TO DATABASE =================================== //

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
			$("#error_firstname").next().css("color","red");
			$("#error_firstname").next().html("First Name is required!");
			error_flag = 1;
		} else {
			$("#error_firstname").next().html("");
		}

		// validation for the lastname
		if (lastname == "") {
			$("#error_lastname").next().css("color","red");
			$("#error_lastname").next().html("Last Name is required!");
			error_flag = 1;
		} else {
			$("#error_lastname").next().html("");
		}

		// validation for the email
		if (email == "") {
			$("#error_email").next().css("color","red");
			$("#error_email").next().html("Email is required!");
			error_flag = 1;
		} else {
			$("#error_email").next().html("");
		}

		// validation for the password
		if (password == "") {
			$("#error_password").next().css("color","red");
			$("#error_password").next().html("Password is required!");
			error_flag = 1;
		} else {
			$("#error_password").next().html("");
		}

		// validation for the address
		if (address == "") {
			$("#error_address").next().css("color","red");
			$("#error_address").next().html("Address is required!");
			error_flag = 1;
		} else {
			$("#error_address").next().html("");
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

