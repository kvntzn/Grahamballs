<?php 
session_start();
if(!isset($_SESSION['username'])){
	header("location:index.php");
}
include 'lib\controller.php';
$name = $_GET['name'];

$income = 0;
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
			echo '<p>Branch name: <b>All stores</b></p>';
			echo '<p>Product name: <b>'.$name.'</b></p>';
			$total_imp=0;	
			$total_ex=0;	
			$a=mysqli_query($conn,"SELECT * FROM `tbl_product` WHERE product_name='$name'");
			$b=mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_name='$name'");
			$c=mysqli_query($conn,"SELECT * FROM `tbl_stocks` WHERE stock_name='$name'");
			while($query1=mysqli_fetch_array($a)){
				$total_imp = $total_imp+$query1[3];
			}
			while($query2=mysqli_fetch_array($b)){
				$total_ex = $total_ex+$query2[3];
			}
			while($query3=mysqli_fetch_array($c)){
				$stock=$query3[3];
			}

			// echo '<p>Total no. of Imported: '.$total_imp.'</p>';
			// echo '<p>Total no. of Exported: '.$total_ex.'</p>';
			echo '<p>Storage Quantity: '.$stock.'</p>';
		?>
	<!-- <table class="table" style="position: relative;" border="1">
		<thead>
			<th>ID</th>
			<th>Name</th>
		<th>Price</th>
			<th>Quantity</th>
			<th>Received</th>
		</thead> -->

		<?php
		// $a=mysqli_query($conn,"SELECT * FROM `tbl_product` WHERE product_name='$name'");
		// while($query1=mysqli_fetch_array($a)){	
		// 	echo '<tr>';
		// 	echo '<td>'.$query1['product_id'].'</td>';
		// 	echo '<td>'.$query1['product_name'].'</td>';
		// 	echo '<td>'.$query1['product_price'].'</td>';
		// 	echo '<td>'.$query1['product_quantity'].'</td>';
		// 	echo '<td>'.$query1['product_received'].'</td>';
		// 	echo '</tr>';
		// }
		?>

	<!-- </table> -->
	<table class="table" style="position: relative;" border="1">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Exported</th>
		</thead>
		<?php
		$b=mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_name='$name'");
		$num = mysqli_num_rows($b);
		while($query1=mysqli_fetch_array($b)){	
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
		?>
	</table>

		<?php 
		if($num>0){
			echo "total income : "; echo  'P'.number_format($income,2, "." , "," ).' ';} ?>

	</div>


<script>  window.onfocus = setTimeout(function () { window.close(); }, 100); </script>  
</body>
</html>

