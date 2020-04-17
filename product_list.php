 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

  $output = '';
$output .= '
 

  <div class="table-responsive">

                <table class="table table-condensed" align="center">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                   <th>Price</th>
                  <th>Quantity</th>
                  <th>Received Date</th>
                  <th>Supplier</th>
                  <th>Image</th>';

    if($_SESSION['privelage']==1){    
                  $output .= '<th>
                   Control   
                  </th> ';
                    }
              $output .= '   </thead>';

         
                    
                
                $start=0;
                $limit=10;
                $page=1;
                if(isset($_GET['page']))
                  {
                    $page=$_GET['page'];
                    $start=($page-1)*$limit;
                  }
                
               

                $get=mysqli_query($conn,$sort_query);
                  while($query=mysqli_fetch_array($get))
                      { 

                     

              
                 
                    $output .='    <tr id="'.$query[0].'" >
                            <td>'.$query[0].'</td>
                           
                            <td>'.$query[1].' </td>
                            <td> '.$query[2].'</td>
                            <td> '.$query[3].'</td>
                            <td> '.$query[4].'</td>
                             <td> '.$query[9].'</td>
                             <td><img src=getImage.php?id='.$query['product_id'].' style="height:150px; width:150px;"> </td>
                            
                           </td>
                           <td>';
                            if($_SESSION['privelage']==2){
                              if($query['product_control']==0){
                   $output .=  '
                   <div class="btn-group-vertical"> 
                   <a data-id3='.$query['product_id'].' id="editprod"  data-toggle="modal" data-target="#myModal" class="btn btn-flat btn-sm btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> ';
                          }
                        $output .= '<a data-id3="'.$query[0].'" id="deleteprod"class=" btn btn-flat btn-sm btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> ';
                        
                        if($query['product_control']==0){ 
                       $output .= '<a data-id="'.$query[0].'" id="imports" data-toggle="modal" data-target="#myModalz"  class="btn btn-flat btn-sm btn-warning"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Import to stock</a> '; 
                        }
                          }  
                          $output .=' </div> </td>
                           </tr>';
                           
                         

                         
                     }
                     
                $output .= '</table>


                 <div class="box-footer no-padding">
                <div class="col-md-offset-5 no-padding">';
            
            $rows=mysqli_num_rows(mysqli_query($conn,"select * from tbl_product"));
            $total=ceil($rows/$limit);
             $output .=  "<ul class='pagination' >";
              for($i=1;$i<=$total;$i++){
                if($i==$page) {  $output .=  "<li class = 'active' ><a>".$i."</a></li>"; }
                else {  $output .=  "<li><a href='?page=".$i."'>".$i."</a></li>"; }
              }
             $output .= "</ul>";
          
        $output .= '   </div>
             </div></div>';



                echo $output;
                 ?>


                
                
 
                       

                  <!-- /.mail-box-messages -->
                
                

                 </div>



