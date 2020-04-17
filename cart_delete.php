<?php
include 'lib/connect.php';

	 
		$delete_id = $_POST['id'];
		
		$query = "DELETE from tbl_cart where cart_id='$delete_id'";

		if(mysqli_query($conn,$query)){
			echo "Delete success";
		};

		
 ?>

