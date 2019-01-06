<?php
     
  require_once 'connect.php';

  $id = $_POST['id'];
  $subTotal = 0;

   $data = "
    <table class='table table-hover'>
      <thead>
        <tr>
          <th width='40%'>Product</th>
          <th width='20%'>Price (&#8369;)</th>
          <th width='20%'>Quantity</th>
          <th width='20%'>Sub-total (&#8369;)</th>         
        </tr>
      </thead>
      <tbody>";
    
      // Product | Price | Quantity | Sub-total
  $sql = "SELECT oi.id, oi.quantity, oi.order_id, oi.item_id, o.id, i.id, i.name AS item_name, i.price
          FROM tbl_order_items AS oi
          INNER JOIN tbl_orders AS o
              ON oi.order_id = o.id
          INNER JOIN tbl_items AS i
              ON oi.item_id = i.id
          WHERE o.id = $id"; 

  $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["item_name"];
                $quantity = $row["quantity"];
                $price = $row["price"];
                $formatted_price = number_format($price, 2, '.', ',');

                  //For computing the sub total 
                  $subTotal = $quantity * $price;
                  $formatted_subTotal = number_format($subTotal, 2, '.', ',');

                  $data .=
                    "<tr>
                        <td>$name</td>
                        <td>$formatted_price</td>
                        <td class='text-center'>$quantity</td>
                        <td>$formatted_subTotal</td>
                    </tr>";
              }
              $data .="</tbody></table>";
          } 
          // else {
          // //to catch the error 
          //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          // }

  echo $data;
?>
<!-- 
  // $sql = "SELECT o.id, oi.id, oi.quantity, oi.price, oi.order_id, oi.item_id
  //         FROM tbl_orders AS o
  //         INNER JOIN tbl_order_items AS oi
  //             ON o.id = oi.order_id
  //         WHERE o.id = $id";  -->