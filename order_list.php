 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

  $output = '';
$output .= '
 

 

  <table class="table table-condensed" align="center">
                  <thead>
                  <th>Name of Cust.</th>
                    <th> </th>
                      <th </th>
                     <th> </th>
                    <th> </th>
                    <th> </th>
                    <th>Option</th>
                  </thead>';

         
                    $get=mysqli_query($conn,"SELECT Distinct order_fullname,order_user_id from tbl_order ");

                     

                    while($query=mysqli_fetch_array($get))
                        { 

                      
                   

                 
                    $output .='    <tr id="'.$query[0].'" >
                            <td>'.$query[0].'</td>
                           
                             <td> </td>
                         <td> </td>
                          <td> </td>
                           <td> </td>
                            <td> </td>
                           </td>
                           <td>';
                                      if($_SESSION['privelage']==1){ 
                      
                        $output .='   <a data-toggle="modal" data-target="#myModal" class="btn btn-flat btn-sm btn-primary" data-id="'.$query[0].'" id="buttons"><i class="fa fa-check"></i>Confirm</a>
                          
                          
                          
                            <a data-id3="'.$query[0].'" id="deleteord"  class="btn btn-flat btn-sm btn-danger">
                          <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Delete request</a>

                    
                        
                            
                          </td>
                           </tr>';
                           }
                          if($_SESSION['privelage']==2){ 
                          
                   $output .='          <a data-toggle="modal" data-target="#myModal" class="btn btn-flat btn-sm btn-success" data-id="'.$query[0].'" id="buttons"><i class="fa fa-check"></i>View</a>';

                          } 
                         

                         
                     }
                     
                $output .= '</table>';

                echo $output;
                 ?>