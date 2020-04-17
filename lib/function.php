<?php 

function login(){
include 'lib/connect.php';

		$username =  $_POST['username-in'];
		$password = md5($_POST['password-in']);

		$run = mysqli_query($conn,"SELECT * from tbl_user where user_name = '$username' AND user_password = '$password' AND user_privelage in (1,2,4) ");
		$run2 = mysqli_query($conn,"SELECT * from tbl_user where user_name = '$username' AND user_password = '$password' AND user_privelage = 0");
			
			while($query=mysqli_fetch_array($run))
					{	
						$user_privelage = $query['user_privelage'];
					 }

		if(mysqli_num_rows($run)>0 && mysqli_num_rows($run)<3){
			
			$_SESSION['username']=$username;
			$_SESSION['privelage']=$user_privelage;
			
			echo "<script>window.open('dashboard.php','_self')</script>";
		}

		elseif(mysqli_num_rows($run2)>0){
			echo '
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Check if Account is activated by Admin
			</div>';
		}

		else {
			#echo "<script>window.alert('Chech account'); window.open('index.php','_self')</script>";
			echo '
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Check Username or Password
			</div>';

		}	
}
function c_login(){
include 'lib/connect.php';

		$username = $_POST['username-in'];
		$password = md5($_POST['password-in']);

		$run = mysqli_query($conn,"SELECT * from tbl_customer where (cus_uname = '$username' OR cus_email = '$username') AND cus_password = '$password' AND cus_privelage = 3");
		 
			
			while($query=mysqli_fetch_array($run))
					{	
						$user_privelage = $query['cus_privelage'];
					 }

		if(mysqli_num_rows($run)>0){
			
			$_SESSION['username']=$username;
			$_SESSION['privelage']=$user_privelage;
			
			echo "<script>window.open('Windex.php','_self')</script>";
		}

	 

		else {
			 
			echo '
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Check Username or Password
			</div>';

		}	
}
function register_user(){
include 'lib/connect.php';

	$username =$_POST['username-reg'];
	$password= $_POST['password-reg'];
	$password = md5($password);
	$repassword = md5($_POST['repassword-reg']);
	$privelage = "0";

	$check_name = "select * from tbl_user where user_name='$username' ";
	$run_name = mysqli_query($conn,$check_name);
	$query = "INSERT INTO tbl_user (user_name, user_password, user_repassword, user_privelage) VALUES('$username', '$password', '$repassword', '$privelage')";	

	if($password==$repassword){

		if(mysqli_num_rows($run_name)>0){
			echo '
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Username has already been used!
			</div>';
		}

		
		else{
			if(mysqli_query($conn,$query)){
				echo '
				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Success!
				</div>';
			}
		}	
	}

	else{
		echo '
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Password does not match
			</div>';
	}
}

function c_register_user(){
	include 'lib/connect.php';


	if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){

 		$secret = "6LfXNRoUAAAAAMzLPskwTrikMhOcZgi6Q2CMbfvW";
 		$ip = $_SERVER['REMOTE_ADDR'];
 		$captcha = $_POST['g-recaptcha-response'];
 		$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
 		$arr = json_decode($rsp,TRUE);

 		if($arr['success']){

	$username = $_POST['username-reg'];
	$pasxword=$_POST['password-reg'];
	$password = md5($pasxword);
	$repassword = md5($_POST['repassword-reg']);
	$email = $_POST['Email'];
	$privelage = "3";

	$check_name = "select * from tbl_customer where cus_uname='$username' OR cus_email='$email' ";
	$run_name = mysqli_query($conn,$check_name);
	$query = "INSERT INTO tbl_customer (cus_uname, cus_password, cus_repassword,cus_email ,  cus_privelage) VALUES('$username', '$password', '$repassword','$email' ,  '$privelage')";	

	if($password==$repassword){

		if(mysqli_num_rows($run_name)>0){
			echo '
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Username or E-mail has already been used!
			</div>';
		}

		
		else{
			if(mysqli_query($conn,$query)){
				echo '
				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Success!
				</div>';
			}
		}	
	}

	else{
		echo '
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Password does not match
			</div>';
	}
	}
	 }else{
		echo "SPAM";
	}
}
 
function Update_setting(){
include 'lib/connect.php';

	if(isset($_POST['user_setting'])){
		$edit_id = $_POST['user_id'];
		$username_up = $_POST['username'];
		$password_up = md5($_POST['password']);
		$repassword_up = md5($_POST['repassword']);

		

		$query_user = mysqli_query($conn,"SELECT * from tbl_user where user_id = '$edit_id'");
		$row = mysqli_fetch_array($query_user);
 
		$query1 = "UPDATE tbl_user SET user_name='$username_up' , user_password='$password_up' , user_repassword='$repassword_up' WHERE user_id='$edit_id' ";	

		if($password_up==$repassword_up){

		if($row['user_name'] == $username_up){
			if(mysqli_query($conn,$query1)){
					echo '
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						<span class="sr-only"></span>
						Success!  <a href="user_setting.php"> Refresh</a>
					</div>';
					$_SESSION['username']=$username_up;

				}

		}else
		{

			$run_name = mysqli_query($conn,"SELECT * from tbl_user where user_name = '$username_up'");
			$num_rows = mysqli_num_rows($run_name);

			if($num_rows>0){
				 
			echo '
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Username has already been used!
				</div>';

 			}else{

 					if(mysqli_query($conn,$query1)){
					echo '
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						<span class="sr-only"></span>
						Success!  <a href="user_setting.php"> Refresh </a>
					</div>';
					$_SESSION['username']=$username_up;

				}

 			}

		}

 
	}

		else{
			echo '
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Password does not match
				</div>';
		}
	}
}


// function Update_user(){
// 	if(isset($_POST['update_user'])){
// 		$edit_id = $_POST['user_id'];
// 		$username = $_POST['username'];
// 		$user_privelage = $_POST['user_status'];

		
// 		$query=mysqli_query($conn,"UPDATE tbl_user SET user_name='$username' , user_privelage='$user_privelage' WHERE user_id='$edit_id'");

// 		if($query){
// 			#echo "<script>window.open('products.php','_self')</script>";
// 			echo '
// 			<div class="alert alert-success" role="alert">
// 				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
// 				  <span aria-hidden="true">&times;</span>
// 				</button>
// 			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
// 			<span class="sr-only"></span>Success! User info changed!
// 			</div>';
// 		}
// 		else { echo '
// 			<div class="alert alert-danger" role="alert">
// 				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
// 				  <span aria-hidden="true">&times;</span>
// 				</button>
// 				Failed to Edit!
// 				</div>';
// 		}
// 	}
// }
?>