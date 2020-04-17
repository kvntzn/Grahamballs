<?php 
session_start();
if(!isset($_SESSION['username'])){
	header("location:index.php");
}
include 'lib\controller.php';
 
 
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
	<h2><center>Battery Delivery System<center></h2>
		<?php
			$date = date('M d Y');
			echo '<p>'.$date.'</p>';
			echo '<p>Branch name: <b>All store</b></p>';
			 	
			$total_ex=0;	
			
			$store = mysqli_query($conn,"SELECT Distinct deliver_stock_id FROM tbl_deliver");
			
			$income = 0;
			$totalquan = 0;
			$num_sales = mysqli_num_rows($store);

		 	
			// while($query2=mysqli_fetch_array($sales)){
			// 	$total_ex = $total_ex+$query2[7];
			// }
			if($num_sales>0){
		echo '<p>Total no. of Product sold : '.$num_sales.'</p>';
			 	
		?>
 
	<table class="table" style="position: relative;" border="1">
		<thead>
			<th>ID</th>
			<th>Name</th>
	 
			<th>Quantity</th>
			 
		</thead>
		<?php
		
		$highquan=0;
		$highest=0;

		while($row = mysqli_fetch_array($store)){
			$orders = $row[0];
			
			$sales =mysqli_query($conn,"SELECT ex_name , ex_quantity ,ex_id FROM `tbl_export` WHERE ex_stock_id=$orders");

				while($query1=mysqli_fetch_array($sales)){	
			echo '<tr>';
			echo '<td>'.$query1[2].'</td>';
			echo '<td>'.$query1[0].'</td>';
		 
			echo '<td>'.$query1[1].'</td>';
			 
			echo '</tr>';
			// $totalord = $query1[2] * $query1[3];
			// $income = $income + $totalord;
	
			$totalquan =$totalquan + $query1[1];
			$highquan = $totalquan;
			$prodname = $query1[0];
		}
			var_dump($highquan);
			var_dump($highest);
		if($highquan>$highest){
			$highest = $highquan;
			$highprod = $prodname;
		}
		$totalquan =0;
		}
		?>
	</table>
			<?php echo 'Best seller goes to '.$highprod.'';
			  
			}else
			{
				echo "NO ITEM SOLD FOR THIS BRANCH";
			}
			  ?>

	</div>


</body>
</html>

