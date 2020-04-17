 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

  $output = '';
$output .= '


 

   <table class="table table-condensed" align="center">
                  <thead>
                    <th>ID</th>
                    <th>Date</th>
                      <th>Logo</th>
                    <th>Active</th>';
                     if($_SESSION['privelage']==2){
                  $output .= '    <th>Option</th>';
                     }
                  $output .= '  </thead>';

         
                     $get=mysqli_query($conn,"SELECT * from tbl_logo");

                     

                 while($query=mysqli_fetch_array($get))
                        { 


                           
                    $output .='   

                             <tr id="'.$query[0].'" >
                            <td>'.$query[0].'</td>
                           
                            <td>'.$query[2].' </td>
                            <td><img src=getImage_logo.php?id='.$query[0].' style="height:150px; width:150px;"> </td>';

                            if($query[3]>0){

                          $output .='<td>Active</td>';
                            }else{

                                $output .='<td>No</td>';
                            }
                            
                               
                            if($_SESSION['privelage']==2){
                          $output .='<td> 

                               <a     data-id3="'.$query[0].'" id="confirmlogo"  class="btn btn-flat btn-sm btn-success">
                          <span class="glyphicon  " aria-hidden="true"></span>Make this as a logo</a>';

                          if($query[3]>0){
          $output .='     <a data-id3="'.$query[0].'" id="removeactive"  class="btn btn-flat btn-sm btn-warning">
                          <span class="glyphicon  " aria-hidden="true"></span>Remove from being active</a>';
                          }
                     $output .=' <a data-id3="'.$query[0].'" id="removelogo"  class="btn btn-flat btn-sm btn-danger">
                          <span class="glyphicon  " aria-hidden="true"></span>Delete logo</a>

                        ';

                        }

                          $output .='        </td></tr>';
                             
                       

                         
                     }
                     
                $output .= '</table>';

                echo $output;
                 ?>





