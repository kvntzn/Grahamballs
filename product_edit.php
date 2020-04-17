 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';
include 'lib\connect.php';
  $output = '';
$id  = $_POST['id'];



        $output .='    <form action="product_edit_pro.php" method="post" enctype="multipart/form-data">
              
             
                <div class="panel-body">';
                  
                    $get=mysqli_query($conn,"SELECT * from tbl_product WHERE product_id = $id");
                    while($query=mysqli_fetch_array($get))
                  { 

                     // $text =  mysqli_real_escape_string($conn,$query[1]);
                
                     //  $prodname = str_replace(array(' '), '%20' , $text);
                   $output .=' 
                    <input type=hidden name=pro_id value='.$id.'>
                    <div class=input-group>
                      <label for=ProductName>Product Name</label>
                      <input type=text name=product_name id=ProductName class="form-control" pattern="^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$" title="No special characters allowed" value="'.$query[1].'" required> 
                    </div>
<br>

                    <div class="input-group">
              <label>Supplier Name</label>
              <input type="text" class="form-control" name="supp_prod"  pattern="^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$" title="No special characters allowed" id="SupplierName" value="'.$query['product_supplier'].'" required>
            </div>
                      <br>
                    <div class=input-group>
                      <label>Price</label>
                      <input type=number name=product_price min=0 step="0.01" max=1000 class="form-control" value="'.$query['2'].'" required>
                    </div>
                      <br>
                      <div class=input-group>
                      <label>Image</label><br>
                     <img src=getImage.php?id='.$query[0].' style="height:150px; width:150px;">
                      <input type="file" class="form-control" name="pimage" required>
                    </div>
                     <br>
                    <div class="input-group">
                    <label>Category</label>
                   <input type="text" class="form-control"pattern="^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$"  title="No special characters allowed" name="product_category" value="'.$query['product_category'].'"  id="ProductName" placeholder="Product Category" required>
                  </div>
                   <br>
                   <div class="input-group">
              <label>Brand</label>
              <input type="text" class="form-control" pattern="^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$" title="No special characters allowed" name="product_brand" id="ProductName" value="'.$query['product_brand'].'" required>
            </div>
<br>
                    <div class=input-group>
                      <label>Quantity</label>
                      <input type=number name=product_quantity min=0 max=1000 class="form-control" value='.$query['3'].' required>
                    </div>
                      <br>

                    
                     
                      
                    
                </div>
                    <div class="modal-footer">

                      <button type="submit" class="btn btn-primary btn-flat" name ="edit_pro" id ="edit_pro">Save</button>
                      <a data-dismiss="modal" class="btn btn-danger btn-flat" >Cancel</a>';  
              }  
          $output .='        </div>
               
            </form> ';

            echo $output ;
                    ?>