
 <?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}

include 'lib/connect.php';

	if(isset($_POST['edit_stock'])){
		$edit_id = $_POST['stock_id'];
		$sname = $_POST['stock_name'];
		$squan = $_POST['squantity'];
		$sprice = $_POST['sprice'];
		date_default_timezone_set('America/Los_Angeles');
		$date = date("Y-m-d");
		$query2="";

	

		$run_search = mysqli_query($conn,"SELECT * from tbl_stocks where stock_id='$edit_id' ");
		if(mysqli_num_rows($run_search)>0){
			$get=mysqli_query($conn,"SELECT * from tbl_stocks where stock_name='$sname'");
			
			while($fetch=mysqli_fetch_array($get)){

				$ex_quan = $fetch['stock_quantity']-$squan;
			}
			if($ex_quan>0){
				$query2=mysqli_query($conn,"INSERT INTO tbl_export(ex_name, ex_price , ex_quantity, ex_date)VALUES('$sname', '$sprice' ,'$ex_quan', '$date')");
			}		
		}
			
	
		$query=mysqli_query($conn,"UPDATE tbl_stocks SET stock_price = $sprice , stock_quantity=$squan WHERE stock_id='$edit_id'");


		if($query||$query2 ){
				echo "<script>window.open('stocks.php','_self')</script>";
		}
		else { echo '
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Check data inputted / No Data has been changed! 
				</div>';
			}
				
		 
		}
	?>