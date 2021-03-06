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
    $sql = "SELECT i.id AS product_id, i.name AS product_name, i.price, i.description, i.img_path, i.category_id, c.id, c.name AS category_name
          FROM tbl_items AS i
          INNER JOIN tbl_categories AS c 
            ON i.category_id = c.id
          ";

    $result = mysqli_query($conn, $sql);


?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 table-responsive">
          <div class="text-center p-0"><h2 id="manageProductsAlertMsg" class="p-0"></h2></div>
    		  <h4 class="text-center p-2 mb-2 display-4">MANAGE PRODUCTS</h4>

          <!-- ADD A PRODUCT -->
          <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#addProductModal"><i class="fas fa-plus-circle fa-sm"></i>   NEW PRODUCT</button>

    			<table  id="tableManageProducts" class="table table-hover mb-4">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">Product ID</th>
                            <th width="10%">Product Name</th>                            
                            <th width="15%">Image</th>
                            <th width="10%">Price (&#8369;)</th>
                            <th width="25%">Description</th>
                            <th width="10%">Catergory</th>
                            <th width="25%">Action</th>                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){ 
                              $product_id = $row['product_id'];
                              $product_name = $row['product_name'];
                              $img_path = $row['img_path'];
                              $price = $row['price'];
                              $description = $row['description'];
                              $category_name = $row['category_name'];

                              ?>
                        <tr>
                            <td class="text-center"><?= $product_id ?></td>
                            <td><?= $product_name ?></td>
                            <td class="text-center"><img src="<?= $img_path ?>" width="25%" height="auto"></td>
                            <td class="text-right"><?= $price ?></td>
                            <td class="text-justify"><?= $description ?></td>
                            <td><?= $category_name ?></td>
                            <td class="text-center">
                                <!-- EDIT -->
                                <!-- VARIABLEs: product_id, product_name, img_path, price, description, category_id, category_name-->
                                <span title="Edit Product Details"><button type="button" class="btn btn-info m-1" data-toggle="modal" data-target="#editProductModal" onclick="displayEditProductDetails('<?= $row['product_id']; ?>','<?= $row['product_name']; ?>','<?= $row['price']; ?>','<?= $row['description']; ?>','<?= $row['category_id']; ?>')"><i class="fas fa-edit"></i></button></span>
                                <!-- <span title="Edit Product Details"><button type="button" class="btn btn-info m-1" id="btnEditProduct$product_id" onclick="showEditProduct('<?= $product_id ?>','<?= $product_name ?>','<?= $price ?>','<?= $description ?>','<?= $category_id ?>')"><i class="fas fa-edit"></i></button></span> -->

                                <!-- UPLOAD IMAGE -->                                
                                <span title="Upload Image"><button type="button" class="btn btn-info m-1" data-toggle="modal" data-target="#uploadImageModal" onclick="displayUploadImage('<?= $product_id ?>', '<?= $product_name ?>')"><i class="fas fa-image"></i></button></span>

                                <!-- DELETE -->
                                <span title="Delete Product"><button type="button" class="btn btn-danger m-1" data-toggle="modal" data-target="#deleteProductModal" onclick="deleteProduct('<?= $product_id ?>', '<?= $product_name ?>')"><i class='fas fa-trash-alt'></i></button></span>
                                
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

<!-- ADD PRODUCT MODAL -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalTitle">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal-body -->
      <div class="modal-body">
        <!-- <form action="../controllers/add_product.php" method="post" id="formAddProduct"> -->
        <div class="form-group">
          <div class="row">
            <div class="col-8">
              <label for="addProductName">Product Name:</label>
              <input id="addProductName" type="text" name="addProductName" class="form-control bg-light text-dark">
              <p id="error_addProductName"></p>
            </div>
            <div class="col-4">
              <label for="addProductPrice">Price:</label>
              <input id="addProductPrice" type="number" name="addProductPrice" class="form-control bg-light text-dark">
              <p id="error_addProductPrice"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="addProductDescription">Description</label>
          <textarea name="addProductDescription" id="addProductDescription" class="form-control bg-light text-dark"></textarea>
          <p id="error_addProductDescription"></p>
        </div>
        <div class="form-group">
<!-- dynamically generate categories -->
<?php
  require_once '../controllers/connect.php';

    $sql = "SELECT * FROM tbl_categories";

    $result = mysqli_query($conn, $sql);
?>
          <label for="addProductCategory">Catergories</label>
          <select class="custom-select" id="addProductCategory" name="addProductCategory"  class="form-control bg-light text-dark">
            <option selected="" value=""> ------ </option>
    <?php 
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){ ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
    <?php } } ?>
          </select>
          <p id="error_addProductCategory"></p>
        </div>
        <!-- </form> -->
  
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-2">
            <button type="button" class="btn btn-info btnSlim mr-2" onclick="addProduct()">SAVE</button>
            <button type="button" class="btn btn-dark btnSlim" data-dismiss="modal">CANCEL</button>
          </div>
        </div>      
      </div>
      <!-- end of modal-body -->
    </div>
  </div>
