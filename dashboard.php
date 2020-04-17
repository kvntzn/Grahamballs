<?php 
session_start();
if($_SESSION['privelage']==3){
  header("location:Windex.php");
}
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
 
?>

  <?php include 'lib\controller.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grahamballs Delivery system</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <link rel="stylesheet" href="css/font-awesome.css">

    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
             <img src="dist/img/default-user.png"   >
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
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> </i>
              </a>
            
            </li>
            <?php if($_SESSION['privelage']==2){ ?>
            <li >
              <a href="logo.php">
                <i class="fa fa-picture-o"></i> <span>logo</span>
              </a>
            </li>
            <?php } ?>
              <?php if($_SESSION['privelage']==2){ echo "<li><a href='view_users.php'><i class='fa fa-users'></i> <span>Users</span></a></li>"; }?>
          
              <li>
              <a href="memo.php">
                <i class="fa fa-envelope"></i> <span>Memo</span>
                <small class="label pull-right bg-yellow"><?php echo $notif; ?></small>
              </a>
            </li>
            <?php if($_SESSION['privelage']==4){ ?>
               <li>
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
          </li>
          <?php } ?>
          <?php if($_SESSION['privelage']==1){ ?>

             <li >
              <a href="order_view.php">
                <span class="fa fa-archive"></span> Orders</a>
            </li>
            <li >
              <a href="deliver_list.php">
                <span class="fa fa-truck"></span>Deliver</a>
            </li>
            <?php } ?>
            <?php if($_SESSION['privelage']==4){ ?>
              <li  >
            <a href="Store_record.php">
              <span class="fa  fa-building" aria-hidden="true"></span>Stores</a>
          </li>
          <?php } ?>
           <?php if($_SESSION['privelage']==2 || $_SESSION['privelage']==4){ ?>
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
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
        

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Dashboard</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      
                    </div>
                 
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="row">
                  <?php if($_SESSION['privelage']==2){ ?>
                      <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon  "><i class="fa fa-picture-o"></i></span>
                <div class="info-box-content">

                  <span class="info-box-number">Logo</span>
                
                      <div class="info-box-number"><?php echo $logonum; ?> Logo/s</div>
                      
     
                  <a href="logo.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View Details</span>
                  </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <?php } ?>

            <?php if($_SESSION['privelage']==2){ ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-user fa-1x"></i></span>
                <div class="info-box-content">

                  <span class="info-box-number">Users</span>
                
                      <div class="info-box-number"><?php echo $usersnum; ?> Active Users</div>
                      
     
                  <a href="view_users.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View Details</span>
                  </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <?php  } ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">

                     <span class="info-box-number">Memo</span>
                       <div class="info-box-number"><?php echo $notif; ?> New Memo</div>
                     <a href="memo.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View details</span>
               </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <?php if($_SESSION['privelage']==4){ ?>
              <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-file-text" aria-hidden="true"></i></span>
                <div class="info-box-content">

                     <span class="info-box-number">Report</span>
                       <div class="info-box-number">Generate Rep.</div>
                     <a href="report.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View details</span>
               </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <?php } ?> 
<?php if($_SESSION['privelage']==1){ ?>

              <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-archive"></i></span>
                <div class="info-box-content">

                  <span class="info-box-number">Orders</span>
                
                      <div class="info-box-number"><?php echo $ordersnum; ?>New Orders</div>
                      
     
                  <a href="order_view.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View Details</span>
                  </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
               <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-truck"></i></span>
                <div class="info-box-content">

                  <span class="info-box-number">Delivery</span>
                
                      <div class="info-box-number"><?php echo $delivernum; ?>Item to deliver</div>
                      
     
                  <a href="deliver_list.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View Details</span>
                  </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
<?php } ?>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <?php if($_SESSION['privelage']==2){ ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-battery-full"></i></span>
                <div class="info-box-content">
      
                  <span class="info-box-number">Products</span>
                    <div class="info-box-number"><?php echo $importnum; ?>Confirmation</div>
                  <a href="products.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View details</span>  
                </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <?php } ?>
            <?php if($_SESSION['privelage']==4){ ?>
               <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-building"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number">Stores</span>
                  <div class="info-box-number"><?php echo $storenum; ?> Stores</div>
                  <a href="Store_record.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View details</span>
                </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <?php } ?>
            <?php if($_SESSION['privelage']==2 || $_SESSION['privelage']==4){ ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-industry"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number">Stock</span>
                  <div class="info-box-number"><?php echo $stocknum; ?> Item nearly empty</div>
                  <a href="stocks.php">
                  <span class="info-box-text"><i class="fa  fa-arrow-right"></i>View details</span>
                </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <?php } ?>
 
          </div><!-- /.row -->

          
                    
          </div><!-- /.row -->
  
        </section><!-- /.content -->
 

      </div><!-- /.content-wrapper -->

   

      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
