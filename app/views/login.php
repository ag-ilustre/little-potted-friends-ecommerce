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
        <div class="text-center mb-4"><h3>Please log in for a better shopping experience</h3></div>
        <div class="card">          
          <div class="card-body">
            <form action="catalog.php" method="POST" id="form_login">
              <div class="form-group">
                <label for="loginEmail">Email</label>
                <input type="email" class="form-control" id="loginEmail">
                <p id="error_loginEmail"></p>            
              </div>
              <div class="form-group">
                <label for="loginPassword">Password</label>
                <input type="text" class="form-control" id="loginPassword">    
                <p id="error_loginPassword"></p>          
              </div>
             

      				<div class="text-center">
                <p id="error_login"></p>
                <button id="btnLogin" class="btn btn-info btnWider mr-2" type="button">LOGIN</button>
        				<input class="btn btn-dark btnWider" type="reset" value="CLEAR">
              </div>
        		</form>
          </div>
        </div>
        <p class="text-center mt-1"><a href="#" id="forgotPassword">Forgot Password?</a></p>

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


<!-- <script>
    $.validate({
        lang: 'en',
        modules: 'security'
    });

</script> -->