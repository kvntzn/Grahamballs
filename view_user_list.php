 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

  $output = '';
$output .= '
 
<table class="table table-condensed" align="center">
              <thead>
                <th>User ID</th>
                <th>Username</th>
                <th>Status</th>';


               if($_SESSION['privelage']==2){
                
              $output .= '  <th>Options</th>';
               } 
                      $output .= '      </thead>';



                   $get=mysqli_query($conn,"select * from tbl_user where user_privelage in (1,0)");
                while($query=mysqli_fetch_array($get))
                    { 
                     $output .= '<tr id='.$query['0'].'> 
                     <td>'.$query[0].'</td> 
                      <td>'.$query[1].'</td> 

                     <td>';
                      if($query[4]==2){
                       $output .= 'Admin';
                      }
                      if($query[4]==1){
                        $output .= 'Active Salesperson';
                      }
                       if($query[4]==3){
                        $output .= 'Customer';
                      }
                      if($query[4]==0){
                       $output .= 'Not Active ';
                      
                      }
                       

                           $output .= '</td> 
                        <td>';
                       
                      if($_SESSION['privelage']==2 and $query[4]!=3){
                      
                       $output .= ' <input type=hidden name = get_id value='.$query['0'].'> 
                       <a data-id='.$query['0'].' id="viewuser" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-info btn-flat"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
                        <a data-id='.$query['0'].' id="deleteuser" class=" btn btn-sm btn-danger btn-flat"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete </a> 
                        ';
                      
                          }

                        $output .= ' </td>';
                       '</tr>';

                       
                         

                         
                     }
                     
                $output .= '</table>';

                echo $output;
                 ?>




                    



  