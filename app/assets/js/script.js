// =================================== VARIABLE DECLARATIONS =================================== //



// =================================== FUNCTIONS =================================== //

//CATALOG
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

//CATALOG
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
//CART

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

// $("#email").keyup(function(){
// 	let email = $(this).val();

// 	// $("#btn_submit").html("<input class='btn btn-dark btn-block' type='submit' value='SUBMIT' id='btnRegister' disabled>");

// 	$("#error_msg_email").html("");

// 	$.post("../controllers/process_email.php", {email:email}, function(data){
// 			if(data == "Success"){
// 				$("#btnRegister").removeAttr("disabled");
// 			} else {
// 				$("#error_msg_email").css("color","red");
// 				$("#error_msg_email").html("Please enter a unique and valid email.");
// 				$("#btnRegister").addAttr("disabled");
// 			}
// 	});

// });


// to submit the registration form and add the new user to the database
$("#btnRegister").click(()=>{
		let firstname = $("#firstname").val();
		let lastname = $("#lastname").val();
		let email = $("#email").val();
		let password = $("#password").val();
		let cpassword = $("#cpassword").val();
		let address = $("#address").val();

		let error_flag = 0; //if any error is detected, the form should not be submitted

		// validation for the firstname
		if (firstname == "") {
			$("#error_firstname").css("color","red");
			$("#error_firstname").html("First Name is required!");
			error_flag = 1;
		} else {
			$("#error_firstname").html("");
		}

		// validation for the lastname
		if (lastname == "") {
			$("#error_lastname").css("color","red");
			$("#error_lastname").html("Last Name is required!");
			error_flag = 1;
		} else {
			$("#error_lastname").html("");
		}

		// validation for the email
		if (email == "") {
			$("#error_msg_email").css("color","red");
			$("#error_msg_email").html("Email is required!");
			error_flag = 1;
		} else {
			$("#error_msg_email").html("");
		}

		
		// validation for the password
		if (password == "" ) {
			$("#error_password").css("color","red");
			$("#error_password").html("Password is required!");
			error_flag = 1;
		} else {
			$("#error_password").html("");
		}

		// validation for the cpassword
		if ((password != cpassword) || (cpassword == "")) {
			$("#error_cpassword").css("color","red");
			$("#error_cpassword").html("Password and Confirm Password do not match!");
			error_flag = 1;
		} else {
			$("#error_cpassword").html("");
		}

		// validation for the address
		if (address == "") {
			$("#error_address").css("color","red");
			$("#error_address").html("Address is required!");
			error_flag = 1;
		} else {
			$("#error_address").html("");
		}

		if(error_flag == 0){
		// then we can submit the form			
			$("#form_register").submit();				
		}
	});


// =================================== LOGIN =================================== //


$("#btnLogin").click(()=>{
		$("#error_message").html("");
		let loginEmail = $("#loginEmail").val();
		let loginPassword = $("#loginPassword").val();

		let error_flag2 = 0; //if any error is detected, the form should not be submitted

		// to debug
		// alert(email + " " + password);

		// validation for the email
		if (loginEmail == "") {
			$("#loginEmail").next().css("color","red");
			$("#loginEmail").next().html("This field is required");
			error_flag2 = 1;
		} else {
			$("#loginEmail").next().html("");
		}

		// validation for the password
		if (loginPassword == "") {
			$("#loginPassword").next().css("color","red");
			$("#loginPassword").next().html("This field is required");
			error_flag2 = 1;
		} else {
			$("#loginPassword").next().html("");
		}

		if(error_flag2 == 0){
			// then we can submit the form
			$.ajax({
				"url" : "../controllers/process_login.php",
				"data" : {"loginEmail" : loginEmail,    
						"loginPassword" : loginPassword},
				"type" : "POST",
				"success" : (data) => {						
					if(data == "Invalid") {	
						$("#error_message").css("color", "red");
						$("#error_message").html("Invalid email/password");
					}else{					
						$("#form_login").submit();									
					}
				}
			});
		}
	});


// function pageRedirect() {
//     window.location.href("catalog.php");
// }      


// =================================== CART =================================== //


$(document).ready(function(){
	loadCart();
});



// =================================== CHECKOUT =================================== //

$(document).on("click","#btnCheckOut",()=>{
	let totalOrder = $("#grandTotal").text();
	
	$("#orderSummary").text(totalOrder);

	
		
// 	// let grandTotal = $("#grandTotal").val;

// 	// if (grandTotal == 0) {
	
// 	// } else {
// 	// 	window.location.href="checkout.php";
// 	// }
});