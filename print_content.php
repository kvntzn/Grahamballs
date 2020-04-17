<?php 
session_start();
if(!isset($_SESSION['username'])){
	header("location:index.php");
}
include 'lib\controller.php';
$name = $_GET['id'];
 
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
	<h2><center>Grahamballs Delivery System<center></h2>
		<?php
			$date = date('M d Y');
			echo '<p>'.$date.'</p>';
			echo '<p>Branch name: <b>'.$name.'</b></p>';
			echo '<p>Product name: <b>All Product</b></p>';
			 	
			$total_ex=0;	
			
			$store = mysqli_query($conn,"SELECT * FROM tbl_deliver WHERE deliver_store='$name'");
			
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
			
			$sales =mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_order_id=$orders");

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
				echo "NO ITEM SOLD FOR THIS BRANCH";
			}
			  ?>

	</div>


</body>
</html>

