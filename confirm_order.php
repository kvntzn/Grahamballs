 <?php 
	
include 'lib/connect.php';

		$id =$_POST['id'];
		// $loc = $_GET['loc'];
		date_default_timezone_set('Asia/Singapore');
		$date = date("Y-m-d");

		$sql = mysqli_query($conn,"SELECT * FROM tbl_order WHERE order_id=$id");
	 	$row =  mysqli_fetch_assoc($sql);

		$sid = $row['order_stock_id'];
		$sname = $row['order_name'];
		$fullname = $row['order_fullname'];
		$sprice = $row['order_price'];
		$ex_quan = $row['order_quantity'];
		$dest =  ''.$row['order_barangay'].' , '.$row['order_city'].', '.$row['order_province'].' ';

		$sql2 = mysqli_query($conn,"SELECT * FROM tbl_stocks where stock_id =$sid ");
		$row2 = mysqli_fetch_assoc($sql2);
		$squan = $row2['stock_quantity'] - $ex_quan;
		$scat = $row2['stock_category'];
		$sbrand = $row2['stock_brand'];


		// $sql3 = mysqli_query($conn,"SELECT * FROM tbl_stores where store_id=$loc");
		// $row3 = mysqli_fetch_assoc($sql3);
		// $org = $row3['store_location'];
		// $time =   date('Y-m-d H:i:s');

	 	//  $sql4 = mysqli_query($conn,"SELECT * FROM tbl_deliver where deliver_store='$org' ORDER BY deliver_id Desc " );
	 	//  $num_deliver = mysqli_num_rows($sql4);
	 	//  $row4 = mysqli_fetch_assoc($sql4);
		 // $last_time = $row4['deliver_avail'];

	
		 // if($time > $last_time){
 		
 		// $addTime = date('Y-m-d H:i:s',strtotime('+40 minutes',strtotime($time)));

 		// $query3 = mysqli_query($conn,"INSERT INTO tbl_deliver(deliver_order_id , deliver_date , deliver_store,deliver_dest,deliver_time,deliver_avail)VALUES('$id','$date','$org','$dest','$time','$addTime')");

		$query3=mysqli_query($conn,"INSERT INTO tbl_ready(re_name, re_price , re_quantity, re_date,re_category,re_brand,re_fullname,re_place,re_order_id,re_stock_id)VALUES('$sname', '$sprice' ,'$ex_quan', '$date','$scat','$sbrand','$fullname','$dest','$id','$sid')");
		$query2=mysqli_query($conn,"INSERT INTO tbl_export(ex_name, ex_price , ex_quantity, ex_date,ex_category,ex_brand,ex_order_id,ex_stock_id)VALUES('$sname', '$sprice' ,'$ex_quan', '$date','$scat','$sbrand','$id','$sid')");
		
	
		


		$del = mysqli_query($conn,"DELETE FROM tbl_order where order_id =$id" );
		if($query||$query2){
				echo "Confirmed";
		}
		else { echo "error";
			}
		 
?>				
		 
 