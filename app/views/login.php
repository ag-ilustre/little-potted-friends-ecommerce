<?php require '../partials/header.php'; ?>

	<div class="container">
    <div class="row">
        <!-- <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div class="card">
        		<div class="card-header">LOGIN</div>
        		<div class="card-body">
        			<form action="catalog.php" method="POST" id="form_login">
        				<div class="form-group">
        					<label>Email</label>
        					<input type="email" class="form-control" id="loginEmail">
                  <p class="validation"></p>    				
        				</div>
        				<div class="form-group">
        					<label>Password</label>
        					<input type="password" class="form-control" id="loginPassword">    
                  <p class="validation"></p>   				
        				</div> -->
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">Login Form</div>
          <div class="card-body">
            <form action="catalog.php" method="POST" id="form_login">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="loginEmail">
                <p class="validation"></p>            
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="loginPassword">    
                <p class="validation"></p>          
              </div>

              <p id="error_message"></p>

      				<button id="btnLogin" class="btn btn-dark" type="button">SUBMIT</button>
      				<input class="btn btn-warning" type="reset" value="CLEAR">
        		</form>
      		</div>
        </div>
    	</div>
    </div>
  </div>

<!--       <div class="col-lg-4 mx-auto">
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
	</div> -->

<?php require '../partials/footer.php'; ?>