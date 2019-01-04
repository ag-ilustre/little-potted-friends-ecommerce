<?php
     
  require 'connect.php';

  $id = $_POST['id'];

   $data = "
    <table class='table table-hover'>
      <thead>
        <tr>
          <th width='30%'>Product</th>
          <th width='20%'>Price</th>
          <th width='20%'>Quantity</th>
          <th width='20%'>Sub-total</th>         
        </tr>
      </thead>
      <tbody>";

      // Product | Price | Quantity | Sub-total
  $sql = "SELECT o.id, oi.order_id, oi.quantity, oi.price, i.id, i.name AS product
          FROM tbl_order_items AS oi
          INNER JOIN tbl_orders AS o
              ON o.id = oi.order_id
          INNER JOIN tbl_items AS i
              ON o.item_id = i.id
          WHERE o.id = '$id'"; 

  $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) == 1) {
       while ($row = mysqli_fetch_assoc($result)) {
         $name = $row["product"];
         $quantity = $row["quantity"];
         $price = $row["price"];
         $formatted_price = number_format($price, 2, '.', ',');

           //For computing the sub total 
           $subTotal = $quantity * $price;
           $formatted_subTotal = number_format($subTotal, 2, '.', ',');

           $data .=
             "<tr>
                 <td>$name</td>
                 <td>&#x20B1; $formatted_price</td>
                 <td>$quantity</td>
                 <td>&#x20B1; $formatted_subTotal</td>
             </tr>";
       }
       $data .="</tbody></table>";
   } 

  echo $data;
?>