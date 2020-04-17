<?php 
	
	include 'lib/connect.php';
		session_start();
		$delete_id = $_POST['id'];
		$checkname = mysqli_query($conn,"SELECT * FROM tbl_user where user_id ='$delete_id'");
		$row = mysqli_fetch_array($checkname);
		$same = $row[1];
		$privelage = $row[4];

		$sql = mysqli_query($conn,"SELECT * FROM tbl_user WHERE user_privelage=2");
		$count = mysqli_num_rows($sql);

		if($count>1){
		$query = "DELETE from tbl_user where user_id='$delete_id'";

		if(mysqli_query($conn,$query)){
			echo "Account deleted"; 
		}

		if($_SESSION['username']==$same){
	 
	session_unset();
	session_destroy();
	echo " Logging out your account"; 

	  	}  
	  }else if($privelage<=1){

	  	$query = "DELETE from tbl_user where user_id='$delete_id'";

		if(mysqli_query($conn,$query)){
			echo "Account deleted"; 
		}

	 


	  }else{

	  	echo "Cannot Delete the only admin";

	  }


 ?>
