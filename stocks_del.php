<?php 
	
	include 'lib/connect.php';

		$delete_id = $_GET['id'];

		$query = "DELETE from tbl_stocks where stock_id='$delete_id'";

		if(mysqli_query($conn,$query)){
			echo "<script>window.open('stocks.php','_self')</script>";
		}


 ?>
