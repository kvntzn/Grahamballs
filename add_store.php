<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>

<body>
	<div class="container">


<!-- Modal -->
  		<form method="post" enctype="multipart/form-data">	
			<div class="modal modal-info modal fade" id="AddPModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add Store</h4>
			      </div>
			      <div class="modal-body">
			      	
					 <div class="input-group">
							<label for="ProductName">Store Branch Name</label>
							<input type="text" class="form-control" name="store_name" pattern="^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$"  title="No special characters allowed"  id="ProductName"placeholder="Store Branch Name" required>
						</div>

						<h4> Province</h4>
						<div class="input-group">
                  <select id="provincedd" name="province" class="form-control" onChange="change_province();javacript: var valor = this.options[selectedIndex].text;    document.getElementById('shadow').value = valor;test(this);" required>
                   <option value="">Select</option>
                   <?php 
                     $province= mysqli_query($conn,"SELECT * FROM tbl_province ORDER by provDesc ASC");

                     while ($rows = mysqli_fetch_array($province)) {
                       # code...
                     echo ' <option value='.$rows[4].'>'.$rows[2].'</option>';
                     }
                   ?>
                     
                 </select>
             </div>
                  <input name="province" type="hidden" id="shadow" value=""> 
                  <h4> City/Municipality</h4>
                

		<div class="input-group">
	                  <div id='city'>
                 <select  class="form-control" required>
                   <option value="">Select</option>
                  </select>
                  
                    </div>
                </div>
                    
                   
                    

                  
                  <h4>Barangay/Town</h4>
                  <div class="input-group">
                  <div id='town'>
                  <select name="barangay" class="form-control" required>
                   <option value="">Select</option>
                  </select> 
                    </div>
                </div>


                						
			      </div>
			      <div class="modal-footer">
			        <button type="submit" class="btn   btn-outline" name="add_store" id ="add_store">Add</button>	
			      </div>
			    </div>
			  </div>
			</div>
		

		</form>


	</div>
</body>
	<script type="text/javascript">
function change_town(){
var xmlhttp= new XMLHttpRequest();
xmlhttp.open("GET","add_city.php?city="+document.getElementById("citydd").value,false);
xmlhttp.send(null);
 
document.getElementById("town").innerHTML = xmlhttp.responseText ; 


 	}

function change_province(){
var xmlhttp= new XMLHttpRequest();

xmlhttp.open("GET","add_prov.php?province="+document.getElementById("provincedd").value,false);

xmlhttp.send(null);

document.getElementById("city").innerHTML = xmlhttp.responseText ; 
 

 document.getElementById("town").innerHTML='<select class="form-control" required><option>Select</option></select>';
   
 }
function test(select){
 $("option[value='disable']",select).hide();
}
 


 	</script>
</html>



 