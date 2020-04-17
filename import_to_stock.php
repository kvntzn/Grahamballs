<?php  

include 'lib/connect.php';
 
	$id = $_POST['id'];
	$store = $_POST['store'];
	$check = "SELECT * from tbl_product where product_id='$id'";
	$get=mysqli_query($conn,$check);
		while($query=mysqli_fetch_assoc($get)){
			$pname = $query['product_name'];
			$pquan = $query['product_quantity'];
			$pprice = $query['product_price'];
			 $pcategory = $query['product_category'];
			 $pbrand = $query['product_brand'];
			$swarning = 2;
			$control = 1;

			$simage = $query['product_image'];
		

		} 
			date_default_timezone_set('Asia/Singapore');
	 	$date = date("Y-m-d");
		$sale = 0;
				 
				 $imageData =  base64_encode($simage);
			  
			 
 

	$check_pname = "SELECT * from tbl_stocks where stock_name='$pname' and stock_store=$store ";
	$run_pname = mysqli_query($conn,$check_pname);
	// $update = "UPDATE tbl_product SET product_control='$control' WHERE product_id='$id'";

	if(mysqli_num_rows($run_pname)>0){
		$get2=mysqli_query($conn,$check_pname);
		while($fetch=mysqli_fetch_array($get2)){
			$squan = $fetch[2] + $pquan;
		}
	$query2 = "UPDATE tbl_stocks SET stock_quantity=$squan, stock_warning=$swarning WHERE stock_name='$pname'";
		//$query2 = "UPDATE tbl_stock SET stock_quantity=$squan WHERE stock_name='$pname'";
			
	}
	
	else{
		$query2 = "INSERT INTO tbl_stocks(stock_name,stock_price, stock_quantity, stock_warning, stock_image,stock_category,stock_brand,stock_date,stock_sale,stock_store)VALUES('$pname','$pprice', '$pquan', '$swarning','$imageData','$pcategory','$pbrand','$date', '$sale','$store')";

	}

	if(mysqli_query($conn,$query2) ){
			$del_query = "DELETE from tbl_product where product_id='$id'";
			mysqli_query($conn,$del_query);
			echo "Products Imported";
		}else{
			echo "error";
		}				

?>