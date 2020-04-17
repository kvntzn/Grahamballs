<?php  

include 'lib/connect.php';
 
	$id = $_GET['id'];
	$userid = $_GET['uid'];

	$check = "SELECT * from tbl_stocks where stock_id='$id'";
	$get=mysqli_query($conn,$check);
		while($query=mysqli_fetch_assoc($get)){
			$sname = $query['stock_name'];
			$numquan =$query['stock_quantity'];
			$squan = 1;
			$sprice = $query['stock_price'];
			 $scategory = $query['stock_category'];
			 $sbrand = $query['stock_brand'];
			$sale = $query['stock_sale'];
			 $sid = $query['stock_id'];
			 
		
	 

		 

		if($sale>0){
			$dec = $sale/100;
			$total = $sprice*$dec;
			 $stotal = $sprice - $total;


		}
}
		
	$check_pname = "SELECT * from tbl_cart where cart_name='$sname' and cart_user_id = '$userid' and cart_quantity>0 ";
	$run_pname = mysqli_query($conn,$check_pname);
	 

	if(mysqli_num_rows($run_pname)>0){
		$get2=mysqli_query($conn,$check_pname);
		while($fetch=mysqli_fetch_array($get2)){
			$xquan = $squan ;
		}
	$query2 = "UPDATE tbl_cart SET cart_quantity=$xquan WHERE cart_name='$sname'";
		//$query2 = "UPDATE tbl_stock SET stock_quantity=$squan WHERE stock_name='$pname'";
			
	}
	
	else{
		if($sale>0){
			$query2 = "INSERT INTO tbl_cart(cart_name,cart_price, cart_quantity , cart_category,cart_brand, cart_user_id,cart_stock_id)VALUES('$sname','$stotal', '$squan', '$scategory','$sbrand','$userid','$sid' )";
		}else{
			$query2 = "INSERT INTO tbl_cart(cart_name,cart_price, cart_quantity , cart_category,cart_brand, cart_user_id,cart_stock_id)VALUES('$sname','$sprice', '$squan', '$scategory','$sbrand','$userid','$sid' )";
		}
		

	}

	if(mysqli_query($conn,$query2) ){
			
			echo "<script>window.open('checkout.php','_self')</script>";
		}else{
			echo "error";
		}				

?>