<?php 
 session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';


$id = $_POST['id'];
 $control = 0;

$sql = "UPDATE tbl_logo SET logo_control=$control Where logo_id=$id ";

	if(mysqli_query($conn,$sql)){

		echo "Remove as a Logo";
	}

?>