<?php

include 'lib\connect.php';
  $id = $_GET['id'];
  
  // do some validation here to ensure id is safe

 
  $sql = "SELECT stock_image FROM tbl_stocks WHERE stock_id=$id";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);

  $image = $row['stock_image'];
  $simage =  base64_decode($image);
  header("Content-type: image/jpeg");
  echo $simage;
?>