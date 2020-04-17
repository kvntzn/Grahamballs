<?php  
include 'lib/connect.php';

	$id = $_POST['id'];
	$check_sname = "SELECT * from tbl_stocks where stock_id='$id'";
	$get=mysqli_query($conn,$check_sname);
		while($query=mysqli_fetch_array($get)){
			$sname = $query['stock_name'];
		}
	$del_stock = mysqli_query($conn,"DELETE from tbl_stocks where stock_id='$id'");
	// $del_pro = mysqli_query($conn,"DELETE from tbl_product where product_name='$sname'");
	// $del_ex = mysqli_query($conn,"DELETE from tbl_export where ex_name='$sname'");		
	
	echo "Stock deleted";					
?>