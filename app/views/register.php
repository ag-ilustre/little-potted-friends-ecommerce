<?php require_once '../partials/header.php'; ?>
<?php require_once '../partials/navbar.php'; ?> 

<div class="container">
    <div class="row">
        
        <div class="col-lg-12">
        	<form method="POST" action="../controllers/register_user.php" id="form_register">
        		<!-- in the meantime, use "required" in input filed -->
        		<div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" required>
                    <p id="error_firstname"> </p>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" required>
                    <p id="error_lastname"> </p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" id="email" required>
                    <p id="error_email"> </p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    <p id="error_password"> </p>
                </div>
                 <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                    <p id="error_cpassword"> </p>
                </div>
        		<div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                    <p id="error_address"> </p>
                </div>
                <div class="text-center mt-2">
	                <input class="btn btn-dark btn-block" type="submit" value="SUBMIT" id="btnRegister">
                </div>
        	</form>
        </div>      
      
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<!-- footer -->
<?php include '../partials/footer.php'; ?>