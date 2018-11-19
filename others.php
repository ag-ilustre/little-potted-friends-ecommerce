<!-- from catalog -->

<?php require "connect.php";
  $sql = "SELECT * FROM tbl_categories";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      echo "
      <a href='#' class='list-group-item' onclick='showCategories($row[id])'>$row[name]</a>";						          
    }
  }
?>