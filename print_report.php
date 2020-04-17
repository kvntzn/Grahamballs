<?php 
session_start();
if(!isset($_SESSION['username'])){
	header("location:index.php");
}
date_default_timezone_set('Asia/Singapore');
include 'lib\controller.php';
$store = $_POST['store'];
$product = $_POST['product'];
 if($store!='all'){
 $sql = mysqli_query($conn,"SELECT * FROM tbl_stores where store_id=$store");
 $row = mysqli_fetch_array($sql);
 $name = $row[1];
 }
 if($product!='all'){
 $sql2 = mysqli_query($conn,"SELECT * FROM tbl_stocks where stock_id=$product");
 $rowz = mysqli_fetch_array($sql2);
 $name_p = $rowz[1];
}

$datex = $_POST['date'];

$mode = $_POST['mode'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Print</title>
	<?php include 'lib\style.php'; ?>
</head>
<body onload="window.print()">
		
	<div class="container-fluid">

	<h2><center>Grahamballs Delivery System <?php if($mode=='daily'){echo "Daily Report";}elseif($mode=="weekly"){echo "Weekly Report";}elseif ($mode=='monthly') {
	echo "Monthly Report";
	}elseif ($mode=='yearly') {
		echo "Annual Report";
	} ?><center></h2>
		<?php
		 
			$date = date('M d Y');
			echo '<p>'.$date.'</p>';
			if($store!='all'){
			echo '<p>Branch name: <b>'.$name.'</b></p>';
				}else{
						echo '<p>Branch name: <b>All stores</b></p>';
				}
				if ($product!='all') {
					echo '<p>Product name: <b>'.$name_p.'</b></p>';
				}else{
					echo '<p>Product name: <b>All Product</b></p>';
				}

 			if($mode=='daily'){
 				echo '<p>Daily Report for the Date of : <b>'.$datex.'</b></p>';
			if($store=="all" && $product=="all"){

					$store = mysqli_query($conn,"SELECT * FROM tbl_deliver WHERE deliver_date = '$datex' ");
			 }
			else if($store=='all'){
					$store = mysqli_query($conn,"SELECT * FROM tbl_deliver WHERE  deliver_stock_id=$product and deliver_date = '$datex' ");
			}else if($product=='all'){
					$store = mysqli_query($conn,"SELECT * FROM tbl_deliver WHERE deliver_store='$name' and deliver_date = '$datex' ");	
			}else{
					$store = mysqli_query($conn,"SELECT * FROM tbl_deliver WHERE deliver_store='$name' and deliver_stock_id=$product and deliver_date = '$datex' ");
			}
		
			}
			else if($mode=='weekly'){
				 

				// $date = new DateTime($datex);
				// $week = $date->format("W");
				$week =  date("W", strtotime($datex));
				// $add = (int)$weekx;
				// $week = $add +1;

				echo '<p>Weekly Report for the Week of : <b>'.$datex.' </b>Week no:<b> '.$week.'</b></p>';
			if($store=="all" && $product=="all"){
					$store = mysqli_query($conn,"SELECT * from tbl_deliver where WEEK(deliver_date,1) = $week");
			 }	
			else if($store=='all'){
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_stock_id=$product and WEEK(deliver_date,1) = $week");
					 
			}else if($product=='all'){
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_store='$name' and WEEK(deliver_date,1) = $week");
					 
			}else{
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_store='$name' and deliver_stock_id=$product and WEEK(deliver_date,1) = $week");
		 
			}

			} 

			else if($mode=='monthly'){

				$mo_ =  date("M", strtotime($datex));		 
				$d = date_parse_from_format("Y-m-d", $datex);
				$month = $d["month"];
				
				echo '<p>Monthly Report for the Month of : <b>'.$mo_.' </b</p>';
				if($store=="all" && $product=="all"){
					$store = mysqli_query($conn,"SELECT * from tbl_deliver where MONTH(deliver_date) = $month");
			 }else if($store=='all'){
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_stock_id=$product and MONTH(deliver_date) = $month");
					 
			}else if($product=='all'){
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_store='$name' and MONTH(deliver_date) = $month");
					 
			}else{
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_store='$name' and deliver_stock_id=$product and MONTH(deliver_date) = $month");
		 
			} 

			}

			else if($mode='yearly'){

				$date = DateTime::createFromFormat("Y-m-d", $datex);
						$year =  $date->format("Y");
						
						echo '<p>Annual Report for the Year of : <b>'.$year.' </b</p>';

			if($store=="all" && $product=="all"){
					$store = mysqli_query($conn,"SELECT * from tbl_deliver where YEAR(deliver_date) = $year");
			 }else if($store=='all'){
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_stock_id=$product and YEAR(deliver_date) = $year");
					 
			}else if($product=='all'){
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_store='$name' and YEAR(deliver_date) = $year");
					 
			}else{
				$store = mysqli_query($conn,"SELECT * from tbl_deliver where deliver_store='$name' and deliver_stock_id=$product and YEAR(deliver_date) = $year");
		 
			} 

			}
			
			
			$income = 0;
			$totalord= 0;
			$num_sales = mysqli_num_rows($store);

		 	
			// while($query2=mysqli_fetch_array($sales)){
			// 	$total_ex = $total_ex+$query2[7];
			// }
			if($num_sales>0){
	 
			 	
		?>
 
	<table class="table" style="position: relative;" border="1">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Exported</th>
		</thead>
		<?php
		while($row = mysqli_fetch_array($store)){
			$orders = $row[1];
			if($mode=='daily'){			
				$sales =mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_order_id=$orders and ex_date='$datex'");
			}else if($mode=='weekly'){
			$sales =mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_order_id=$orders and WEEK(ex_date,1) = $week");
			}else if($mode=='monthly'){
			$sales =mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_order_id=$orders and MONTH(ex_date) = $month");
			}else if($mode=='yearly'){
			$sales =mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_order_id=$orders and YEAR(ex_date) = $year");
			}
				while($query1=mysqli_fetch_array($sales)){	
			echo '<tr>';
			echo '<td>'.$query1[0].'</td>';
			echo '<td>'.$query1[1].'</td>';
			echo '<td>'.$query1[2].'</td>';
			echo '<td>'.$query1[3].'</td>';
			echo '<td>'.$query1[4].'</td>';
			echo '</tr>';
			$totalord = $query1[2] * $query1[3];
			$income = $income + $totalord;
		
		}
		
		}
		?>
	</table>
			<?php echo "total income : "; echo  'P'.number_format($income,2, "." , "," ).' ';
			  ; 
			}else
			{
				echo "<br>NO ITEM SOLD";
			}
			  ?>

	</div>


</body>
</html>

