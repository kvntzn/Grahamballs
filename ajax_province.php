<?php


 include 'lib/connect.php';

mysqli_query($conn,"SET CHARACTER_SET_CONNECTION=utf8");
  mysqli_query($conn,"SET CHARACTER_SET_RESULTS=utf8");
 mysqli_query($conn,"SET CHARACTER_SET_CLIENT=utf8");
 $province = $_GET['province'];


 if($province !="")
 {
 	
 $res = mysqli_query($conn,"SELECT * FROM tbl_city where provCode = $province ");
 echo '<select id="cityx" onChange="change_town();javacript: var valor = this.options[selectedIndex].text;    document.getElementById(\'shadoweh\').value = valor;" required>';
		echo  '<option selected value="">'; echo 'Select'; echo '</option>' ;
 while($row = mysqli_fetch_array($res)){

 	echo '<option value='.$row['citymunCode'].' >';echo $row['citymunDesc']; echo '</option>';
 }
 echo '</select><input name="city" type="hidden" id="shadoweh" value="">';
}
if($province==""){


	echo '<select required><option value="">Select</option></select>';
}
?>
<!-- 
 <select   id="citydd" onChange="change_town();javacript: var valor = this.options[selectedIndex].text;    document.getElementById(\'shadow\').value = valor;test(this);" required>
                    <option value="disable">--Select--</option>';  -->
