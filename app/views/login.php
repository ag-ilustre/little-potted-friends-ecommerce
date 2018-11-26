<?php require_once '../partials/header.php'; ?>

	<div class="container">
    <div class="row">
        
      <div class="col-lg-4 mx-auto">
      	<h2 class="text-center">Login</h2>
				<form method="POST" action="../controllers/process_login.php">
					<div class="form-group">
					  <input type="text" name="email1" placeholder="email" class="form-control">
					</div>
					<div class="form-group">
					  <input type="password" name="password1" placeholder="password" class="form-control">
					</div>	
				  
				  <button type="submit" id="btn_submit" class="btn btn-dark btn-block">Submit</button>
				</form>
			</div>
		</div>
	</div>


<?php include '../partials/footer.php'; ?>