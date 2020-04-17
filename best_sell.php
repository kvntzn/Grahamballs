<?php 

include 'lib/connect.php';

$store = mysqli_query($conn,"SELECT Distinct deliver_stock_id FROM tbl_deliver");
		 			 	 	$bestrow = mysqli_num_rows($store);
							$highquan=0;
							$highest=0;
							$totalquan=0;
							 $bestseller = array();
							while($row = mysqli_fetch_array($store)){
								$orders = $row[0];
								
								$sales =mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_stock_id=$orders");

									while($query1=mysqli_fetch_array($sales)){	
						
								$totalquan =$totalquan + $query1[3];
								$highquan = $totalquan;
								$prodname = $query1[1];
							}
								 
							if($highquan>=10){
								// $highest = $highquan;
								$bestseller[] = $prodname;
							}
							$totalquan =0;
							}

							?>