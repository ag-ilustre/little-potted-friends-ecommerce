<?php session_start(); ?>

<?php                        
    if (($_SESSION['access'] != "ADMIN") && (!isset($id))) {
        header("Location: index.php");
    }
?>

<?php require_once '../partials/header.php'; ?>

<?php 
	
	require '../controllers/connect.php';


	$id = $_GET['id'];

	$sql = "SELECT * FROM tbl_users WHERE id = $id";

	$result = mysqli_query($conn, $sql);

?>

<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="text-center p-2"><h2 id="editUserAlertMsg" class="p-2"></h2></div>
    	<div class="card">
    		<div class="card-header"><h5>Edit User</h5></div>
    		<div class="card-body">
    			<form action="" method="POST">
    				<?php while($row = mysqli_fetch_assoc($result))
    					{ ?>
    					<input type="hidden" id="editUserId" value="<?= $row['id'] ?>">
    				<div class="form-group">
    					<label>Email</label>
    					<input value="<?= $row['email']?>" class="form-control" disabled> 
    				</div>
    				<div class="form-group">
    					<label>Change Access Privileges (ADMIN/NONE)</label>
    					<input type="text" value="<?= $row['access']?>" class="form-control" id="editUserAccess" placeholder="Type ADMIN or NONE to change access privileges">
                        <p id="error_editUserAccess"></p>   				
    				</div>

                    <div class="text-center">
                        <button id="btnEditUserAccess" class="btn btn-info btnSlim mr-2" type="button">SUBMIT</button>
        				<!-- <button type="submit" class="btn btn-info btnWider mr-2" onclick="">SUBMIT</button> -->
        				<input type="reset" class="btn btn-dark btnSlim" value="RESET" >
                    </div>
    			    <?php } ?>
    			</form>
    		</div>
    	</div>
    </div>
    <!-- end of col-lg-8 -->
 
  </div>
  <!-- end of row -->
</div>
<!-- end of container -->
<?php require '../partials/footer.php'; ?>