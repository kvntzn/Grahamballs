<?php 
	
	include 'lib/connect.php';

	date_default_timezone_set('Asia/Singapore');
			$memo_date  = date("Y-m-d");
		$memo_time = date("h:i:sa");

		$delete_id = $_POST['id'];
		$sql = mysqli_query($conn,"SELECT * FROM tbl_order where order_id=$delete_id");
		$row = mysqli_fetch_array($sql);
		$user_id = $row[6];
		$item = $row[1];


		mysqli_query($conn,"INSERT INTO tbl_memo (memo_title,memo_content,memo_date, memo_time,memo_sender,memo_control,memo_user_id) VALUES ('Order denied','Unfortunately your order $item was cancelled','$memo_date','$memo_time','Battery delivery staff','3','$user_id')");
		
		$query = "DELETE from tbl_order where order_id='$delete_id'";

		if(mysqli_query($conn,$query)){
			echo "Deleted successfully";
		}
 ?>

