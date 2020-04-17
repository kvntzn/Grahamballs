	
<?php 

$control = 1;
$sql = "SELECT * FROM tbl_logo WHERE logo_control=$control";

$go = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($go);
$row = mysqli_fetch_array($go);

	

	if($num_rows>0){
	echo '<img src=getImage_logo.php?id='.$row[0].' style="height:100px; width:100px;">';
}

?>