<?php 

 session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

 $id = $_POST['id'];
$output="" ; 

$output .= ' 
<table class="table table-condensed" align="center">
                  <thead>
                    <th>ID</th>
                    <th>Name</th>
                     <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                     
                  </thead>';


				$sql = mysqli_query($conn,"SELECT * FROM tbl_stocks where stock_id=$id");

				while($query = mysqli_fetch_row($sql)){


                       $output .='<tr id="'.$query[0].'" >
                            <td>'.$query[0].'</td>
                           
                            <td>'.$query[1].' </td>
                            <td> '.$query[2].'</td>
                            <td> '.$query[3].'</td>
                             <td><img src=getImage_stocks.php?id='.$query[0].' style="height:150px; width:150px;"> </td>
                            
                           </td>
                           <td>';



				
        }

        $output .= '
        Percentage
        <select id="percentage">

            <option>10</option>
            <option>20</option>
            <option>30</option>
            <option>40</option>
             <option>50</option>
              <option>60</option>
               <option>70</option>
                <option>80</option>
                 <option>90</option>
                  

        </select>
        <br>

  <input data-id="'.$id.'" id="stockid" type="hidden"   value="'.$id.'">  

        ';


        echo $output;


 ?>