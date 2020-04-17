 

 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';
$id=$_POST['id']; 
  $output = '';
$output .= '
 
 <h4 class="modal-title callout callout-info">Order of :'.$id.'</h4>
 

  <table class="table table-condensed" align="center">
                  <thead>
                    <th>ID</th>
                    <th>Name</th>
                     
                     <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>';
                  if($_SESSION['privelage']==1){ $output .= '
                         <th>Option</th>';
                     }
                 $output .= ' </thead>';

                      

                    $get=mysqli_query($conn,"SELECT * from tbl_order where order_fullname='$id'");

                     

                    while($query=mysqli_fetch_array($get))
                        { 

                         $ord_stock = $query[7];
                          $check_num = mysqli_query($conn,"SELECT * from tbl_stocks where stock_id=$ord_stock");
                          $num_rows = mysqli_num_rows($check_num);
                        
                           if($num_rows){

                 
                    $output .='      <tr  id="'.$query[0].'">
                            <td>'.$query[0].'</td>
                           <td>'.$query[1].'</td>
                            
                            <td>'.$query[2].'</td>
                            <td>'.$query[3].'</td>
                           <td><img src=getImage_stocks.php?id='.$query[7].' style="height:150px; width:150px;"></td>
                           </td>';
                       if($_SESSION['privelage']==1){  $output .=' 
                           <td>
                      
                           <div class="btn-group-vertical">   <a data-id="'.$query[0].'"  id="confirm" class="btn   btn-sm btn-primary"><i class="fa fa-check"></i>Confirm</a>
                          
                          
                          
                            <a data-id3="'.$query[0].'"  id="deleteone" class="btn   btn-sm btn-danger">
                          <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Delete request</a>

                         </div>
                      
                        
                            
                          </td>
                           </tr>';
                           }
                        }else{

                  $delete_id = $query[0];
                 $query = "DELETE from tbl_order where order_id='$delete_id'";

                  mysqli_query($conn,$query);
                 

                        }

                         
                     }
                     
                $output .= '</table>';

                echo $output;
                 ?>