 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
     

    

}
include 'lib\controller.php';
include 'lib\google_api.php';
 

  $output ='';
$output .='<div class="review-payment"> ';
   $userx = $_SESSION['username'];

            $idget=mysqli_query($conn,"SELECT cus_id FROM tbl_customer Where cus_uname='$userx' ");
            $row = mysqli_fetch_array($idget);
            $userid = $row['cus_id'];

            $ptotal= 0;
           $get=mysqli_query($conn,"SELECT * from tbl_cart where cart_user_id = '$userid' ");
            $rows=mysqli_num_rows($get);

            if($rows>0){ 
$output .= '
 

 <h2>Review & Payment</h2>
      </div>

<table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Item</td>
              <td class="description"></td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Sub-Total</td>
              <td></td>
            </tr>
          </thead>';

         
                  while($query=mysqli_fetch_array($get))
                        { 
                   $ord_stock = $query[7];
                          $check_num = mysqli_query($conn,"SELECT * from tbl_stocks where stock_id=$ord_stock and stock_quantity>0 ");
                          $num_rows = mysqli_num_rows($check_num);
                        
                           if($num_rows){

                 
                    $output .='   

                           <tbody>
                  <tr>
              <td  >
                <img src=getImage_stocks.php?id='.$query['cart_stock_id'].' style="height:150px; width:150px;" >
              </td>
              <td class="cart_description">
               <h4><a href="">'.$query['cart_name'].' </a></h4>
                
              </td>
              <td class="cart_price">
                <p>P'.$query['cart_price'].'</p>
              </td>';
                                     
                      
                        $output .='     
              <td class="cart_quantity">
                <div class="cart_quantity_button">';
                 if($query['cart_quantity']>=0){  

                  if( $query['cart_quantity']<=4){
               $output .='<a   id="plus" data-id2='.$query['cart_stock_id'].' data-id='.$query['cart_id'].' class=" cart_quantity_up" style="cursor: pointer;"> + </a>';
             } 
                $output.='  <input id="cquantity"  data-id='.$query['cart_id'].' class="cart_quantity_input" type="text" name="quantity" value= '.$query['cart_quantity'].' ="off" size="2" readonly>';
                  
                  if($query['cart_quantity']>=2){
                  $output .= '<a  data-id='.$query['cart_id'].' id="minus" data-id2='.$query['cart_stock_id'].' class="cart_quantity_up" class="cart_quantity_down" style="cursor: pointer;"  > - </a>';
                  }
                 }
                
              $output .='    </div>
              </td>';
                           
                           
                          
                   $output .='    <td class="cart_total">
                <p class="cart_total_price" id="total">';
                $total = $query['cart_price'] * $query['cart_quantity'];    
                 $output .=' P '.number_format($total,2, "." , "," ).' '; $ptotal = $ptotal + $total; 
                  $output .='
                  </p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" id="delete_cart" data-id='.$query['cart_id'].'"><i class="fa fa-times"></i></a>
              </td>
            </tr>';
           }else{


          $delete_id = $query['cart_id'];
                 $query = "DELETE from tbl_cart where cart_id='$delete_id'";

                  mysqli_query($conn,$query);
          }


        }   
                $output .= '<tr>
            <td><p></p></td><td></td><td></td><td class="cart_total"><p class="cart_total_price"  >Total </p></td>
            <td  class="cart_total" stlye="float:right;"> 
              <p class="cart_total_price" id="cart_total"> ';  
             
                 $output .= ' P'.number_format($ptotal,2, "." , "," ).' ';

                         $output .= '    </p>
             
            </td>
            <td></td>
          </tr>
        </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>';
     


$output .= '</div> <div class="shopper-informations">
        <div class="row">
           
          <div class="col-sm-5 clearfix">
            <div class="bill-to">
              <p>Bill To</p>
              <div class="login-form">
                <form method="POST" action="order.php?id='.$userid.'">
                  <h4> First & Last name</h4>
                  <input type="text" placeholder="Full Name*" pattern="^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$"  title="No special characters allowed"  name="fullname" required>
                  <h4> Complete Address (House Number, Building and Street Name)</h4>
                  <input type="text" name="address" pattern="\d{1,5}\s(\b\w*\b\s){1,2}\w*\." title="Please enter address" placeholder="Complete Address (House Number, Building and Street Name)" required>
                   <h4> Province</h4>
                  <select id="provincedd" name="province" onChange="change_province();javacript: var valor = this.options[selectedIndex].text;    document.getElementById(\'shadow\').value = valor;test(this);" required>
                   <option value="">Select</option>';
                     $province= mysqli_query($conn,"SELECT * FROM tbl_province ORDER by provDesc ASC");

                     while ($rows = mysqli_fetch_array($province)) {
                       # code...
                      $output .=' <option value='.$rows[4].'>'.$rows[2].'</option>';
                     }
                   
                     
                  $output .= '</select>
                  <input name="province" type="hidden" id="shadow" value=""> 
                  <h4> City/Municipality</h4>
                
                  <div id=\'city\'>
                 <select   required>
                   <option value="">Select</option>
                  </select>
                  
                    </div>
                    '
                    ;
                   
                    $output .= ' 

                  
                  <h4>Barangay/Town</h4>
                  <div id=\'town\'>
                  <select name="barangay" required>
                   <option value="">Select</option>
                  </select> 
                    </div>
                  <h4> Phone Number</h4>

            
                          <input type="text" name="phone" pattern="[0-9]{11}" title="Phone number"  required>
              

              <div class="g-recaptcha" data-sitekey="6LfXNRoUAAAAAFiFZs5o2h5RKvOBmuk7Q3zyEmSj"></div> 
 
                                     
              <button class="btn btn-primary" type="submit">Continue</button>
                </form>
                
              </div>
              
              
                </div>

            </div>
            
          </div>
                    
        </div>

        
      </div>

        '; }else{

         $output .= '  <div class="shipping text-center"><!--shipping-->
                       <h2 class="title text-center">There are no items in your cart</h2>
                      </div> ';

      }
                echo $output;
                 ?>