<?php session_start(); ?>

<?php                        
    if(!isset($_SESSION['email'])){ 
      header("Location: login.php");
    }
?>

<?php require_once '../partials/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8 col-md-12 col-sm-12">
			<section id="profileSection">
				<div class="text-center"><h2 id="profileAlertMsg"></h2></div>
				
				<!-- avatar | name | buttons -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 text-center m-0">
						<img src="../assets/images/favicon.png" class="img-fluid profilePicAndName" id="profileAvatar">
						<p class="display-4 my-2 profilePicAndName"><?= $_SESSION["firstname"]." ".$_SESSION["lastname"]; ?></p>
						
					</div>
				</div>
				<hr>
				<!-- info table -->
				<div class="row p-1 mx-auto">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<table class="table table-borderless">
							<tr>
								<th scope="row">Email</th>
								<td><?= $_SESSION["email"]; ?></td>
							</tr>
							<tr>
								<th scope="row">Mobile Number</th>
								<td><?= $_SESSION["mobile"]; ?></td> 
							<tr>
								<th scope="row">Delivery Address</th>
								<td><?= $_SESSION["address"]; ?></td>
							</tr>
							</tr>
						</table>
					</div>
				</div>

				<div class="row p-1">
					<div class="col-lg-12 text-center">
						<button class="btn btn-info px-1 m-1 btnWider profileBtns" data-toggle="modal" data-target="#editProfileModal">EDIT PROFILE</button>
						<button class="btn btn-secondary px-1 m-1 btnWider profileBtns" data-toggle="modal" data-target="#deactivateAcctModal">DEACTIVATE</button>
					</div>
				</div>
				
			</section>
		</div>
	</div>
</div>

<!-- EDIT PROFILE MODAL -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content bg-light">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="editProfileModalTitle">EDIT PROFILE</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span class="text-dark" aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-6">
							<label for="editFirstName">First Name:</label>
							<input id="editFirstName" type="text" name="editFirstName1" class="form-control bg-light text-dark" value='<?= $_SESSION["firstname"]; ?>'> 
						</div>
						<div class="col-6">
							<label for="editLastName">Last Name:</label>
							<input id="editLastName" type="text" name="editLastName1" class="form-control bg-light text-dark" value='<?= $_SESSION["lastname"]; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">						
						<div class="col-6">
							<label for="editEmail">Email:</label>
							<input id="editEmail" type="email" name="editEmail1" class="form-control bg-light text-dark" value='<?= $_SESSION["email"]; ?>'/>
						</div>
						<div class="col-6">
							<label for="editMobile">Mobile Number:</label>
							<input id="editMobile" type="number" name="editMobile1" class="form-control bg-light text-dark" value='<?= $_SESSION["mobile"]; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="editAddress">Delivery Address:</label>
					<input id="editAddress" type="text" name="editAddress1" class="form-control bg-light text-dark" value='<?= $_SESSION["address"]; ?>'>
				</div>
				<div class="text-center mt-3">
					<button type="submit" class="btn btn-info btnWider mr-2" onclick="editProfile(<?= $_SESSION["id"]; ?>)" data-dismiss="modal">SAVE</button>
					<button type="button" class="btn btn-dark btnWider" data-dismiss="modal">CANCEL</button>
				</div>
	      	</div> <!-- end of modal-body -->
	    </div> <!-- end of modal-content -->
	</div> <!-- end of modal-dialog -->
</div> <!-- end of modal -->

<!-- DEACTIVATE PROFILE MODAL -->
<div class="modal fade" id="deactivateAcctModal" tabindex="-1" role="dialog" aria-labelledby="deactivateAcctModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content bg-light">
	      	<div class="modal-body">
	      		<div class="row mb-1">
	      			<div class="col-3 col-sm-3 col-md-3 col-lg-3 text-center py-4">
			      		<i class="fas fa-exclamation-triangle fa-7x text-warning"></i>
	      			</div>
	      			<div class="col-9 col-sm-9 col-md-9 col-lg-9 pt-4"">
			      		<h5 class="text-dark">Are you sure you want to deactivate your account?</h5>
			      		<h5 class="text-dark">You will no longer be able to log in once your account has been deactivated.</h5>
	      			</div>
	      			
	      		</div>
	      		<div class="row">
	      			<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
	      				<button type="button" class="btn btn-warning btnWider mr-2" onclick="deactivateAcct(<?= $_SESSION["id"]; ?>)" data-dismiss="modal">YES</button>
      					<button type="button" class="btn btn-info btnWider" data-dismiss="modal">NO</button>
	      			</div>
	      		</div>
	      	</div> <!-- end of modal-body -->
	    </div> <!-- end of modal-content -->
	</div> <!-- end of modal-dialog -->
</div> <!-- end of modal -->

<?php require '../partials/footer.php'; ?>