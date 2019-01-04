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
//    Customer Name | Reference Number | Order Date | Total | Status | <i class="fas fa-search"></i>
    $sql = "SELECT o.transaction_code, o.purchase_date, o.total, p.name AS paymentMode, o.status_id AS statusId, s.name AS statusName, u.firstname, u.lastname
            FROM tbl_orders AS o
            INNER JOIN tbl_users AS u 
                ON o.user_id = u.id
            INNER JOIN tbl_status AS s
                ON o.status_id = s.id
            INNER JOIN tbl_payment_modes as p
                ON o.payment_mode_id = p.id
            "; 

    $result = mysqli_query($conn, $sql);
?>

<div class="container">
  <div class="row">
    <div class="text-center p-2"><h2 id="orderHistoryAlertMsg" class="p-2"></h2></div>
    <div class="col-lg-12">
    
    		<h4 class="text-center p-2 mb-2">ORDER HISTORY</h4>
    		
    			<table  id="tableOrderHistory" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Reference Number</th>
                            <th>Order Date</th>
                            <th>Total (&#8369;)</th>
                            <th>Payment Mode</th>
                            <th>Status</th>
                            <th>Action</th>                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?= $row['firstname']." ".$row['lastname'] ?></td>
                            <td><?= $row['transaction_code'] ?></td>
                            <td><?= $row['purchase_date'] ?></td>
                            <td class="text-right"><?= number_format($row['total'], 2, '.', ','); ?></td> 
                            <td><?= $row['paymentMode'] ?></td>
                            <td><?= $row['statusName'] ?></td>
                            <td>
                                <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#updateStatusModal" onclick="updateStatus('<?= $row['transaction_code'] ?>','<?= $row['statusId'] ?>','<?= $row['statusName'] ?>')"><i class="far fa-edit"></i></button>
                               
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewOrderModal" onclick="viewOrder('<?= $row['transaction_code'] ?>')"><i class="fas fa-search"></i></a>
                                
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
        <h4 class="modal-title"><span id="transactionCode"></span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <span id="updateStatusMessage"></span>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btnWider mr-2" onclick="changeOrderStatus()" data-dismiss="modal">SAVE</button>
        <button type="button" class="btn btn-dark btnWider" data-dismiss="modal">CANCEL</button>
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
    $('#tableOrderHistory').DataTable();
} );
</script>