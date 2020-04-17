<?php 
 session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';


$id = $_POST['stockid'];
$percentage = $_POST['percentage'];


$sql = "UPDATE tbl_stocks SET stock_sale=$percentage Where stock_id=$id ";

	if(mysqli_query($conn,$sql)){

		echo "Stock on Sale";
	}

?>