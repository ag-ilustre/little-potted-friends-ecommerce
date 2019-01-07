<?php require_once '../partials/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 col-md-12 col-sm-12">
            <h3 class="text-center mb-4">Register and Get Started</h3>
        	<form method="POST" action="../controllers/register_user.php" id="form_register">
        		<!-- in the meantime, use "required" in input filed -->
        		<div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control mb-1" name="firstname" id="firstname" data-validation="length required" data-validation-length="min2">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control mb-1" name="lastname" id="lastname" data-validation="length required" data-validation-length="min2">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control mb-1" name="email" id="email" onkeyup="emailCheck()" data-validation="email required">        
                    <span id="error_msg_email">      
                </div>
                <div class="form-group">
                    <label>Password (at least 8 characters)</label>
                    <input type="password" class="form-control mb-1" name="password_confirmation" id="password" data-validation="length required" data-validation-length="min8">
                </div>
                 <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control mb-1" name="password" id="cpassword" data-validation="confirmation">
                </div>
                <div class="form-group">
                    <label>Mobile No.</label>
                    <input type="number" class="form-control mb-1" name="mobile" id="mobile" data-validation="length required" data-validation-length="min11">
                </div>
        		<div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control mb-1" name="address" id="address" data-validation="length required" data-validation-length="min20">
                </div>
                <div class="text-center mt-2">

                <button class='btn btn-info btn-block' type='submit' id='btnRegister' disabled>SUBMIT</button>

                </div>
        	</form>
        </div>      
      
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<!-- footer -->
<?php require '../partials/footer.php'; ?>

<script>
    $.validate({
        lang: 'en',
        form: '#form_register',
        modules: 'security'
    });

</script>