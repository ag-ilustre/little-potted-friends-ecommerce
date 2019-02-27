<?php session_start(); ?>

<?php                        
    if ($_SESSION['access'] != "ADMIN") {
      header("Location: catalog.php");
    } 
?>

<?php require_once '../partials/header.php'; ?>

<?php
	require_once '../controllers/connect.php';

//join tables to show
//    Customer Name | Reference Number | Order Date | Total | Status | <i class="fas fa-search"></i>
    $sql = "SELECT o.id, o.transaction_code, o.purchase_date, o.total, p.name AS paymentMode, o.status_id AS statusId, s.name AS statusName, u.firstname, u.lastname
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
    <div class="col-lg-12 table-responsive">
        <div class="text-center"><h2 id="orderHistoryAlertMsg"></h2></div>    
    		<h4 class="text-center p-2 mb-2 display-4">ORDER HISTORY</h4>    		
    			<table  id="tableOrderHistory" class="table table-hover mb-4">
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
                            <td class="text-right"><?= $row['total']; ?></td> 
                            <td class="text-center"><?= $row['paymentMode'] ?></td>
                            <td id="showNewStatus<?= $row['id'] ?>"><?= $row['statusName'] ?></td>
                            <td>
                               <span title="Update Status"><button id="btnUpdateStatus<?= $row['id'] ?>" type="button" class="btn btn-info m-1" data-toggle="modal" data-target="#updateStatusModal" onclick="updateStatus('<?= $row['id'] ?>','<?= $row['transaction_code'] ?>', '<?= $row['statusId'] ?>')"><i class="far fa-edit"></i></button></span>
                      

                                <span title="View Order Details"><button type="button" class="btn btn-info m-1" data-toggle="modal" data-target="#viewOrderModal" onclick="viewOrder('<?= $row['id'] ?>','<?= $row['transaction_code'] ?>')"><i class="fas fa-search"></i></button></span>
                                
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
<div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="updateStatusModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="updateStatusModalTitle">Update Order Status</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body ml-3">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">          
            <p class="m-1" id="transactionCode"></p>
            <p class="m-1" id="updateStatusMessage"></p>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-2">
            <button type="button" class="btn btn-info btnSlim mr-2" id="btnChangeOrderStatus" data-dismiss="modal">SAVE</button>
            <button type="button" class="btn btn-dark btnSlim" data-dismiss="modal">CANCEL</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- VIEW ORDER MODAL -->
<div class="modal fade" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="viewOrderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order Details for <span id="showTransactionCode"> </span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">
            <p id="viewOrderMessage"></p>
          </div>
          <div class="col-lg-1"></div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-2">
            <button type="button" class="btn btn-dark btnSlim" data-dismiss="modal">CLOSE</button>
          </div>
        </div>
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