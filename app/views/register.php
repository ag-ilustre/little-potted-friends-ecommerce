<?php require_once '../partials/header.php'; ?>

<div class="container">
    <div class="row">
        
        <div class="col-lg-12">
        	<form method="POST" action="catalog.php" id="form_register">
        		<!-- in the meantime, use "required" in input filed -->
        		<div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control mb-1" name="firstname" id="firstname" required>
                    <p id="error_firstname"> </p>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control mb-1" name="lastname" id="lastname" required>
                    <p id="error_lastname"> </p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control mb-1" name="email" id="email">
                    <p id="error_msg_email"> </p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control mb-1" name="password" id="password" required>
                    <p id="error_password"> </p>
                </div>
                 <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control mb-1" name="cpassword" id="cpassword" required>
                    <p id="error_cpassword"> </p>
                </div>
        		<div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control mb-1" name="address" id="address" required>
                    <p id="error_address"> </p>
                </div>
                <div class="text-center mt-2">

	                <button class='btn btn-dark btn-block' type='submit' id='btnRegister' disabled=''>SUBMIT</button>

                </div>
        	</form>
        </div>      
      
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<!-- footer -->
<?php include '../partials/footer.php'; ?>