<?php session_start(); ?>
<h1>Your Cart</h1>

<?php   
  
  include 'connect.php';

  if(!isset($_SESSION["item_count"])) {
    $grand_total = 0;
    $data = "Your cart is empty! Go back to <a href='../views/catalog.php'>CATALOG</a>";
  } elseif ($_SESSION["item_count"] == 0) {
    $grand_total = 0;
    $data = "Your cart is empty! Go back to <a href='../views/catalog.php'>CATALOG</a>";
  } else {
    $data = "<table class='table table-hover'>
      <thead>
        <tr>
          <th width='30%'>Product</th>
          <th width='15%'>Price</th>
          <th width='20%'>Quantity</th>
          <th width='25%'>Sub-total</th>
          <th width='10%'> </th>
        </tr>
      </thead>
      <tbody>";
   
   $grand_total = 0;
    foreach($_SESSION['cart'] as $id => $quantity) {
       $sql = "SELECT * FROM tbl_items WHERE id = '$id'";
                 $result = mysqli_query($conn, $sql);
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_assoc($result)){
                         $name = $row["name"];
                         $description = $row["description"];
                         $price = $row["price"];

                           //For computing the sub total and grand total
                           $subTotal = $quantity * $price;
                           $grand_total += $subTotal;

                            $_SESSION["total"] = $grand_total;

                           $data .=
                             "<tr>
                                 <td><img src='$row[img_path]' width='25%' height='25%'> $name</td>
                                 <td id='price$id'> $price</td>
                                 <td><input type='number' class ='form-control' value ='$quantity' id='quantity$id'  min='1' onchange = changeNoItems($id)></td>
                                 <td class='sub-total' id='subTotal$id'>$subTotal</td>
                                 <td><button class='btn btn-danger' onclick='removeFromCart($id)'><i class='fas fa-trash-alt'></i></button></td>
                             </tr>";
                       }
                   }
    }

    $data .="<tr>
              <td colspan='5' class='text-center'><h5>TOTAL: &#x20B1; <span id='grandTotal'>$grand_total </span><h5></td>
            </tr>
            <tr>
              <td colspan='5' class='text-center'><a class='btn btn-primary' id='btnCheckOut' href='../views/checkout.php'>Proceed to Checkout</a></td>
            </tr>
            </tbody></table>";

  } 

  echo $data;
?>
