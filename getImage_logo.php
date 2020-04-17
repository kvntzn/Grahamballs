<?php

include 'lib\connect.php';
  $id = $_GET['id'];
  
  // do some validation here to ensure id is safe

 
  $sql = "SELECT logo_img FROM tbl_logo WHERE logo_id=$id";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  

  header("Content-type: image/jpeg");
  echo $row['logo_img'];
?>