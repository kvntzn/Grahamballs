<?php 


include 'lib/connect.php';
include 'google_map_api.php';
 $origin = $_POST['origin'];
 $destination = $_POST['destination']; 
date_default_timezone_set('Asia/Singapore');

$storeerror = false;
$store = false;

//                 function get_coordinates($city, $street, $province)
// {
//     $address = urlencode($city.','.$street.','.$province);
//     $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Philippines";
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//     $response = curl_exec($ch);
//     curl_close($ch);
//     $response_a = json_decode($response);
//     $status = $response_a->status;

//     if ( $status == 'ZERO_RESULTS' )
//     {
//         return FALSE;
//     }
//     else
//     {
//         $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
//         return $return;
//     }
// }

// function GetDrivingDistance($lat1, $lat2, $long1, $long2)
// {
//     $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=en-EN";
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//     $response = curl_exec($ch);
//     curl_close($ch);
//     $response_a = json_decode($response, true);
//     $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
//     $time = $response_a['rows'][0]['elements'][0]['duration']['text'];


//     return array('distance' => $dist, 'time' => $time);

// }


$string = $origin;

$array = explode(",", $string);

 
$coordinates1= get_coordinates($array[1],$array[0], $array[2]);

$strings = $destination;

$arrayx = explode(",", $strings);

 
$coordinates2= get_coordinates($arrayx[1],$arrayx[0], $arrayx[2]);

 $dist = GetDrivingDistance($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long']);
$time =   date('Y-m-d H:i:s');

 $orig_time = $dist['time'];

 $time_limit =  date('Y-m-d H:i:s',strtotime('+'.$orig_time.'',strtotime($time)));
// $time_check =  date('Y-m-d H:i:s',strtotime('+'.$orig_time.'',strtotime($time_limit)));
$time_restrict =  date('Y-m-d H:i:s',strtotime('+20mins',strtotime($time)));

 
if($time_restrict>$time_limit){ 

	$store = mysqli_query($conn,"SELECT * FROM tbl_stores where store_location='$origin' ");
	$stores = mysqli_fetch_assoc($store);
	$storeid = $stores['store_id'];

	$stocks = mysqli_query($conn,"SELECT * FROM tbl_stocks where stock_store=$storeid");
	

//Stock update	
	while ($stock = mysqli_fetch_assoc($stocks)){
		$stockid = $stock['stock_id'];
		$stockquan = $stock['stock_quantity'];
			 $ready = mysqli_query($conn,"SELECT * FROM tbl_ready where re_stock_id = '$stockid' and re_place ='$destination' ");
			 //$ready = mysqli_query($conn,"SELECT * FROM tbl_stocks where stock_id = '$stockid' and stock_store  ");
			
			$num_ready = mysqli_num_rows($ready);
			if($num_ready>0){
	

			$store = true;
		}else{
			//$storeerror = true;
		}

	}

	$read = mysqli_fetch_assoc($ready); 
	$hasStockid = $read['re_stock_id'];
	$stockxx = mysqli_query($conn,"SELECT * FROM tbl_stocks where stock_store=$storeid and stock_id = '$hasStockid'");
	$numstocks = mysqli_num_rows($stockxx);
			if($numstocks>0){
			echo "  One/More product are not available for this branch";
						die();
			}else{
			
if($store){

		$read = mysqli_fetch_assoc($ready); 
			
			$new_quan = $stockquan - $read['re_quantity'];
			$hasStockid = $read['re_stock_id'];
	$query=mysqli_query($conn,"UPDATE tbl_stocks SET  stock_quantity=$new_quan , stock_warning = 2 WHERE stock_id=$stockid and $new_quan<=stock_quantity");
	}



 
 	$sql = mysqli_query($conn,"SELECT * FROM tbl_ready where re_place ='$destination'");
 	$num_rowss = mysqli_num_rows($sql);
		
		$date = date("Y-m-d");


		// $store = mysqli_query($conn,"SELECT * FROM tbl_stores where store_location='$origin'");
		// $rowl = mysqli_fetch_array($store);
		// $store_id  = $rowl[0];

		
		// $sql3 = mysqli_query($conn,"SELECT * FROM tbl_stores where store_id=$loc");
		// $row3 = mysqli_fetch_assoc($sql3);
		// $org = $row3['store_location'];
		

	 	  $sql4 = mysqli_query($conn,"SELECT * FROM tbl_deliver where deliver_store='$origin' ORDER BY deliver_id Desc " );
	 	  $num_deliver = mysqli_num_rows($sql4);
	 	   $row4 = mysqli_fetch_assoc($sql4);
		   $last_time = $row4['deliver_avail'];

			if($num_deliver==0){
				$addTime = date('Y-m-d H:i:s',strtotime('+'.$orig_time.'',strtotime($time_limit)));
				if($num_rowss>1){

				
				
			while ($row = mysqli_fetch_array($sql)) {

					$query = mysqli_query($conn,"INSERT INTO tbl_deliver (deliver_order_id , deliver_name , deliver_date , deliver_store,deliver_dest,deliver_time,deliver_avail,deliver_stock_id)VALUES('$row[9]','$row[7]','$date','$origin','$destination','$time','$addTime','$row[10]')");

 				 }
 				}else{

				 $row = mysqli_fetch_array($sql);
				 	$query = "INSERT INTO tbl_deliver (deliver_order_id ,deliver_name, deliver_date , deliver_store,deliver_dest,deliver_time,deliver_avail,deliver_stock_id)VALUES('$row[9]','$row[7]','$date','$origin','$destination','$time','$addTime','$row[10]')";
			}


if(mysqli_query($conn,$query)){
		echo "Delivered successfully  ";

mysqli_query($conn,"DELETE  FROM tbl_ready where re_place='$destination'");
	
	
	}else if($query){
			echo "Delivered successfully  ";
			mysqli_query($conn,"DELETE  FROM tbl_ready where re_place='$destination'");
		}
		else { echo "error";
			}

			  die();
		}

		  if($time > $last_time){

		 	$addTime =  date('Y-m-d H:i:s',strtotime('+'.$orig_time.'',strtotime($time_limit)));

			if($num_rowss>1){
			while ($row = mysqli_fetch_array($sql)) {

					$query = mysqli_query($conn,"INSERT INTO tbl_deliver (deliver_order_id , deliver_name , deliver_date , deliver_store,deliver_dest,deliver_time,deliver_avail,deliver_stock_id)VALUES('$row[9]','$row[7]','$date','$origin','$destination','$time','$addTime','$row[10]')");

 				 }
 				}else{

				 $row = mysqli_fetch_array($sql);
				 $query = "INSERT INTO tbl_deliver (deliver_order_id ,deliver_name, deliver_date , deliver_store,deliver_dest,deliver_time,deliver_avail,deliver_stock_id)VALUES('$row[9]','$row[7]','$date','$origin','$destination','$time','$addTime','$row[10]')";
 				}


if(mysqli_query($conn,$query)){

			echo "Delivered successfully  ";
			mysqli_query($conn,"DELETE  FROM tbl_ready where re_place='$destination'");

	}else if($query){
		echo "Delivered successfully  ";
		mysqli_query($conn,"DELETE  FROM tbl_ready where re_place='$destination'");
		}
		else { echo "error";
			}

			 die();

		}else{
				echo 
			"Still on delivery. wait till  $last_time ";
			?>
 
			
  
<?php	}
}
}else{


	echo "Time delivery is more than 20 minutes, try another store";
}
 ?>