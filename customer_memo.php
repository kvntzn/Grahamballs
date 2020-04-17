 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

  $output = '';
$output .= '
 
<table class="table table-condensed" align="center">
                    <thead>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Title</th>
                      <th>Content</th>
                      <th>Sender</th>
                      <th>Option</th>
                    </thead>';

                     $get=mysqli_query($conn,"SELECT * from tbl_memo where memo_control in (3) ORDER BY `tbl_memo`.`memo_id` DESC");
                      while($query=mysqli_fetch_array($get))
                          { 
                              if($query['memo_control']=='1'){
                     $output .='    <tr  id="'.$query[0].'" >';
                       }
                          else{
                             $output .='    <tr class="bg-info"  id="'.$query[0].'" >';
                           }
                      $output .='      <td>'.$query['memo_date'].'</td>
                           
                             <td>'.$query['memo_time'].'</td>';

                              if($query['memo_title']=="ATTENTION"){
                              $output .='  <td style="color: red;">'.$query['memo_title'].'</td>';
                              }
                              else{
                               $output .=' <td>'.$query['memo_title'].'</td>';
                              }
                       

                           $output .='
                           <td>'.$query['memo_content'].'</td>


                           <td>'.$query['memo_sender'].'</td>
                            <td>
                          <a data-id='.$query['0'].' id="deletememo" class="btn btn-flat btn-sm btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> 
                             </td>
                             </tr>';

                       
                         

                         
                     }
                     
                $output .= '</table>';

                echo $output;
                 ?>




                    



  