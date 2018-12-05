<?php session_start(); ?>
<h1>My Cart</h1>

<?php 
  
  
  include 'connect.php';
  $data ='
           <table class="table table-hover">
             <thead>
               <tr>
                 <th scope="col">Product</th>
                 <th scope="col">Price</th>
                 <th scope="col">Quantity</th>
                 <th scope="col">Sub-total</th>
                 <th scope="col"></th>
               </tr>
             </thead>
             <tbody>
    ';

  if(!isset($_SESSION["item_count"])){
    echo "Your cart is empty!<br><br>";
  } else {

  $grand_total = 0;
  foreach($_SESSION['cart'] as $id => $quantity) {
     $sql = "SELECT * FROM tbl_items where id = '$id' ";
               $result = mysqli_query($conn, $sql);
                 if(mysqli_num_rows($result) > 0){
                     while($row = mysqli_fetch_assoc($result)){
                       $name = $row["name"];
                       $description = $row["description"];
                       $price = $row["price"];

                         //For computing the sub total and grand total
                         $subTotal = $quantity * $price;
                         $grand_total += $subTotal;

                         $data .=
                           "<tr>
                               <td><img src='$row[img_path]' width='25%' height='25%'> $name</td>
                               <td id='price$id'> $price</td>
                               <td><input type='number' class ='form-control' value ='$quantity' id='quantity$id'  min='1' size='5' onchange = changeNoItems($id)></td>
                               <td class='sub-total' id='subTotal$id'>$subTotal</td>
                               <td><button class='btn btn-danger' onclick='removeFromCart($id)'>Remove</button></td>
                           </tr>";
                     }
                 }
  }

  $data .="<tr>
            <td colspan=4><h5 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><h5></td>
            <td></td>
            </tr>
            </tbody></table>";
  }

  echo $data;

?>