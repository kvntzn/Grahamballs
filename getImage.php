<?php

include 'lib\connect.php';
  $id = $_GET['id'];
  
  // do some validation here to ensure id is safe

 
  $sql = "SELECT product_image FROM tbl_product WHERE product_id=$id";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  

  header("Content-type: image/jpeg");
  echo $row['product_image'];
?>