</div>
<!-- end of ADD PRODUCT MODAL -->

<!-- EDIT PRODUCT MODAL -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalTitle">Edit Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal-body -->
      <div class="modal-body">
        <span id="getEditProductId"></span>
        <!-- <form action="../controllers/add_product.php" method="post" id="formAddProduct"> -->
        <div class="form-group">
          <div class="row">
            <div class="col-8">
              <label for="editProductName">Product Name:</label>
              <input id="editProductName" type="text" name="editProductName" class="form-control bg-light text-dark">
              <p id="error_editProductName"></p>
            </div>
            <div class="col-4">
              <label for="editProductPrice">Price:</label>
              <input id="editProductPrice" type="number" name="editProductPrice" class="form-control bg-light text-dark">
              <p id="error_editProductPrice"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="editProductDescription">Description</label>
          <span id="getEditProductDescription"></span>
          <p id="error_editProductDescription"></p>
        </div>
        <div class="form-group">
<!-- dynamically generate categories -->
<?php
  require_once '../controllers/connect.php';

    $sql = "SELECT * FROM tbl_categories";

    $result = mysqli_query($conn, $sql);
?>
          <label for="editProductCategoryId">Catergories</label>
          <select class="custom-select" id="editProductCategoryId" name="editProductCategoryId"  class="form-control bg-light text-dark">
    <?php 
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){ ?>

            <option id="optionEditProductCatergoryId<?= $row['id'] ?>" value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
    <?php } } ?>
          </select>
          <p id="error_editProductCategory"></p>
        </div>
        <!-- </form> -->

        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-2">
            <button type="button" class="btn btn-info btnSlim mr-2" data-dismiss="modal" onclick="editProductDetails()">SAVE</button>
            <button type="button" class="btn btn-dark btnSlim" data-dismiss="modal">CANCEL</button>
          </div>
        </div>
      </div>
      <!-- end of modal-body -->
    </div>
  </div>
</div>
<!-- end of EDIT PRODUCT MODAL -->

<!-- UPLOAD IMAGE MODAL -->
<div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="uploadImageModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadImageModalTitle">Upload Product Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../controllers/upload_image.php" method="POST" enctype="multipart/form-data" id="formUploadImage">
      <div class="modal-body">
        <p><span id="displayProductName"></p>
        <div class="form-group">
          <p>Product Image: </p>
          <div class="text-center">
            <input type="file" name="upload" id="uploadImage" class="mb-3">
            <span id="getProductId"></span>
            <div id="error_uploadImage"></div>
          </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
              <button type="submit" class="btn btn-info btnSlim mr-2">UPLOAD</button>
              <button type="button" class="btn btn-dark btnSlim" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
      </div> 
      <!-- end of modal-body -->
      </form>
    </div>
  </div>
</div>
<!-- end of UPLOAD IMAGE MODAL -->

<!-- DELETE PRODUCT MODAL -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteProductModalTitle">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row m-1">
          <p>Are you sure you want to delete <strong><span id="deleteItemId"></span></strong>?</p>
        </div>
      
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <button type="button" class="btn btn-info btnSlim mr-2" id="btnDeleteProduct" data-dismiss="modal">YES</button>
            <button type="button" class="btn btn-dark btnSlim" data-dismiss="modal">NO</button>
          </div>
        </div>
      
      </div> <!-- end of modal-body -->
    </div> <!-- end of modal-content -->
  </div> <!-- end of modal-dialog -->
</div> <!-- end of modal -->


<?php require '../partials/footer.php'; ?>

<script>
$(document).ready( function () {
    $('#tableManageProducts').DataTable();
} );
</script>