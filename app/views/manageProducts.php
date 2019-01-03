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

//join tables to show
    $sql = "SELECT i.id AS product_id, i.name, i.price, i.description, i.img_path, i.category_id, c.id, c.name AS category_name
          FROM tbl_items AS i
          INNER JOIN tbl_categories AS c 
            ON i.category_id = c.id
          ";

    $result = mysqli_query($conn, $sql);


?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
    
    		<h4 class="text-center p-2 mb-2">MANAGE PRODUCTS</h4>

          <!-- ADD AN ITEM -->
          <button type="button" class="btn btn-info my-3" data-toggle="modal" data-target="#updateStatusModal" onclick="updateStatus('<?= $row['transaction_code'] ?>','<?= $row['status_name'] ?>')">ADD A NEW ITEM</button>

    			<table  id="tableManageProducts" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">Product ID</th>
                            <th width="10%">Product Name</th>                            
                            <th width="20%">Image</th>
                            <th width="10%">Price</th>
                            <th width="25%">Description</th>
                            <th width="15%">Catergory</th>
                            <th width="15%">Action</th>                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td class="text-center"><?= $row['product_id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td class="text-center"><img src="<?= $row['img_path'] ?>" width="25%" height="auto"></td>
                            <td>&#8369 <?= $row['price'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['category_name'] ?></td>
                            <td class="text-center">
                                <!-- EDIT -->
                                <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#updateStatusModal" onclick="updateStatus('<?= $row['transaction_code'] ?>','<?= $row['status_name'] ?>')"><i class="far fa-edit"></i></button>
                               <!-- DELETE -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#viewOrderModal" onclick="viewOrder('<?= $row['transaction_code'] ?>')"><i class='fas fa-trash-alt'></i></i></a>
                                
                            </td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
    </div>
    <!-- end of col-lg-12 -->
 
  </div>
  <!-- end of row -->
</div>
<!-- end of container -->

<!-- UPDATE STATUS MODAL -->
<div class="modal fade" id="updateStatusModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p id="updateStatusMessage"></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btnWider" data-dismiss="modal">CLOSE</button>
      </div>

    </div>
  </div>
</div>

<!-- VIEW ORDER MODAL -->
<div class="modal fade" id="viewOrderModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order Details for <span id="showTransactionCode"> </span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p id="viewOrderMessage"></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btnWider" data-dismiss="modal">CLOSE</button>
      </div>

    </div>
  </div>
</div>


<?php require '../partials/footer.php'; ?>

<script>
$(document).ready( function () {
    $('#tableManageProducts').DataTable();
} );
</script>