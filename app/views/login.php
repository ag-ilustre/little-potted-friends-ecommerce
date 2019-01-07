<?php require '../partials/header.php'; ?>


	<div class="container">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">


        <h3 class="text-center mb-4">Please log in for a better shopping experience</h3>        
        <p class="text-center" id="errorLoginMsg"></p>
          <div class="card">          
            <div class="card-body">   
              <form action="" method="post"> 
                  <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input type="text" class="form-control" id="loginEmail">
                    <p id="error_loginEmail"></p>            
                  </div>
                  <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" class="form-control" id="loginPassword">    
                    <p id="error_loginPassword"></p>          
                  </div>    

                 

                  <div class="text-center">
                    <button id="btnLogin" class="btn btn-info btnWider p-1 m-1" type="button">LOGIN</button>
          				  <input class="btn btn-dark btnWider p-1 m-1" type="reset" value="CLEAR">
                  </div>
              </form>  
            </div>               	
          </div>
        
        <!-- <p class="text-center mt-1"><a href="#" id="forgotPassword">Forgot Password?</a></p> -->

    	</div>
    </div>
    <!-- end of row -->
  </div>
  <!-- end of container -->

<?php require '../partials/footer.php'; ?>


<!-- <script>
    $.validate({
        lang: 'en',
        modules: 'security'
    });

</script> -->