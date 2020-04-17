<?php 
 include 'lib/connect.php';

	 include 'lib/connect.php';
		session_start();
		$edit_id = $_POST['user_id'];
		 
		$user_privelage = $_POST['status'];
		 
		
		
		
		$query=mysqli_query($conn,"UPDATE tbl_user SET user_privelage='$user_privelage' WHERE user_id='$edit_id'");
		
		 $sql = mysqli_query($conn,"SELECT * FROM tbl_user WHERE user_privelage=2");
		 $num_admin = mysqli_num_rows($sql);
		 if($num_admin>0){


		$checkname = mysqli_query($conn,"SELECT * FROM tbl_user where user_id ='$edit_id'");
		$row = mysqli_fetch_array($checkname);
		$same = $row[1];




		if($query){
			#echo "<script>window.open('products.php','_self')</script>";
			echo '
				User status successfully changed';
		}
		else { echo '
			 
				Failed to Edit!
				 ';
		}

			if($_SESSION['username']==$same){
	 
		$_SESSION['privelage'] = $user_privelage;

	  	}  
}else
{
	echo "Not available because there is no admin left";
	$query=mysqli_query($conn,"UPDATE tbl_user SET user_privelage=2 WHERE user_id='$edit_id'");
}

	
 

?>