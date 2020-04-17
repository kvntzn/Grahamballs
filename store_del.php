<?php 
	
	include 'lib/connect.php';

		$delete_id = $_POST['id'];
		
		$query = "DELETE from tbl_stores where store_id='$delete_id'";

		if(mysqli_query($conn,$query)){
			echo "<script>window.open('Store_record.php','_self')</script>";
		}
 ?>

