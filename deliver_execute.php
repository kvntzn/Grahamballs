 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';
include 'google_map_api.php';
mysqli_query($conn,"SET CHARACTER_SET_CONNECTION=utf8");
  mysqli_query($conn,"SET CHARACTER_SET_RESULTS=utf8");
 mysqli_query($conn,"SET CHARACTER_SET_CLIENT=utf8");
$id=$_POST['id']; 
  $output = '';
 
 


$output .= '
 
 <h4 class="modal-title callout callout-info" >Destination :'.$id.'</h4>';
      $output .= '    <h4 class="box-title callout callout-success">Choose Store to Deliver:</h4>';
              
       
                   
                  $get=mysqli_query($conn,"SELECT * from tbl_stores");

                     

             $output .='          
                  <div class="form-group"> 
                          <label>Branch Name of a Store</label>
                           <select class="form-control select2" style="width: 100%;" id="origin"> ';
                             
                           while($query=mysqli_fetch_array($get))
                                        { 
                 
                              $output .='  

                            <option value="'.$query[1].'" >'.$query[2].'</option>';

                              
                          }  

                           $output .='
                           <input data-id="'.$id.'" id="destination" type="hidden" id="shadow" value="'.$id.'">  
                           </select> 
                      
                         </div>
                         
                    
                 
                     
                         

 
        

         ';
 
$output .='<br>
<h4>Order Infos</h4>
  <table class="table table-condensed" align="center">
                  <thead>
                    <th>ID</th>
                    <th>Name</th>
                     
                     <th>Price</th>
                    <th>Quantity</th>
                      <th>To</th>
                  </thead>';

                      

                    $get=mysqli_query($conn,"SELECT * from tbl_ready where re_place='$id'");

                     

                    while($query=mysqli_fetch_array($get))
                        { 

                        

                 
                    $output .='      <tr  id="'.$query[0].'">
                            <td>'.$query[0].'</td>
                           <td>'.$query[1].'</td>
                            
                            <td>'.$query[2].'</td>
                            <td>'.$query[3].'</td>
                             <td>'.$query[7].'</td>
                           </td>
                           <td>';
                                
                      
                    
                           
                         
                 
 

                         
                     }
                     
                $output .= '</table>';
   



$string = $id;

$array = explode(",", $string);

 
$coordinates2= get_coordinates($array[1],$array[0], $array[2]);


$check_place = mysqli_query($conn,"SELECT * FROM tbl_stores");




$output .='
<br>

<h4>Store and Destination Distance</h4>
  <table class="table table-condensed" align="center">
                  <thead>
                    <th>ID</th>
                    <th>Branch Name</th>
                    <th>Store Location</th>
                     
                     <th>Distance</th>
                    
                  </thead>';

while ($place = mysqli_fetch_array($check_place)) {
  # code...


                    $output .='    
                        <tr  id="'.$place[0].'">
                            <td>'.$place[0].'</td>
                            <td><b>'.$place[2].'</b></td>
                            <td>'.$place[1].'</td>
                         
                             <td>';


                              $string = $place[1];

                            $array = explode(",", $string);
                             $coordinates1 = get_coordinates($array[1],$array[0], $array[2]);

    $dist = GetDrivingDistance($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long']);
     
                        $output .='   Distance: <b>'.$dist['distance'].'</b>
                        <br>Travel time duration: <b>'.$dist['time'].'</b>
                        </td>
                      
                        
';

                        
}
                echo $output;
                 ?>