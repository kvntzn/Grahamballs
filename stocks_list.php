 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';
$id = $_POST['id'];
  $output = '';
$output .= '


 

   <table class="table table-condensed" align="center">
                  <thead>
                    <th>ID</th>
                    <th>Name</th>
                     <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Sale</th>
                    <th>Option</th>
                    <th>Store</th>
                  </thead>';

                  if($id=='all'){
                     $get=mysqli_query($conn,"SELECT * from tbl_stocks  ");

                  }else{
                     $get=mysqli_query($conn,"SELECT * from tbl_stocks where stock_store=$id");
}
                     

                 while($query=mysqli_fetch_array($get))
                        { 
                            $text =  mysqli_real_escape_string($conn,$query[1]);
                
                            $stock = str_replace(array(' '), '%20' , $text);

                            // if($query[3]>0){
                    $output .='   

                             <tr id="'.$query[0].'" >
                            <td>'.$query[0].'</td>
                           
                            <td>'.$query[1].' </td>
                            <td> '.$query[2].'</td>
                            <td> '.$query[3].'</td>
                             <td><img src=getImage_stocks.php?id='.$query[0].' style="height:150px; width:150px;"> </td>';
                             if($query[9]>0){
                             $dec = $query[9]/100;
                             $total = $query[2]*$dec;
                             $stotal = $query[2] - $total;
                             
                      $output .='<td> Sale with '.$query[9].'%<br><b>Current price</b> :'.number_format($stotal,2, "." , "," ).'</td>';
                         }else{

                         $output .='<td> Not on sale</td>';   
                         }
                        $output .='</td>
                           <td>';
                                      if($_SESSION['privelage']==2){ 
                      
                    $output .=' <a data-id3='.$query['0'].'  id="editstock" data-toggle="modal" data-target="#myModalz" class="btn btn-flat btn-sm btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</a>
                          
                          
                          
                            <a data-id3="'.$query[0].'" id="deleteall"  class="btn btn-flat btn-sm btn-danger">
                          <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Remove from stocks</a>';

                          if($query[3]>0){

                       $output.=' <a data-toggle="modal" data-target="#myModal" data-id3="'.$query[0].'" id="sale"  class="btn btn-flat btn-sm btn-success">
                          <span class="glyphicon  " aria-hidden="true"></span>Sale this item</a>';
                       }}
                       if($_SESSION['privelage']==4){ 
                    $output .='    <a target="_blank" href=print_item.php?name='.$stock.' class="btn btn-flat btn-sm btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</a>';
        }                      
                              $storeid = $query[10];
                              $store = mysqli_query($conn,"SELECT * from tbl_stores where store_id = $storeid");
                              $stores = mysqli_fetch_array($store);
                              $store_num = $stores[2];
                          $output .='  </td>
                           <td> '.$store_num.'</td>
                           </tr>';
                           
                         // }else{

                         //     $delete_id = $query[0];
                         //   $query = "DELETE from tbl_stocks where stock_id='$delete_id'";

                         //      mysqli_query($conn,$query);
                         // }

                         
                     }
                     
                $output .= '</table>';

                echo $output;
                 ?>





