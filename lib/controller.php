<?php 

include 'lib/connect.php';
	#add-products
/*--------------Add Product-------*/

 
function add_pro(){
	if(isset($_POST['add_pro'])){

			$pname =  $_POST['product_name'];
			 
			$pprice = $_POST['product_price'];
			$pquan = $_POST['product_quantity'];
			date_default_timezone_set('Asia/Singapore');
			$preceived = date("Y-m-d");
			$pcategory = $_POST['product_category'];
			$pbrand = $_POST['product_brand'];
			$supp = $_POST['supp_prod'];
			$swarning = 2;
			$query1 = "";

			 	$imageName = mysqli_real_escape_string($conn,$_FILES["product_image"]["name"]);
				$imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES["product_image"]["tmp_name"]));
				$imageType = mysqli_real_escape_string($conn,$_FILES["product_image"]["type"]);
				

							if(isset($_FILES['product_image'])) {
						    $errors     = array();
						    $maxsize    = 2097152;
						    $acceptable = array(
						         
						        'image/jpeg',
						        'image/jpg',
						        'image/gif',
						        'image/png'
						    );

						    if(($_FILES['product_image']['size'] >= $maxsize) || ($_FILES["product_image"]["size"] == 0)) {
						        $errors[] = 'File too large. File must be less than 2 megabytes.';
						    }

						    if(!in_array($_FILES['product_image']['type'], $acceptable) && (!empty($_FILES["product_image"]["type"]))) {
						        $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
						    }

						    if(count($errors) === 0) {


						        	$query1 = "INSERT INTO tbl_product(product_name,product_price, product_quantity, product_received,product_image,product_category,product_brand,product_supplier)VALUES('$pname', '$pprice','$pquan', '$preceived','$imageData' , '$pcategory','$pbrand','$supp')";

						        		
						        if(mysqli_query($conn,$query1)){
											echo "<script>window.open('products.php','_self')</script>";
								}


						    } else {
						        foreach($errors as $error) {
						            echo '<script>alert("'.$error.'");</script>';
						        }
						        echo "<script>window.open('products.php','_self')</script>";


						        die(); //Ensure no more processing is done
						    }
						}
				// if ((($_FILES['product_image']['type'] == 'image/gif') || ($_FILES['product_image']['type'] == 'image/jpeg') || ($_FILES['product_image']['type'] == 'image/png') || ($_FILES['product_image']['type'] == 'image/jpg')))
		

		
		
			

		// else
		// {

			// echo '
			// 	<div class="alert alert-success" role="alert">
			// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			// 		  <span aria-hidden="true">&times;</span>
			// 		</button>
			// 	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			// 	<span class="sr-only"></span>Not an Image!
			// 	</div>';



		// }
		

	//		$check_pname = "SELECT * from tbl_stocks where stock_name='$pname' ";
	//		$run_pname = mysqli_query($conn,$check_pname);

	//		if(mysqli_num_rows($run_pname)>0){
	//			$get=mysqli_query($conn,"SELECT * from tbl_stocks where stock_name='$pname'");
	//			while($fetch=mysqli_fetch_array($get)){
	//				$squan = $pquan + $fetch[2];
	//			}
	//		$query2 = "UPDATE tbl_stocks SET stock_quantity=$squan, stock_warning=$swarning WHERE stock_name='$pname'";
				//$query2 = "UPDATE tbl_stock SET stock_quantity=$squan WHERE stock_name='$pname'";
					
	//		}
			
	//		else{
	//			$query2 = "INSERT INTO tbl_stocks(stock_name, stock_quantity, stock_warning)VALUES('$pname', '$pquan', '$swarning')";
	//		}	
			
	}
}
function add_store(){
	if(isset($_POST['add_store'])){

		$store_name = $_POST['store_name'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$barangay = $_POST['barangay'];

	$query = "INSERT INTO tbl_stores(store_location,store_con)VALUES('$barangay,$city,$province','$store_name')";



		if(mysqli_query($conn,$query)){
				
			echo "<script>window.open('Store_record.php','_self')</script>";
								}else{
									 
												echo '
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<span class="sr-only"></span>Error
				</div>';
;
								}
	 }
}
function add_logo(){
	if(isset($_POST['add_logo'])){

include 'lib/connect.php';
		
			date_default_timezone_set('Asia/Singapore');
			$date= date("Y-m-d");
			 
			$control = 0;

				 $imageName = mysqli_real_escape_string($conn,$_FILES["logo_image"]["name"]);
				$imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES["logo_image"]["tmp_name"]));
				$imageType = mysqli_real_escape_string($conn,$_FILES["logo_image"]["type"]);

							if(isset($_FILES['logo_image'])) {
						    $errors     = array();
						    $maxsize    = 2097152;
						    $acceptable = array(
						         
						        'image/jpeg',
						        'image/jpg',
						        'image/gif',
						        'image/png'
						    );

						    if(($_FILES['logo_image']['size'] >= $maxsize) || ($_FILES["logo_image"]["size"] == 0)) {
						        $errors[] = 'File too large. File must be less than 2 megabytes.';
						    }

						    if(!in_array($_FILES['logo_image']['type'], $acceptable) && (!empty($_FILES["logo_image"]["type"]))) {
						        $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
						    }

						    if(count($errors) === 0) {


						        	$query1 = "INSERT INTO tbl_logo(logo_img,logo_date,logo_control)VALUES('$imageData','$date','$control')";

						        		
						        if(mysqli_query($conn,$query1)){
											echo "<script>window.open('logo.php','_self')</script>";
								}


						    } else {
						        foreach($errors as $error) {
						            echo '<script>alert("'.$error.'");</script>';
						        }
						        echo "<script>window.open('logo.php','_self')</script>";


						        die(); //Ensure no more processing is done
						    }
						}
				 
	}
}

