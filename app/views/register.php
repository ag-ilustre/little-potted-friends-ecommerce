<?php require_once '../partials/header.php'; ?>

<div class="container">
    <div class="row">
        
        <div class="col-lg-12">
        	<form method="POST" action="../controllers/register_user.php" id="form_register">
        		<!-- in the meantime, use "required" in input filed -->
        		<div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control mb-1" name="firstname" id="firstname">
                    <p id="error_firstname"> </p>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control mb-1" name="lastname" id="lastname">
                    <p id="error_lastname"> </p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control mb-1" name="email" id="email" onkeyup="emailCheck()">
                    <p id="error_msg_email"> </p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control mb-1" name="password" id="password">
                    <p id="error_password"> </p>
                </div>
                 <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control mb-1" name="cpassword" id="cpassword">
                    <p id="error_cpassword"> </p>
                </div>
                <div class="form-group">
                    <label>Mobile No.</label>
                    <input type="number" class="form-control mb-1" name="mobile" id="mobile">
                    <p id="error_mobile"> </p>
                </div>
        		<div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control mb-1" name="address" id="address">
                    <p id="error_address"> </p>
                </div>
                <div class="text-center mt-2">

                <div id="displayBtnRegister"><button class='btn btn-info btn-block' type='button' id='btnRegister'>SUBMIT</button></div>

                </div>
        	</form>
        </div>      
      
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<!-- footer -->
<?php require '../partials/footer.php'; ?>