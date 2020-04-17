<?php   
 
    
include 'lib/connect.php';

	$plus = 1;
	$id = $_POST['id'];
		$sid = $_POST['sid'];
						$idget=mysqli_query($conn,"SELECT * FROM tbl_cart Where cart_id='$id' and cart_quantity < (SELECT stock_quantity from tbl_stocks where stock_id = '$sid') and cart_quantity >=0  ");
		 			 	$row = mysqli_fetch_array($idget);
		 			 	$quantity = $row['cart_quantity'];
 
	 					$numrows = mysqli_num_rows($idget);
	 if($numrows>0){
	$quan = $quantity + $plus;

	$query2 = "UPDATE tbl_cart SET cart_quantity='$quan'  WHERE cart_id='$id'";
	
	if(mysqli_query($conn,$query2) ){
			$response_array['status'] = 'success';
			 
		}else{
			echo "error";
		}		
}else{
 	$response_array['status'] = 'error';
// 	echo "<script>
// alert('No more stocks for the item');
// window.open('checkout.php','_self')</script>"
	
	

}
echo json_encode($response_array);
 ?>
