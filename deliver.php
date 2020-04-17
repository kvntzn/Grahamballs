<?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';
include 'customer.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Battery Delivery system</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href=" bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
 
    <!-- Theme style -->
    <link rel="stylesheet" href=" dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href=" dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

   <header class="main-header">

        <!-- Logo -->
        <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>BD</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Battery Delivery</b> system</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
           
           
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <i class="fa fa-user fa-1x"></i>
                  <span class="hidden-xs"><?php 
                echo $_SESSION['username']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/default-user.png" class="img-circle">
                    <p>
                      
                     <small><?php 
                echo $_SESSION['username']; ?>
                    </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                               <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="user_setting.php" class="btn btn-default btn-flat">Settings</a>
                    </div>
                    <div class="pull-right">
                      <a href="user_logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>

        </nav>
      </header>


      <!-- =============================================== -->

  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src=" dist/img/default-user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php 
                echo $_SESSION['username']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
            <form action="search.php" method="POST"id="search-form" class="sidebar-form">
  
            <div class="input-group">
              <input type="text"  name="search-keyword" id="search-keyword" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" value="SUBMIT" name="search-btn" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
             <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li >
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> </i>
              </a>
            
            </li>
             <?php if($_SESSION['privelage']==2){ echo "<li><a href='view_users.php'><i class='fa fa-users'></i> <span>Users</span></a></li>"; }?>
              <li >
              <a href="memo.php">
                <i class="fa fa-envelope"></i> <span>Memo</span>
                <small class="label pull-right bg-yellow"><?php echo $notif; ?></small>
              </a>
            </li>
             <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#product" >
                <span class='fa fa-shopping-cart'></span> Products <span class="caret"></span>
              </a>
              <ul id="product" class="collapse" >
                 <li><a href="products.php"><span class="fa fa-caret-square-o-down"></span> Imported</a></li>
                   <li><a href="products-export.php"><span class="fa fa-caret-square-o-up"></span> Product Exported</a></li>
              </ul>
          </li>
          <li>
            <a href="order_view.php">
              <span class="fa fa-archive"></span> Orders</a>
          </li>
           <li class="active treeview">
            <a href="deliver_list.php">
              <span class="fa fa-truck"></span>Deliver</a>
          </li>
           <li  >
            <a href="Store_record.php">
              <span class="fa  fa-building" aria-hidden="true"></span>Stores</a>
          </li>
          <li   >
            <a href="stocks.php">
              <span class="fa fa-line-chart"></span> Stocks</a>
          </li>
                    <li>
                        <a href="user_setting.php"><i class="fa fa-cog"></i> Settings</a>
                    </li>
  
                </li>
             
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Orders
            <small>list</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"> Home</a></li>
            <li class="active"><i class="fa fa-archive"></i> <a href="#">Orders</a></li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Orders</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
 
              </div>
            </div>
            <div class="box-body">
              <table class="table table-condensed" align="center">
                  <thead>
                    <th>ID</th>
                    <th>Name</th>
                      <th>Name of Cust.</th>
                     <th>Price</th>
                    <th>Quantity</th>
                    <th>Destination</th>
                    <th>Image</th>
                    <th>Abort</th>
                  </thead>
                  <?php
                  $id = $_GET['id'];
                  $get=mysqli_query($conn,"SELECT * from tbl_order where order_id =$id");

                     

                  while($query=mysqli_fetch_array($get))
                        { 
                
                            $Destination =  (''.$query[12].' , '.$query[11].', '.$query[10].' ') ;
                          echo '<tr>';
                          echo '<td>'.$query[0].'</td>';
                          echo '<td>'.$query[1].'</td>';


 

                          echo '<td>'.$query[8].'</td>';

                          echo '<td>'.$query[2].'</td>';
                          echo '<td>'.$query[3].'</td>';
                           echo '<td>'.$query[9].', '.$query[12].', '.$query[11].', '.$query[10].'</td>';
                          echo '<td><img src=getImage_stocks.php?id='.$query[7].' style="height:150px; width:150px;"></td>';
                          echo '</td>';
                          echo '<td>';
                              
                       
                          
                          
                          
                          echo ' <a href=delete_order.php?id='.$query['0'].' class="btn btn-flat btn-sm btn-danger">
                          <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>Abort</a>';

                          // echo ' <a   class="btn btn-flat btn-sm btn-info" data-toggle="modal" data-target="#AddCModal" >
                          // <i class="fa fa-user"></i> View Customer</a>';
                        
                          echo ' 
                          </td>';
                          echo '</tr>';
                           }
                       ?>
                </table>
            </div><!-- /.box-body -->
         
          </div><!-- /.box -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Choose Store</h3>
              
      <?php
                   
                  $get=mysqli_query($conn,"SELECT * from tbl_stores");

                     

 ?>   <form action=storelocator.php?id=<?php echo $id ?>  method="POST">     
  <div class="form-group">            
           <select class="form-control" name="origin"> 
            <?php
           while($query=mysqli_fetch_array($get))
                        { 
 
            ?><option ><?php echo  $query[1]  ?></option>

        <?php  } ?>
           </select>   
         </div>
          <div class="form-group">
           <h3 class="box-title">Destination</h3> <select class="form-control" name="destination"   ><option  ><?php echo  $Destination  ?></option></select>
               </div>
               <button type="submit" class="btn btn-flat   btn-info">Show</button>
 
         </form>
         

 
        

        <div>
 

        </div></div></div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 
  
<footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>BSIT </b> 3A
          </div>
          <strong>Battery delivery system</a>.</strong> All rights reserved.
        </footer>


    
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src=" plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src=" bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script scriptc=" plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src=" plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src=" dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src=" dist/js/demo.js"></script>
  </body>
</html>
