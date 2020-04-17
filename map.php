<?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';


	$org =$_POST['origin'];
	$des = $_POST['destination'];

 
	$query = mysqli_query($conn,"SELECT * FROM tbl_stores where store_location='$org'");
 	$row = mysqli_fetch_array($query);
 
 
 
$rows = $row[0]; 
 $output ="";


 


 $output .='
 <IFRAME width="100%" height="400" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyBt8I3WA3P6GtIecc5Akr_qBVfiko509Co&origin='.$org.'&destination='.$des.'"></IFRAME>

';

 
 
 
 
 

echo $output;
?>
<!--  -->

