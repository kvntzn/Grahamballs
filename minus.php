<?php
include 'lib/connect.php';

	$minus = $_GET['minus'];
	$id = $_GET['id'];
		$sid = $_GET['sid'];
						$idget=mysqli_query($conn,"SELECT * FROM tbl_cart Where cart_id='$id' and cart_quantity < (SELECT stock_quantity from tbl_stocks where stock_id = '$sid') and cart_quantity > 0  ");
		 			 	$row = mysqli_fetch_array($idget);
		 			 	$quantity = $row['cart_quantity'];
 
	 
	$quan = $quantity - $minus;

	$query2 = "UPDATE tbl_cart SET cart_quantity='$quan'  WHERE cart_id='$id'";
	
	if(mysqli_query($conn,$query2) ){
			
			echo "<script>window.open('cart.php','_self')</script>";
		}else{
			echo "error";
		}		


 ?>
