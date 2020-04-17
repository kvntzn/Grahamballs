 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

$id = $_POST['id'];
  $output = '';
$output .= '
			<div class="panel-body">';
						
														
								
						
						
					 
				  
						$get=mysqli_query($conn,"SELECT * from tbl_user WHERE user_id = $id");
							while($query=mysqli_fetch_array($get))
								{	
								$output .= '
									<input type=hidden id=user_id value='.$id.'>
									<div class=input-group>
										<label for=Username>Username</label>
										<input type=text name=username id=Username class="form-control" value='.$query[1].' readonly>
									</div>';
					 
					$output .= '			<br>
								<div class=input-group>
								<label>Status</label>
								<select name="user_status" class="form-control" id="user_stats"	>';
									 
										$result=mysqli_query($conn,"SELECT * FROM tbl_user WHERE user_id = $id");
										
									 
								$output .= '
									<option value="1">Activate Salesperson</option>
									<option value="0">Deactivate User</option>
								
								</select>
								</div>
									<br>

						

					</div>
					' ;  

                     	
			 		 } 
					echo $output;

					?>
