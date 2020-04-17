<?php  

include 'lib/connect.php';
 
 	if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){

 		$secret = "6LfXNRoUAAAAAMzLPskwTrikMhOcZgi6Q2CMbfvW";
 		$ip = $_SERVER['REMOTE_ADDR'];
 		$captcha = $_POST['g-recaptcha-response'];
 		$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
 		$arr = json_decode($rsp,TRUE);

 		if($arr['success']){

 			 	$id = $_GET['id'];
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$province =$_POST['province'];
	$city = $_POST['city'];
	$barangay = $_POST['barangay'];
	$phone = $_POST['phone'];


	$check = "SELECT * from tbl_cart where cart_user_id='$id'";
	$get=mysqli_query($conn,$check);
	$numrows = mysqli_num_rows($get);
	 

	if($numrows>1){

		while ($row = mysqli_fetch_array($get)) {
		 
	 	$query2 =  mysqli_query($conn,"INSERT INTO tbl_order(order_name,order_price,order_quantity,order_category,order_brand,order_user_id,order_stock_id,order_fullname,order_address,order_province,order_city,order_barangay,order_phone)VALUES('$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$fullname','$address', '$province','$city','$barangay', '$phone' )" );
				 
		}
	

		 }else {

		 $row = mysqli_fetch_array($get);		 	
		$query2 =  "INSERT INTO tbl_order(order_name,order_price,order_quantity,order_category,order_brand,order_user_id,order_stock_id,order_fullname,order_address,order_province,order_city,order_barangay,order_phone)VALUES('$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$fullname','$address', '$province','$city','$barangay', '$phone' )" ;
		
 	
		 }



	 

	if(mysqli_query($conn,$query2)){
			 
		mysqli_query($conn,"DELETE FROM tbl_cart where cart_user_id = '$id'");
			echo "<script>
			alert('Checkout successfully. ');
			window.open('Windex.php','_self')</script>";

 
		}else if($query2){
			mysqli_query($conn,"DELETE FROM tbl_cart where cart_user_id = '$id'"); 
			echo "<script>
			alert('Checkout successfully. ');
			window.open('Windex.php','_self')</script>";

		}else{
			echo "error";
		}		


 		}else{

 		
 			echo "SPAM";
 		die();
 		}


}
?>