/*--------------Edit Product-------*/

	 


/*--------------Sorting-------*/
if(isset($_POST['sort_pro'])){
		$sort = $_POST['Sort'];
		if($sort=="product_id"){
			$sort_query="SELECT * FROM `tbl_product` ORDER BY `tbl_product`. $sort ASC";
		}
		else{
			$sort_query="SELECT * FROM `tbl_product` ORDER BY `tbl_product`. $sort DESC";
		}
		
}
else{
			$sort_query="SELECT * FROM `tbl_product` ORDER BY `tbl_product`.`product_id` ASC";
	}		


 






/*-----------------Creating Memo-------------------*/
if(isset($_POST['add_memo'])){

		$memo_title = mysqli_real_escape_string($conn,$_POST['Title']);
		$memo_content = mysqli_real_escape_string($conn,$_POST['memo_content']);
		date_default_timezone_set('Asia/Singapore');
			$memo_date  = date("Y-m-d");
		$memo_time = date("h:i:sa");
		$memo_sender = $_POST['sender'];
		$memo_control = 0;
		$query = "INSERT INTO tbl_memo(memo_title, memo_content, memo_date, memo_time, memo_sender, memo_control)VALUES('$memo_title', '$memo_content', '$memo_date', '$memo_time', '$memo_sender', '$memo_control')";
		
		
			



		
		if(mysqli_query($conn,$query)){
			echo "<script>window.open('memo.php','_self')</script>";
		}
}



/*-----------------Get Num of Active Users-----------------*/
$usersnum=mysqli_num_rows(mysqli_query($conn,"SELECT * from tbl_user where user_privelage = 1 "));

/*-----------------Get Num of Active Users-----------------*/
$importnum=mysqli_num_rows(mysqli_query($conn,"SELECT * from tbl_product where product_control = 0"));	

/*-----------------Get Num of Active Users-----------------*/
$stocknum=mysqli_num_rows(mysqli_query($conn,"SELECT * from tbl_stocks where stock_quantity <= 5"));	

/*-----------------Create Notificattion-----------------*/
$notif=mysqli_num_rows(mysqli_query($conn,"SELECT * from tbl_memo where memo_control = 0"));	
/*-----------------Create Notificattion-----------------*/
$ordersnum=mysqli_num_rows(mysqli_query($conn,"SELECT * from tbl_order"));
/*-----------------Create Notificattion-----------------*/
$delivernum=mysqli_num_rows(mysqli_query($conn,"SELECT * from tbl_ready"));	
/*-----------------Create Notificattion-----------------*/
$storenum=mysqli_num_rows(mysqli_query($conn,"SELECT * from tbl_stores"));	
 
/*-----------------Create Notificattion-----------------*/
$logonum=mysqli_num_rows(mysqli_query($conn,"SELECT * from tbl_logo"));	
/*-----------------Create Notificattion-----------------*/
$empty=0;
$stockq=mysqli_query($conn,"SELECT * from tbl_stocks");
						while($stockget=mysqli_fetch_array($stockq))
								{	
									$stockID=$stockget['stock_id'];
									if(($stockget['stock_quantity']>=0 && $stockget['stock_quantity']<=5) && ( $stockget['stock_warning']==2)) {
										 
										$update_warning = mysqli_query($conn,"UPDATE tbl_stocks SET stock_warning = 1 WHERE stock_id='$stockID'");
									 
									//} elseif($stockget['stock_quantity']>0){$update_warning = mysqli_query($conn,"UPDATE tbl_stocks SET stock_warning = 2 WHERE stock_id='$stockID'");}

									// if($stockget['stock_warning']==1 && $stockget['stock_quantity']>=0 && $stockget['stock_quantity']<=2){
										$stock_title = "ATTENTION";
										$stock_content = $stockget['stock_name'].' is nearly out of stock! ' .$stockget['stock_quantity'].' stock/s left';
													date_default_timezone_set('Asia/Singapore');
										$stock_date  = date("Y-m-d");
										$stock_time = date("h:i:sa");
										$stock_sender = 'Stock-alert';
										$stock_control = 0;
										$warning = $stockget['stock_warning'] - 1 ;	

										$stock_empty="INSERT INTO tbl_memo(memo_title, memo_content, memo_date, memo_time, memo_sender, memo_control)VALUES('$stock_title', '$stock_content', '$stock_date', '$stock_time', '$stock_sender', '$stock_control')";


										if(mysqli_query($conn,$stock_empty)){
											$update_warning2 = mysqli_query($conn,"UPDATE tbl_stocks SET stock_warning='$warning' WHERE stock_id='$stockID'");
										}	
									}
						 }



/*-----------------Search-----------------*/

?>

