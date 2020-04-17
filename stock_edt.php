 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';
include 'lib\connect.php';
  $output = '';
$id  = $_POST['id'];
$output .='

<div class="box-body">
              <form  action="stock_edt_pro.php" method="post"  enctype="multipart/form-data">
              
               
               
                <div class="panel-body">';
                  
               
                    $get=mysqli_query($conn,"SELECT * from tbl_stocks WHERE stock_id = $id");
                    while($query=mysqli_fetch_array($get))
                  { 
                   $output .='
                    <input type=hidden name=stock_id value='.$id.'>
                    <div class=input-group>
                      <label for=StockID>Stock ID</label>
                      <input type=text name=stock_id id=Stockid class="form-control" value='.$query['0'].' readonly>
                    </div>
                    <div class=input-group>
                      <label for=StockName>Stock Name</label>
                      <input type=text name=stock_name id=StockName class="form-control" value='.$query['1'].' required readonly>
                    </div>
                      <br>
                      <div class=input-group>
                      <label>Price</label>
                      <input type="number" step="0.01" class="form-control" name="sprice" min="1"  value='.$query[2].' required>
                    </div>
                    
                    <div class=input-group>
                      <label>Quantity</label>
                      <input type="number" class="form-control" name="squantity" min="0"  value='.$query[3].' required>
                    </div> 
                    <br>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-flat btn-success" name ="edit_stock" id ="edit_pro">  Save</button>
                  <a data-dismiss="modal" class="btn btn-flat btn-warning" name ="cancel_edit">  Cancel</a>  ';
                 }  
           $output .='     </div>
              
            </form> 
            </div> ';

            echo $output 
            ?>