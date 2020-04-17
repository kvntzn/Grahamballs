<?php 
 session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';


$id = $_POST['id'];
 
$control = 1;
	$check_logo = mysqli_query($conn,"SELECT * FROM tbl_logo Where logo_control=$control");
	$logo_num = mysqli_num_rows($check_logo);

	if($logo_num>0){
		$row = mysqli_fetch_array($check_logo);
		$update = 0;
		$uid = $row[0];
		mysqli_query($conn,"UPDATE tbl_logo SET logo_control=$update where logo_id=$uid");
	}

$sql = "UPDATE tbl_logo SET logo_control=$control Where logo_id=$id ";

	if(mysqli_query($conn,$sql)){

		echo "Logo Confirmed";
	}

?>