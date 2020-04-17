<?php 
 session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';


$id = $_POST['stockid'];
 
$reset = 0;

$sql = "UPDATE tbl_stocks SET stock_sale=$reset Where stock_id=$id ";

	if(mysqli_query($conn,$sql)){

		echo "Sale removed";
	}

?>