// =================================== VARIABLE DECLARATIONS =================================== //



// =================================== FUNCTIONS =================================== //

//CATALOG
function showCategories(categoryId){
	$('#catalog-category-selected').html("");
	switch(categoryId) {
	  case 1:
	    $('#catalog-category-selected').html("Sassy Singles");		
	    break;
	  case 2:
	    $('#catalog-category-selected').html("Stylish Sets");		
	    break;
	  case 3:
	    $('#catalog-category-selected').html("Super Supplies");		
	}
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

//CATALOG
function sortPrice(order){	
	$('#catalog-category-selected').html("Collection");
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

//CATALOG, CART
function newAddToCart(id){
	var quantity = $("#quantity" + id).val();
	// alert(productId);
	console.log("Quantity: " + quantity);
	console.log("ProductId: " + id);

	$.ajax({
	  url: "../controllers/add_to_cart.php",
	  method: "POST",
	  data: 
	    {
	      productId: id,
	      quantity: quantity
	    },
	  dataType: "text",
	    success: function(data){
	      $('a[href="cart.php"]').html(data);
	    }
	})
}


//CART
function loadCart(){
	$.get("../controllers/load_cart.php",function(data){
		$("#loadCart").html(data);
	});
}


//CART - Change the no. of items and display the new subtotal
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


	$.ajax({
	  url: "../controllers/add_to_cart.php",
	  method: "POST",
	  data: 
	    {
	      productId: id,
	      quantity: items
	    },
	  dataType: "text",
	    success: function(data){
	    	$('a[href="cart.php"]').html(data);
				loadCart();
	    }
	});

}

//CART
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


// =================================== CATALOG BUTTONS AND LINKS =================================== //

$("#searchAnItem").keyup(function(){
		$('#catalog-category-selected').html("Collection");

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


// commented out; added onclick to button
// $("button#addToCart").on("click", function(){
//   // Get the product id
//   var productId = $(this).attr("data-id");

//   // Get the quantity
//   var quantity = $("#quantity" + productId).val();
  
//   // Alternative way to get the value from the input field
//   // var quantity = $(this).prev().val();

//   // console.log("Quantity: " + quantity);
//   // console.log("ProductId: " + productId);

//       $.ajax({
//         url: "../controllers/add_to_cart.php",
//         method: "POST",
//         data: 
//           {
//             productId: productId,
//             quantity: quantity
//           },
//         dataType: "text",
//           success: function(data){
//             $('#cart').html(data);
//           }
//       })
//   })


// =================================== REGISTER A USER - INSERT TO DATABASE =================================== //

//CHECK UNIQUENESS OF EMAIL ADDRESS + ENABLING/DISABLING REGISTER BUTTON
// $("#email").blur(function(){
// 	let email = $(this).val();
// 	$("#error_msg_email").html("");	

// 	if (email != "") {
// 		$.post("../controllers/process_email.php", {email:email}, function(data){
// 				if(data == "Success"){
// 					$("#displayBtnRegister").html("<button class='btn btn-dark btn-block' type='button' id='btnRegister'>SUBMIT</button>");
// 				} else {
// 					$("#error_msg_email").css("color","red");
// 					$("#error_msg_email").html("Please enter a unique and valid email.");
// 					$("#displayBtnRegister").html("<button class='btn btn-dark btn-block' type='button' id='btnRegister' disabled>SUBMIT</button>");
// 				}
// 		});			
// 	} else {
// 		$("#displayBtnRegister").html("<button class='btn btn-dark btn-block' type='button' id='btnRegister' disabled>SUBMIT</button>");
// 	}

// 	// $("#btn_submit").html("<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister' disabled>");
// });

function emailCheck() {
	var email = $("#email").val(); 

	$("#error_msg_email").html("");

	$.post("../controllers/process_email.php", {email:email}, function(data){
		if(data != "Success"){					
			$("#email").css({"border-color":"rgb(185, 74, 72)"});
			$("#error_msg_email").css({"color":"rgb(185, 74, 72)"});
			$("#error_msg_email").html("Valid but already in use, please enter a unique email");
			$("#email").addClass("error");
			$("#btnRegister").prop("disabled", true);
		} else {
			$("#btnRegister").prop("disabled", false);
			$("#email").removeClass("error");
		}
	});
}

// to submit the registration form and add the new user to the database
// $("#btnRegister").click(()=>{
// 		let firstname = $("#firstname").val();
// 		let lastname = $("#lastname").val();
// 		let email = $("#email").val();
// 		let password = $("#password").val();
// 		let cpassword = $("#cpassword").val();
// 		let mobile = $("#mobile").val();
// 		let address = $("#address").val();

// 		let error_flag = 0; //if any error is detected, the form should not be submitted

// 		// validation for the firstname
// 		if (firstname == "") {
// 			$("#error_firstname").css("color","red");
// 			$("#error_firstname").html("First Name is required!");
// 			error_flag = 1;
// 		} else {
// 			$("#error_firstname").html("");
// 		}

// 		// validation for the lastname
// 		if (lastname == "") {
// 			$("#error_lastname").css("color","red");
// 			$("#error_lastname").html("Last Name is required!");
// 			error_flag = 1;
// 		} else {
// 			$("#error_lastname").html("");
// 		}

// 		// validation for the email
// 		if (email == "") {
// 			$("#error_msg_email").css("color","red");
// 			$("#error_msg_email").html("Email is required!");
// 			error_flag = 1;
// 		} else {
// 			emailCheck ();
// 			// error_flag = errorFlagEmail;
// 		}

		
// 		// validation for the password
// 		if (password == "" ) {
// 			$("#error_password").css("color","red");
// 			$("#error_password").html("Password is required!");
// 			error_flag = 1;
// 		} else {
// 			$("#error_password").html("");
// 		}

// 		// validation for the cpassword
// 		if ((password != cpassword) || (cpassword == "")) {
// 			$("#error_cpassword").css("color","red");
// 			$("#error_cpassword").html("Password and Confirm Password do not match!");
// 			error_flag = 1;
// 		} else {
// 			$("#error_cpassword").html("");
// 		}

// 		// validation for the mobile
// 		if (mobile == "") {
// 			$("#error_mobile").css("color","red");
// 			$("#error_mobile").html("Mobile is required!");
// 			error_flag = 1;
// 		} else {
// 			$("#error_mobile").html("");
// 		}

// 		// validation for the address
// 		if (address == "") {
// 			$("#error_address").css("color","red");
// 			$("#error_address").html("Address is required!");
// 			error_flag = 1;
// 		} else {
// 			$("#error_address").html("");
// 		}

// 		if(error_flag == 0){
// 		// then we can submit the form			
// 			$("#form_register").submit();				
// 		}
// 	});


// =================================== LOGIN =================================== //

//stretch goal: on keypress ENTER
$("#btnLogin").click(()=>{
		let loginEmail = $("#loginEmail").val();
		let loginPassword = $("#loginPassword").val();

		let error_flag2 = 0; //if any error is detected, the form should not be submitted

		// to debug
		// alert(loginEmail + " " + loginPassword);

		// validation for the email
		if (loginEmail == "") {
			$("#error_loginEmail").css("color","rgb(185, 74, 72)");
			$("#error_loginEmail").html("This field is required");
			error_flag2 = 1;
		} else {
			$("#error_loginEmail").html("");
		}

		// validation for the password
		if (loginPassword == "") {
			$("#error_loginPassword").css("color","rgb(185, 74, 72)");
			$("#error_loginPassword").html("This field is required");
			error_flag2 = 1;
		} else {
			$("#error_loginPassword").html("");
		}

		if (error_flag2 == 0) {

			$.ajax({
				"url" : "../controllers/process_login.php",
				"data" : {"loginEmail" : loginEmail,    
						"loginPassword" : loginPassword},
				"type" : "POST",
				"success" : (data) => {						
						if (data == "Invalid") {
							$("#error_message").html("");
							$("#error_message").css("color","red");
							$("#error_message").html("Invalid email/password");		
							// setTimeout("location.reload(true);",1500);										
						} else {
							$("#error_message").html("");
							$("#form_login").submit();								
							// $("#loginPassword").html("");
						}
				}
			});
		}
	});





// =================================== CART =================================== //
$(document).ready(function(){

	loadCart();
});


// =================================== CHECKOUT =================================== //

$("#btnPlaceOrder").click(()=>{
	let paymentMethodId = $("#paymentMethod").val();
	let shipAddress = $("#shipAddress").val();
	let error_flag3 = 0; 

	if (shipAddress == "") {
		$("#error_shippingAdress").css("color","red");
		$("#error_shippingAdress").html("This field is required");
		error_flag3 = 1;
	} else {
		$("#error_shippingAdress").html("");
	}

	if (paymentMethodId == "") {
		$("#error_paymentMethod").css("color","red");
		$("#error_paymentMethod").html("This field is required");
		error_flag3 = 1;
	} else {
		$("#error_paymentMethod").html("");
	}

	if(error_flag3 == 0){

			$("#formCheckout").submit();
		}

});

// =================================== EDIT PROFILE =================================== //
function editProfile(id) {
	// let userId = $(this).val();
	
	let editFirstName = $("#editFirstName").val();
	let editLastName = $("#editLastName").val();
	let editEmail = $("#editEmail").val();
	let editMobile = $("#editMobile").val();
	let editAddress = $("#editAddress").val();

	let error_flag = 0; //if any error is detected, the form should not be submitted

	// validation for the firstname
	if (editFirstName == "") {
		$("#error_editFirstName").css("color","red");
		$("#error_editFirstName").html("First Name is required!");
		error_flag = 1;
	} else {
		$("#error_editFirstName").html("");
	}

	// validation for the lastname
	if (editLastName == "") {
		$("#error_editLastName").css("color","red");
		$("#error_editLastName").html("Last Name is required!");
		error_flag = 1;
	} else {
		$("#error_editLastName").html("");
	}

	// validation for the email
	if (editEmail == "") {
		$("#error_editEmail").css("color","red");
		$("#error_editEmail").html("Email is required!");
		error_flag = 1;
	} else {
		// emailCheckSame();
		// error_flag = errorFlagEmail;
		$("#error_editEmail").html("");
	}


	// validation for the mobile
	if (editMobile == "") {
		$("#error_mobile").css("color","red");
		$("#error_mobile").html("Mobile is required!");
		error_flag = 1;
	} else {
		$("#error_mobile").html("");
	}

	// validation for the address
	if (editAddress == "") {
		$("#error_address").css("color","red");
		$("#error_address").html("Address is required!");
		error_flag = 1;
	} else {
		$("#error_address").html("");
	}

	if(error_flag == 0){
		$("#profileAlertMsg").html("");
	// then we can submit the form			
		$.ajax({
			"url" : "../controllers/edit_profile.php",
			"data" : {"userId" : id,    
					"editFirstName" : editFirstName,
					"editLastName" : editLastName, 
					"editEmail" : editEmail, 
					"editMobile" : editMobile, 
					"editAddress" : editAddress},
			"type" : "POST",
			"success" : (data) => {						
				if(data) {	
					$("#profileAlertMsg").html("Updates saved!");
					setTimeout(function(){
						$('#profileAlertMsg').fadeOut("slow");
					}, 600);
					setTimeout(function(){
						location.reload();
					}, 1300);
					window.location.reload(true);
				}
			}
		});
	}
}

















// function pageRedirect() {
//     window.location.href("confirmation.php");
// }      

















// $(document).on("click","#btnCheckOut",()=>{
// 	let totalOrder = $("#grandTotal").text();
	
// 	$("#orderSummary").text(totalOrder);

	
		
// // 	// let grandTotal = $("#grandTotal").val;

// // 	// if (grandTotal == 0) {
	
// // 	// } else {
// // 	// 	window.location.href="checkout.php";
// // 	// }
// });