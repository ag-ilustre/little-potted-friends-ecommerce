<?php require_once '../partials/header.php'; ?>

<?php                        
    if(!isset($_SESSION['email'])){ 
    	header("Location: login.php");
    } elseif ($_SESSION['access'] != "ADMIN") {
	    header("Location: catalog.php");
    }
?>

<?php
	require '../controllers/connect.php';

    $sql = "SELECT * FROM tbl_users";

    $result = mysqli_query($conn, $sql);

?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
    
    		<h4 class="text-center p-2">MANAGE USERS</h4>
    		
    			<table  id="tableManageUsers" class="display">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>User </th>
                            <th>Email </th>
                            <th>Mobile </th>
                            <th>Address </th>
                            <th>Access </th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['firstname']." ".$row['lastname'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['mobile'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['access'] ?></td>
                            <td>
                                <a href="editUser.php?id=<?= $row['id'] ?>">Edit</a>
                            </td>
                            <td>
                                <a href="deleteUser.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a> 
                                <!-- confirm will alert if we want to delete -->
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
    </div>
    <!-- end of col-lg-12 -->
 
  </div>
  <!-- end of row -->
</div>
<!-- end of container -->


<?php require '../partials/footer.php'; ?>

<script>
$(document).ready( function () {
    $('#tableManageUsers').DataTable();
} );
</script>