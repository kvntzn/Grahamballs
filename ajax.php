<?php


 include 'lib/connect.php';
include 'lib/controller.php';
mysqli_query($conn,"SET CHARACTER_SET_CONNECTION=utf8");
  mysqli_query($conn,"SET CHARACTER_SET_RESULTS=utf8");
 mysqli_query($conn,"SET CHARACTER_SET_CLIENT=utf8");
 
 $city = $_GET['city'];

 if($city !="")
 {
 	 $res = mysqli_query($conn,"SELECT * FROM tbl_town where citymunCode='$city' ");
 	echo '<select name="barangay" required>' ;
 	echo  '<option value="" selected>'; echo 'Select'; echo '</option>' ;


 while($row = mysqli_fetch_array($res)){

 	echo "<option>";echo $row['brgyDesc']; echo "</option>";
 }
 echo "</select>";
}

if($city==""){


	echo "<select required><option value=''>Select</option></select>";
}



?>