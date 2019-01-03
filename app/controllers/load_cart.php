<?php session_start(); ?>
<h1 class="mb-4 text-center">Your Cart</h1>

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
                           $formatted_subTotal = number_format($subTotal, 2, '.', ',');

                           $grand_total += $subTotal;

                            $_SESSION["total"] = number_format($grand_total, 2, '.', ',');
                            //<input type="text" data-validation="number" data-validation-allowing="range[1;100]">

                            //$english_format_number = number_format($number, 2, '.', '');
                           $data .=
                             "<tr>
                                 <td>$name<br><img src='$row[img_path]' width='30%' height='auto'></td>
                                 <td id='price$id'>&#x20B1; $price</td>
                                 <td><input type='number' class='form-control alignQuantity' value='$quantity' id='quantity$id'  min='1' onchange='changeNoItems($id)' oninput='this.value = Math.abs(this.value)'></td>
                                 <td class='sub-total' id='subTotal$id'>&#x20B1; $formatted_subTotal </td>
                                 <td><button class='btn btn-danger' onclick='removeFromCart($id)'><i class='fas fa-trash-alt'></i></button></td>
                             </tr>";
                       }
                   }
    }

    $formatted_grand_total = number_format($grand_total, 2, '.', ',');

    $data .="<tr>
              <td colspan='5' class='text-center'><h5>TOTAL: &#x20B1; <span id='grandTotal'> $formatted_grand_total </span><h5></td>
            </tr>
            <tr>
              <td colspan='5' class='text-center'><a class='btn btn-info btnWider' id='btnCheckOut' href='../views/checkout.php'>CHECKOUT</a></td>
            </tr>
            </tbody></table>";

  } 

  echo $data;
?>
