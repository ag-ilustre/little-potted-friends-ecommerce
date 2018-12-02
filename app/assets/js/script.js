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


$('#price').change(function(){
	let order = $(this).val();
	sortPrice(order);
})



$("button#addToCart").on("click", function(){
  // Get the prooduct id
  var productId = $(this).attr("data-id");

  // Get the quantity
  var quantity = $("#quantity" + productId).val();
  
  // Alternative way to get the value from the input field
  // var quantity = $(this).prev().val();

  console.log("Quantity: " + quantity);
  console.log("ProductId: " + productId);

      $.ajax({
        url: "../controllers/add_to_cart.php",
        method: "POST",
        data: 
          {
            productId: productId,
            quantity: quantity
          },
        dataType: "text",
          success: function(data){
            $('#cart').html(data);
          }
      })
  })


// =================================== REGISTER A USER - INSERT TO DATABASE =================================== //

$("#email").keyup(function(){
	let email = $(this).val();

	$("#btn_submit").html("<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister' disabled>");

	$.post("../controllers/process_email.php", {email:email}, function(data){
			$("#btn_submit").html(data);
	})

});


// to submit the registration form and add the new user to the database
$("#btnRegister").click(()=>{
		let firstname = $("#firstname").val();
		let lastname = $("#lastname").val();
		let email = $("#email").val();
		let password = $("#password").val();
		let address = $("#address").val();

		// let error_flag = 0; //if any error is detected, the form should not be submitted

		// // validation for the firstname
		// if (firstname == "") {
		// 	$("#error_firstname").next().css("color","red");
		// 	$("#error_firstname").next().html("First Name is required!");
		// 	error_flag = 1;
		// } else {
		// 	$("#error_firstname").next().html("");
		// }

		// // validation for the lastname
		// if (lastname == "") {
		// 	$("#error_lastname").next().css("color","red");
		// 	$("#error_lastname").next().html("Last Name is required!");
		// 	error_flag = 1;
		// } else {
		// 	$("#error_lastname").next().html("");
		// }

		// // validation for the email
		// if (email == "") {
		// 	$("#error_email").next().css("color","red");
		// 	$("#error_email").next().html("Email is required!");
		// 	error_flag = 1;
		// } else {
		// 	$("#error_email").next().html("");
		// }

		// // validation for the password
		// if (password == "") {
		// 	$("#error_password").next().css("color","red");
		// 	$("#error_password").next().html("Password is required!");
		// 	error_flag = 1;
		// } else {
		// 	$("#error_password").next().html("");
		// }

		// // validation for the address
		// if (address == "") {
		// 	$("#error_address").next().css("color","red");
		// 	$("#error_address").next().html("Address is required!");
		// 	error_flag = 1;
		// } else {
		// 	$("#error_address").next().html("");
		// }

		// if(error_flag == 0){
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
							alert("You have successfully registered!");					
						}
					}
			});
		// }
	});


// =================================== LOGIN =================================== //

// $("#btnLogin").click(()=>{
// 		let email = $("#login-email").val();
// 		let password = $("#login-password").val();

// 		let error_flag = 0; //if any error is detected, the form should not be submitted

// 		// to debug
// 		// alert(email + " " + password);

// 		// validation for the email
// 		if (email == "") {
// 			$("#error_login-email").next().css("color","red");
// 			$("#error_login-email").next().html("This field is required");
// 			error_flag = 1;
// 		} else {
// 			$("#error_login-email").next().html("");
// 		}

// 		// validation for the password
// 		if (password == "") {
// 			$("#error_login-password").next().css("color","red");
// 			$("#error_login-password").next().html("This field is required");
// 			error_flag = 1;
// 		} else {
// 			$("#error_login-password").next().html("");
// 		}

// 		if(error_flag == 0){
// 			// then we can submit the form
// 			$.ajax({
// 				"url" : "../controllers/process_login.php",
// 				"data" : {"email" : email,    
// 						"password" : password},
// 				"type" : "POST",
// 				"success" : (dataFromPHP) => {
// 						if(!dataFromPHP) {
// 							$("#error_message").css("color", "red");
// 							$("#error_message").html("Invalid email/password");
// 						}
// 					}
// 			});
// 		}
// 	});

// 

// =================================== CART =================================== //

function loadCart(){
	$.get("../controllers/load_cart.php",function(data){
		$("#loadCart").html(data);
	});
}

$(document).ready(function(){
	loadCart();
});

// Change the no. of items and display the new subtotal
function changeNoItems(id){
	let items = $("#quantity" + id).val();
	// console.log(items);
	let price = $("#price" + id).text();
	let newPrice = items * price;
	$("#subTotal" + id).html(newPrice);
	
	let a = [];
	$(".sub-total").each(function(id){
		a[id] = parseInt($(this).text());
	});
	// console.log(a);
	let sum = 0;
	$.each(a, function(index, value){
		sum += value;
	});
	// console.log(sum);
	
	$("#grandTotal").html(sum);
}

function removeFromCart(id){
	var ans = confirm("Are you sure?");
	if(ans){
		// alert("You answere YES!");
		$.ajax({
			url: "../controllers/remove_from_cart.php",
			method: "POST",
			data: {productId:id},
			dataType: "text",
			success: function(data){
				$('a[href="cart.php"]').html(data);
				loadCart();
			}
		});
	}
}
