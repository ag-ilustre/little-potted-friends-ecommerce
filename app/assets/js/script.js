// =================================== FUNCTIONS =================================== //

//CATALOG
function showCategories(categoryId){
	$('#catalog-category-selected').html("");
	switch(categoryId) {
	  case 1:
	    $('#catalog-category-selected').html("Single Pots");		
	    break;
	  case 2:
	    $('#catalog-category-selected').html("Sets in Style");		
	    break;
	  case 3:
	    $('#catalog-category-selected').html("Care Supplies");
	    break;	
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

	if (quantity > 0) {
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
		});
	} else {
		$("#error_quantity" + id).css("color","rgb(185, 74, 72)");
		$("#error_quantity" + id).html("*Quantity must be at least 1");
	}
}


//FOR "DISPLAY PRODUCT INFO" MODAL: new add to cart
function modalNewAddToCart(id){
	let modalQuantity = $("#modalQuantity" + id).val();
	// alert(productId);
	console.log("Quantity: " + modalQuantity);
	console.log("ProductId: " + id);

	if (modalQuantity > 0) {
		$.ajax({
		  url: "../controllers/add_to_cart.php",
		  method: "POST",
		  data: 
		    {
		      productId: id,
		      modalQuantity: quantity
		    },
		  dataType: "text",
		    success: function(data){
		      $('a[href="cart.php"]').html(data);
		    }
		});
	} else {
		$("#modal_error_quantity" + id).css("color","rgb(185, 74, 72)");
		$("#modal_error_quantity" + id).html("*Quantity must be at least 1");
	}
}


