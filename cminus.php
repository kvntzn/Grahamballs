<?php
include 'lib/connect.php';

	$minus = 1;
	$id = $_POST['id'];
		$sid = $_POST['sid'];
						$idget=mysqli_query($conn,"SELECT * FROM tbl_cart Where cart_id='$id' and cart_quantity >=1 and cart_quantity <= (SELECT stock_quantity from tbl_stocks where stock_id = '$sid')   ");
		 			 	$row = mysqli_fetch_array($idget);
		 			 	$quantity = $row['cart_quantity'];
 
	 
	$quan = $quantity - $minus;
	if($quan>=1){
	$query2 = "UPDATE tbl_cart SET cart_quantity='$quan'  WHERE cart_id='$id'";
	
	if(mysqli_query($conn,$query2) ){
			
		echo "<script>window.open('checkout.php','_self')</script>";
		}else{
			echo "error";
		}		
	}else
	{
		echo "error";
	}


 ?>
