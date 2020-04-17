<?php


session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

$deleteplace=$_POST['id'];

 $sql = "DELETE FROM tbl_ready WHERE re_place='$deleteplace'";  
if(mysqli_query($conn,$sql)){ 	
	echo 'data deleted';
}

?>

	
	

