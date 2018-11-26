<?php require_once '../partials/header.php'; ?>

	<div class="container">
    <div class="row">
        
<!--         <div class="card mx-auto">
            		<div class="card-header">LOGIN</div>
            		<div class="card-body">
            			<form action="../controllers/process_login.php" method="POST">
            				<div class="form-group">
            					<label>Email</label>
            					<input type="email" class="form-control" id="login-email">
                      <p class="error_login-email"></p>    				
            				</div>
            				<div class="form-group">
            					<label>Password</label>
            					<input type="password" class="form-control" id="login-password">    
                      <p class="error_login-password"></p>  				
            				</div>

                      <p id="error_message"></p>

            				<button id="btnLogin" class="btn btn-dark" type="submit">SUBMIT</button>
            				<input class="btn btn-warning" type="reset" value="CLEAR">
            			</form>
            		</div>
            	</div> -->

      <div class="col-lg-4 mx-auto">
      	<h2 class="text-center">Login</h2>
				<form method="POST" action="../controllers/process_login.php">
					<div class="form-group">
					  <input type="text" name="email" placeholder="email" class="form-control">
					</div>
					<div class="form-group">
					  <input type="password" name="password" placeholder="password" class="form-control">
					</div>	
				  
				  <button type="submit" class="btn btn-dark btn-block">Submit</button>
				</form>
			</div>

		</div>
	</div>

<?php include '../partials/footer.php'; ?>