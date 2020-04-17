<?php 
	
	include 'lib/connect.php';

		$delete_id = $_POST['id'];
		
		$query = "DELETE from tbl_memo where memo_id='$delete_id'";

		if(mysqli_query($conn,$query)){
			echo "<script>window.open('memo.php','_self')</script>";
		}
 ?>

