 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
     

    

}
include 'lib/connect.php';
include 'lib/controller.php';
$output ='';
$output.='
<table class="table table-condensed" align="center">
                    <thead>
                      <th>Store</th>
                      <th>Branch</th>';
                      if($_SESSION['privelage']==4){  
         $output.='             <th>print</th>';
                      }                    
                     $output.='   <th></th>
                    </thead>';
              
              mysqli_query($conn,"SET CHARACTER_SET_CONNECTION=utf8");
            mysqli_query($conn,"SET CHARACTER_SET_RESULTS=utf8");
              mysqli_query($conn,"SET CHARACTER_SET_CLIENT=utf8");
              $sql = mysqli_query($conn,"SELECT * from tbl_stores");
                

              while ($query = mysqli_fetch_array($sql)) {
                 $text =  mysqli_real_escape_string($conn,$query[1]);
                 // $store =  preg_replace('#[^a-zA-Z]#i','%20',$text);
                 $store = str_replace(array(' '), '%20' , $text);
                # code...
                    $output.=' <tr>';
 
                  $output.= '<td>'.$query[1].'</td>';
                  $output.='<td>'.$query[2].'</td>';
                 if($_SESSION['privelage']==4){
                  $output.='<td><a target="_blank" href=print_content.php?id='.$store.' class="btn btn-flat btn-sm btn-success"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</a>
                  <a data-id='.$query['0'].' id="deletestore" class="btn btn-flat btn-sm btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></td></td>';
                    }
               $output.='</tr>';
              }

              $output.='
              <tr>
                <td class="callout callout-info" colspan=2>For all stores</td>';
                  if($_SESSION['privelage']==4){
            $output.='<td><a target="_blank" href=print_all.php class="btn btn-flat btn-sm btn-success"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</a>
             '; 
               
               }
                 $output.='
              </tr>
            </table>';

            echo $output;
            ?>