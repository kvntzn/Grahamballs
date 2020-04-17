<?php

session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}

include 'lib/connect.php';

	if(isset($_POST['edit_pro'])){
			$edit_id = $_POST['pro_id'];
			$pname = $_POST['product_name'];
			$pquan = $_POST['product_quantity'];
			 $pprice = $_POST['product_price'];
			 $pcat = $_POST['product_category'];
			 $pbrand =$_POST['product_brand'];
			 $psupp = $_POST['supp_prod'];



				// $file_info = getimagesize($_FILES['pimage']['tmp_name']);
				// if(empty($file_info)) // No Image?
				// {
				// 	echo '
				// <div class="alert alert-danger" role="alert">
				// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				// 	  <span aria-hidden="true">&times;</span>
				// 	</button>
				// 	Not an Image!
				// 	</div>';
				// }else{
			  	 $imageName = mysqli_real_escape_string($conn,$_FILES["pimage"]["name"]);
				$imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES["pimage"]["tmp_name"]));
				$imageType = mysqli_real_escape_string($conn,$_FILES["pimage"]["type"]);

	
				if(isset($_FILES['pimage'])) {
						    $errors     = array();
						    $maxsize    = 2097152;
						    $acceptable = array(
						         
						        'image/jpeg',
						        'image/jpg',
						        'image/gif',
						        'image/png'
						    );

						    if(($_FILES['pimage']['size'] >= $maxsize) || ($_FILES["pimage"]["size"] == 0)) {
						        $errors[] = 'File too large. File must be less than 2 megabytes.';
						    }

						    if(!in_array($_FILES['pimage']['type'], $acceptable) && (!empty($_FILES["pimage"]["type"]))) {
						        $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
						    }

						    if(count($errors) === 0) {


						        $query2=mysqli_query($conn,"UPDATE tbl_product set product_image='$imageData' where product_id='$edit_id' ");

						        		$pro_query = mysqli_query($conn,"SELECT * FROM tbl_product where product_id = $edit_id");
							 			$rows = mysqli_fetch_row($pro_query) ;

										$query=mysqli_query($conn,"UPDATE tbl_product SET product_name='$pname' , product_price = '$pprice' , product_quantity='$pquan', product_category='$pcat',product_brand='$pbrand' ,product_supplier='$psupp' WHERE product_id='$edit_id'");

										 
						        if($query||$query2){
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



		 
				
		 
		}

 			
						
		 

		 