function clearErrorMsgOnQuantity(qtyId) {
	//testing on show_items.php
	// alert(qtyId);
	$("#error_quantity" + qtyId).html("");
	$("#modal_error_quantity" + qtyId).html("");
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
	var ans = confirm("Are you sure you want to remove this from the cart?");
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

function emptyCart(value) {
	var ans1 = confirm("Are you sure you want to remove ALL items?");
	if(ans1){
		// alert("You answere YES!");
		$.ajax({
			url: "../controllers/empty_cart.php",
			method: "POST",
			data: {value:value},
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
			$.post("../controllers/process_login.php", {"loginEmail" : loginEmail, "loginPassword" : loginPassword}, function(data){
				if(data == 1){					
					document.location = 'catalog.php'; 
					// alert("SUCCESS");
					
				} else {
					// alert("Invalid Email/Password");
					$("#errorLoginMsg").css("color","rgb(185, 74, 72)");
					$("#errorLoginMsg").html("*Invalid email/password");	
				}

			});

			// $.ajax({
			// 	"type" : "POST",
			// 	"url" : "../controllers/process_login.php",
			// 	"data" : {"loginEmail" : loginEmail,    
			// 			"loginPassword" : loginPassword},
			// 	"dataType": "text",
			// 	"success" : (data) => {						
			// 			if (data == "Invalid") {
								
			// 				// $("#form_login").submit();	
			// 				// $("#loginPassword").html("");
			// 				// alert(data);
			// 			} 

			// 			// if (!data) {		
			// 			// 	// document.location = 'login.php'; 							
			// 			// 	// setTimeout("location.reload(true);",1500);		
			// 			// 	alert(data);								
			// 			// } 

			// 	}
			// });
		}

		$("#errorLoginMsg").html("");
	});





// =================================== CART =================================== //
$(document).ready(function(){
	//scroll to top
	$(window).scroll(function(){
	    if ($(this).scrollTop() > 20) {
	        $('.scrollup').fadeIn();
	    } else {
	        $('.scrollup').fadeOut();
	    }
	}); 
	
	$('.scrollup').click(function(){
	    $("html, body").animate({ scrollTop: 0 }, 600);
	    return false;
	});


	loadCart();
	 // $("#tableManageUsers").DataTable();
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

// =================================== EDIT PROFILE (USER/ADMIN) =================================== //
function deactivateAcct(id) {
	$.post("../controllers/deactivate_account.php", 
				{"deactivateId" : id},
				function(data){
					if(data == 1){
						// alert("DEACTIVATED!");
						$("#profileAlertMsg").html("Goodbye <i class='far fa-frown fa-lg'></i>");
						$("#profileAlertMsg").fadeOut(1000, function() {
						    // Animation complete.
						    document.location = 'catalog.php'; 
						 });	
					} 

	});
}

function editProfile(id) {
	
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

		$.post("../controllers/edit_profile.php", 
					{"userId" : id,    
					"editFirstName" : editFirstName,
					"editLastName" : editLastName, 
					"editEmail" : editEmail, 
					"editMobile" : editMobile, 
					"editAddress" : editAddress},
					function(data){
						if(data == 1){
							// alert("Updates saved!");
							$("#profileAlertMsg").html("<i class='far fa-check-square fa-lg'></i> Updates saved!");
							$("#profileAlertMsg").fadeOut(1000, function() {
							    // Animation complete.
							    document.location = 'profile.php'; 
							 });	
						} 

		});
	}
}

// =================================== MANAGE USERS (ADMIN) =================================== //
$("#btnEditUserAccess").click(()=>{
	let editUserId = $("#editUserId").val();
	let editUserAccess = $("#editUserAccess").val();
	// alert(editUserId + editUserAccess);

	let error_flag4 = 0; 

	if (editUserAccess == "ADMIN" || editUserAccess == "NONE") {
		$("#error_editUserAccess").html("");
		error_flag4 = 0;
	} else if (editUserAccess == "") {
		$("#error_editUserAccess").css("color","rgb(185, 74, 72)");
		$("#error_editUserAccess").html("This field cannot be empty");
		error_flag4 = 1;
	} else {
		$("#error_editUserAccess").css("color","rgb(185, 74, 72)");
		$("#error_editUserAccess").html("Please enter a valid input");
		error_flag4 = 1;
	}

	if(error_flag4 == 0){
		$("#editUserAlertMsg").html("");
	// then we can submit the form		
		// alert("NO ERROR");
		$.post("../controllers/change_access.php",
				{"editUserId" : editUserId,
				"editUserAccess" : editUserAccess},
				function(data){
					if(data == 1){
						// alert("Updates saved!");
						$("#editUserAlertMsg").html("<i class='far fa-check-square fa-lg'></i> Updates saved!");
						$("#editUserAlertMsg").fadeOut(1000, function() {
						    // Animation complete.
						    document.location = 'manageUsers.php'; 
						 });	
					} 
		});
	}
});

// =================================== ORDER HISTORY (ADMIN) =================================== //
//to display on Modal
function updateStatus(orderId, transactionCode, statusId, statusName) {
	
	$("#transactionCode").html("Reference Number: " + transactionCode + "<br><input type='hidden' id='orderId' value='" + orderId + "'>");
	// alert(statusId);
	
	//use switch-case to display order status (statusName) as Pending/Completed/Cancelled; display "selected" radio buttons
	if (statusId == 1) {
		$("#updateStatusMessage").html("Status: " + statusName + "<br><p class='mt-1 mb-0'>Select a status:</p><div class='pl-3'><label class='radio'><input type='radio' name='orderStatusId' value='1' checked>  Pending</label><br><label class='radio'><input type='radio' name='orderStatusId' value='2'>  Completed</label><br><label class='radio-inline'><input type='radio' name='orderStatusId' value='3'>  Cancelled</label></div>");
	} else if (statusId == 2){
	  	$("#updateStatusMessage").html("Status: " + statusName + "<br><p class='mt-1 mb-0'>Select a status:</p><div class='pl-3'><label class='radio'><input type='radio' name='orderStatusId' value='1'>  Pending</label><br><label class='radio'><input type='radio' name='orderStatusId' value='2' checked>  Completed</label><br><label class='radio-inline'><input type='radio' name='orderStatusId' value='3'>  Cancelled</label></div>");
	} else if (statusId == 3) {
	    $("#updateStatusMessage").html("Status: " + statusName + "<br><p class='mt-1 mb-0'>Select a status:</p><div class='pl-3'><label class='radio'><input type='radio' name='orderStatusId' value='1'>  Pending</label><br><label class='radio'><input type='radio' name='orderStatusId' value='2'>  Completed</label><br><label class='radio-inline'><input type='radio' name='orderStatusId'  value='3' checked>  Cancelled</label></div>");
	}
		
}

function changeOrderStatus() {
	let orderStatusId = $("input[name='orderStatusId']:checked").val();
	let orderId = $("#orderId").val();
	
	// console.log(orderStatusId + " " + orderId);

	$.post("../controllers/change_order_status.php",
				{"orderStatusId" : orderStatusId,
				"orderId" : orderId},
				function(data){
					if(data == 1){
						// alert("Updates saved!");
						$("#orderHistoryAlertMsg").html("<i class='far fa-check-square fa-lg'></i> Updates saved!");
						$("#orderHistoryAlertMsg").fadeOut(1100, 
							function() {
						    // Animation complete.
						    document.location = 'orderHistory.php'; 
						 });	
					} 
		});
}

function viewOrder(id, transactionCode) {
	$("#showTransactionCode").html(transactionCode);
	// console.log(id + " " + transactionCode);
	$.post("../controllers/view_order_details.php",
				{"id" : id},
				function(data){
					if(data){
						$("#viewOrderMessage").html(data);	
					} 
		});
}

function displayProductInfo(id) {
	$.post("../controllers/display_product_info.php",
		{"id" : id},
		function(data){
			// console.log(data);
		//display to Product Modal
		$("#displayProductInfo").html(data);
	});
}

// =================================== MANAGE PRODUCTS (ADMIN) =================================== //
function displayEditProductDetails(editProductId, editProductName, editProductPrice, editProductDescription, categoryId) {	
	$("#getEditProductId").html("<input type='hidden' id='editProductId' name='editProductId' value='" + editProductId + "'>");
	$("#editProductName").attr("value", editProductName);
	$("#editProductPrice").attr("value", editProductPrice);
	$("#getEditProductDescription").html("<textarea tyep='text' name='editProductDescription' id='editProductDescription' class='form-control bg-light text-dark'>" + editProductDescription + "</textarea>");
	$("#optionEditProductCatergoryId" + categoryId).attr("selected","selected");

	// console.log(editProductId + " " + editProductName + " " + editProductPrice + " " + editProductDescription + " " + editProductCategoryId);
		
}

function editProductDetails() {
	let editProductId = $("#editProductId").val();
	let editProductName = $("#editProductName").val();
	let editProductPrice = $("#editProductPrice").val();
	let editProductDescription = $("#editProductDescription").val();
	let editProductCategoryId = $("#editProductCategoryId").val();

	let error_flag6 = 0; //if any error is detected, the form should not be submitted

	if (editProductName == "") {
		$("#error_editProductName").css("color","red");
		$("#error_editProductName").html("This field is required!");
		error_flag6 = 1;
	} else {
		$("#error_editProductName").html("");
	}

	if (editProductPrice == "") {
		$("#error_editProductPrice").css("color","red");
		$("#error_editProductPrice").html("This field is required!");
		error_flag6 = 1;
	} else if (editProductPrice < 0) {
		$("#error_editProductPrice").css("color","red");
		$("#error_editProductPrice").html("Please enter a valid amount");
		error_flag6 = 1;
	} else {
		$("#error_editProductPrice").html("");
	}

	if (editProductDescription == "") {
		$("#error_editProductDescription").css("color","red");
		$("#error_editProductDescription").html("This field is required!");
		error_flag6 = 1;
	} else {
		$("#error_editProductDescription").html("");
	}

	if(error_flag6 == 0){
		$("#manageProductsAlertMsg").html("");	
		console.log(editProductId + " " + editProductName + " " + editProductPrice + " " + editProductDescription + " " + editProductCategoryId);

		$.post("../controllers/edit_product.php", 
					{"editProductId" : editProductId,    
					"editProductName" : editProductName,    
					"editProductPrice" : editProductPrice,
					"editProductDescription" : editProductDescription, 
					"editProductCategoryId" : editProductCategoryId},
					function(data){
						if(data == 1){
							console.log("Updates saved!");
							$("#manageProductsAlertMsg").html("<i class='far fa-check-square fa-lg'></i> New Product Added!");
							$("#manageProductsAlertMsg").fadeOut(1100, function() {
							    // Animation complete.
							    document.location = 'manageProducts.php'; 
							 });	
						}

		});
	}
} 



function deleteProduct(id){
	var ans2 = confirm("Are you sure you want to remove this product from the catalog?");
	if(ans2){
		// alert("You answere YES!");
		$.post("../controllers/delete_product.php",
					{"id" : id},
					function(data){
						if(data == 1){
							// alert("Updates saved!");
							$("#manageProductsAlertMsg").html("<i class='far fa-check-square fa-lg'></i> Product Removed!");
							$("#manageProductsAlertMsg").fadeOut(1100, 
								function() {
							    // Animation complete.
							    document.location = 'manageProducts.php'; 
							 });	
						} 
			});
	}
}

//get value of category id in Add Product (Admin/mManage Products)
$('#addProductCategory').on('change',function(){
       var addProductCategory = $(this).val();
      
       console.log("category id: " + addProductCategory);
   });

//get value of product description in Add Product (Admin/mManage Products)
$('#addProductDescription').on('change',function(){
       var addProductDescription = $(this).val();
      
       console.log("product description: " + addProductDescription);
   });

function addProduct() {
	let addProductName = $("#addProductName").val();
	let addProductPrice = $("#addProductPrice").val();
	let addProductDescription = $("#addProductDescription").val();
	let addProductCategory = $("#addProductCategory").val();

	let error_flag5 = 0; //if any error is detected, the form should not be submitted

	if (addProductName == "") {
		$("#error_addProductName").css("color","red");
		$("#error_addProductName").html("This field is required!");
		error_flag5 = 1;
	} else {
		$("#error_addProductName").html("");
	}

	if (addProductPrice == "") {
		$("#error_addProductPrice").css("color","red");
		$("#error_addProductPrice").html("This field is required!");
		error_flag5 = 1;
	} else if (addProductPrice < 0) {
		$("#error_addProductPrice").css("color","red");
		$("#error_addProductPrice").html("Please enter a valid amount");
		error_flag5 = 1;
	} else {
		$("#error_addProductPrice").html("");
	}

	if (addProductDescription == "") {
		$("#error_addProductDescription").css("color","red");
		$("#error_addProductDescription").html("This field is required!");
		error_flag5 = 1;
	} else {
		$("#error_addProductDescription").html("");
	}

	if (addProductCategory == "") {
		$("#error_addProductCategory").css("color","red");
		$("#error_addProductCategory").html("This field is required!");
		error_flag5 = 1;
	} else {
		$("#error_addProductCategory").html("");
	}

	if(error_flag5 == 0){
		$("#manageProductsAlertMsg").html("");	
		// console.log(addProductName + addProductPrice + addProductDescription + addProductCategory);
		// $("#formAddProduct").submit();


		$.post("../controllers/add_product.php", 
					{"addProductName" : addProductName,    
					"addProductPrice" : addProductPrice,
					"addProductDescription" : addProductDescription, 
					"addProductCategory" : addProductCategory},
					function(data){
						if(data == 1){
							// alert("Updates saved!");
							$("#manageProductsAlertMsg").html("<i class='far fa-check-square fa-lg'></i> New Product Added!");
							$("#manageProductsAlertMsg").fadeOut(1100, function() {
							    // Animation complete.
							    document.location = 'manageProducts.php'; 
							 });	
						}

		});
	}

}

function displayUploadImage(productId,productName) {
	$("#displayProductName").html("Product Name: " + productName + "<br>Product ID: " + productId);

	$("#getProductId").html("<input type='hidden' id='uploadImageProductId' name='uploadImageProductId' value='" + productId + "'>");
}



// function uploadImage() {
// 	let uploadImageProductId = $("#uploadImageProductId").val();
// 	let upload = $("#upload").val();

// <form id="uploadimage39" class="uploadimage" data-id="39" action="test.php" method="post" enctype="multipart/form-data">
    												
// 	<div id="selectImage">
// 		<label>Select Your Image</label><br/>
// 		<input class="form-control" type="file" name="file" id="file39" required />
// 		<input class="btn btn-success w-100" type="submit" value="Upload" class="submit" />
// 	</div>
// </form>		

		// let uploadImageProductId = $("#uploadImageProductId").val();


		// let data = new FormData(this);
		// data.append("uploadImageProductId", uploadImageProductId);
		// console.log(uploadImageProductId);
		
		// e.preventDefault();
		// $.ajax({
	 //    	url: "../controllers/upload_image.php", // Url to which the request is send
	 //    	type: "POST",             // Type of request to be send, called as method
	 //    	data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
	 //    	contentType: false,       // The content type used when sending data to the server.
	 //    	cache: false,             // To unable request pages to be cached
	 //    	processData:false,        // To send DOMDocument or non processed data file it is set to false
	 //    	success: function()  // A function to be called if request succeeds
	 //    	{
	 //    		if(data == 1) {
		// 	    	$("#manageProductsAlertMsg").html("<i class='far fa-check-square fa-lg'></i> New Product Added!");
		// 	    	$("#manageProductsAlertMsg").fadeOut(1100, function() {
		// 	    	    // Animation complete.
		// 	    	    document.location = 'manageProducts.php'; 
		// 	    	 });	
		//     	} else {
		//     		 $("#error_uploadImage").css("color","red");
		//     		 $("#error_uploadImage").html(data);

		//     	}
	 //    	}
		// });
	//}));



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