<?php require_once '../partials/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
			<section style="padding-top: 100px;">
				<div id="editProfAlertMsg"></div>
				<div class="row p-3">
					<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<img src="../assets/images/favicon.png" class="img-fluid" style="border-radius: 100%;">
					</div>

					<div class="col-12 col-sm-12 col-md-8 col-lg-8">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-9 col-lg-9">
								<h5 class="display-4 mt-2"><?= $_SESSION["firstname"]." ".$_SESSION["lastname"]; ?></h5>
							</div>
							<div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center">
								<button class="btn btn-block btn-info btnWider mt-4 mb-2" data-toggle="modal" data-target="#editProfileModal" id="btnEditProfile">EDIT PROFILE</button>
								<button class="btn btn-block btn-secondary btnWider" data-toggle="modal" data-target="#deactivateAcctModal">DEACTIVATE</button>
							</div>
						</div>
						<hr />
						<table class="table table-borderless">
							<tr>
								<td scope="row">Email</td>
								<td><?= $_SESSION["email"]; ?></td>
							</tr>
							<tr>
								<td scope="row">Mobile Number</td>
								<td>12345678901</td> 
								<!-- ECHO MOBILE NUMBER -->
							<tr>
								<td scope="row">Address</td>
								<td><?= $_SESSION["address"]; ?></td>
							</tr>
							</tr>
						</table>
					</div>
				</div>
				
			</section>
		</div>
	</div>
</div>



<?php require '../partials/footer.php'; ?>