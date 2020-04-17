 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

  $output = '';
$output .= '
           <h4 class="box-title callout callout-success">Choose Store to Import:</h4>
 

    <select class=form-control id=store>';
    $sql = mysqli_query($conn,"SELECT * FROM tbl_stores");
     while($row = mysqli_fetch_array($sql)){

      $output .='<option value="'.$row[0].'" selected>'.$row[1].'</option>';

     }
     $output .='</select>';

     echo $output;

     ?>

 
                
                

            



