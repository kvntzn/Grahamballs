<?php 
session_start();
if($_SESSION['privelage']==3){
  header("location:Windex.php");
}
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grahamballs Delivery system</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href=" bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href=" plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href=" plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href=" dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href=" dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href=" plugins/iCheck/flat/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

       <header class="main-header">

        <!-- Logo -->
          <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>BD</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Grahamballs Delivery</b> system</span>
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
                    <img src="dist/img/default-user.png" class="img-circle" alt="User Image">
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
      <!-- Left side column. contains the logo and sidebar -->
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
              <?php if($_SESSION['privelage']==2){ 
                echo "<li><a href='view_users.php'><i class='fa fa-users'></i> <span>Users</span></a></li>"; }?>
              <li >
              <a href="memo.php">
                <i class="fa fa-envelope"></i> <span>Memo</span>
                <small class="label pull-right bg-yellow"><?php echo $notif; ?></small>
              </a>
            </li>
            <?php if($_SESSION['privelage']==4){ ?>
               <li class="active treeview">
              <a href="report.php">
                <i class="fa fa-file-text" aria-hidden="true"></i> <span>Report</span>
                  </small>
              </a>
            </li>
            <?php } ?>
            <?php if($_SESSION['privelage']==2){ ?>
             <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#product">
                <span class='fa fa-shopping-cart'></span> Products <span class="caret"></span>
              </a>
              <ul id="product" class="collapse">
                 <li><a href="products.php"><span class="fa fa-caret-square-o-down"></span> Imported</a></li>
                   <li><a href="products-export.php"><span class="fa fa-caret-square-o-up"></span> Product Exported</a></li>
              </ul>
          </li> <?php } ?>
             <li >
              <?php if($_SESSION['privelage']==1){ ?>

            <a href="order_view.php">
              <span class="fa fa-archive"></span> Orders</a>
          </li>
          <li >
            <a href="deliver_list.php">
              <span class="fa fa-truck"></span>Deliver</a>
          </li>
          <?php } ?>
          <?php if($_SESSION['privelage']==2 || $_SESSION['privelage']==4){  ?>

            <li  >
            <a href="Store_record.php">
              <span class="fa  fa-building" aria-hidden="true"></span>Stores</a>
          </li>
          <li>
            <a href="stocks.php">
              <span class="fa fa-line-chart"></span> Stocks</a>
          </li>
          <?php } ?>
                    <li>
                        <a href="user_setting.php"><i class="fa fa-cog"></i> Settings</a>
                    </li>
  
                </li>
             
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Report
            <small>generator</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><i class="fa fa-file-text"></i> Report</li>
          </ol>
        </section>

        <!-- Main content -->
       <section class="content">
           
          
          <!-- Default box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Report</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
 
              </div>
            </div>
                 

            <div class="box-body"  >
              <table class="table table-condensed" align="center">
                    <thead>

                                      
                        <th></th>
                    </thead>
              <?php 
              mysqli_query($conn,"SET CHARACTER_SET_CONNECTION=utf8");
            mysqli_query($conn,"SET CHARACTER_SET_RESULTS=utf8");
              mysqli_query($conn,"SET CHARACTER_SET_CLIENT=utf8");
              $sql = mysqli_query($conn,"SELECT * from tbl_stores ");
                

                
                 ?>
 <form method="post" action="print_report.php" target="_blank">  
       
    

                  <div class="form-group"> 
                          <label>Branch Name of a Store</label>
                           <select class="form-control select2"  name="store"> ';
                               <option value='all'>Select all store</option>';
                         <?php   
                         $get=mysqli_query($conn,"SELECT * from tbl_stores");
                         while($query=mysqli_fetch_array($get))
                                        { 
                 
                              ?>

                            <option value=<?php echo ''.$query[0].'';?> ><?php echo ''.$query[2].'' ?></option>';

                              
                         <?php  }  ?>

                        
                           </select> 
                      
                         </div>
                         <div class="form-group"> 
                          <label>Product</label>
                           <select class="form-control select2"  name="product"> ';
                             <option value='all'>Select all product</option>';
                         <?php   
                         $get=mysqli_query($conn,"SELECT * from tbl_stocks");
                         while($query=mysqli_fetch_array($get))
                                        { 
                 
                              ?>

                            <option value=<?php echo ''.$query[0].'';?> ><?php echo ''.$query[1].'' ?></option>';

                              
                         <?php  }  ?>

                        
                           </select> 
                      
                         </div>
                         <div class="form-group">
                          <label>Date</label>
                          <input type="date" class="form-control" style="width:20%" name="date" required>

                         </div>
                         <div class="form-group">
                            <label>Mode</label><br>
                         <input type="radio" name="mode"  class="form-radio" value="daily" required>Daily<br>
                          <input type="radio" name="mode" class="form-radio"  value="weekly" required>Weekly<br>
                          <input type="radio" name="mode" class="form-radio"  value="monthly" required>Monthly<br>
                            <input type="radio" name="mode" class="form-radio"  value="yearly" required>Annual<br>
                        </div>
                         <?php if($_SESSION['privelage']==4){?>

          <button type="submit" class="btn btn-info btn-flat margin-bottom" >
                <span class="fa fa-file-text" aria-hidden="true"></span> Generate Report
              </button>
              <?php } ?>
              </form>
              </tr>
            </table>
            </div><!-- /.box-body -->

          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     
 
       <!--  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>BSIT </b> 3A
        </div>
        <strong>Battery delivery system</a>.</strong> All rights reserved.
      </footer>
 -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src=" plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src=" bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src=" plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src=" plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src=" dist/js/app.min.js"></script>
    <!-- iCheck -->
    <script src=" plugins/iCheck/icheck.min.js"></script>
    <!-- Page Script -->
     
    <!-- AdminLTE for demo purposes -->

    <script src=" dist/js/demo.js"></script>
    
  </body>
</html>
