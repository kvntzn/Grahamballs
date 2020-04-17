<?php
	//file name:connect.php 
	//local

	$user="root";
	$password="";
	$database="grahamballs_db";

	$conn=mysqli_connect("localhost",$user,$password,$database);
	@mysqli_select_db($conn, $database) or die (mysqli_error());



?>