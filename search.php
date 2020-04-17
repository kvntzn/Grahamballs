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


      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
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
            <?php if($_SESSION['privelage']==2){?>
            <li >
              <a href="logo.php">
                <i class="fa fa-picture-o"></i> <span>logo</span>
              </a>
            </li>
            <?php } ?>
                    <?php if($_SESSION['privelage']==2){ echo "<li><a href='view_users.php'><i class='fa fa-users'></i> <span>Users</span></a></li>"; }?>
              <li >
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
              <a href="javascript:;" data-toggle="collapse" data-target="#product" >
                <span class='fa fa-shopping-cart'></span> Products <span class="caret"></span>
              </a>
              <ul id="product" class="collapse" >
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
            <li>
                <?php if($_SESSION['privelage']==4){ ?>
              <li  >
            <a href="Store_record.php">
              <span class="fa  fa-building" aria-hidden="true"></span>Stores</a>
          </li>
          <?php } ?>
           <?php if($_SESSION['privelage']==2  || $_SESSION['privelage']==4){ ?>
          <li>
            <a href="stocks.php">
              <span class="fa fa-line-chart"></span> Stocks</a>
          </li>
          <?php } ?>
                    <li  >
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
           Search
            <small>list</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"> Home</a></li>
            <li class="active"><i class="fa fa-search"></i><a href="#">Search</a></li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Search</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
 
              </div>
                      </div>
            <div class="box-body">
       <div class="container-fluid">
          <?php 
              if(isset($_POST['search-btn'])){
                if($_POST['search-keyword']==""){
                $temp = "  ";
                }
                else{
                $temp = $_POST['search-keyword'];
                }
              }
              else{
                $temp = $_SESSION['searched'];
                $searched = $_SESSION['searched'];
              }
              $_SESSION['searched']=$temp;
              $prod = $_SESSION['searched'];
              $searched = htmlspecialchars($prod);
              // $searched = $_SESSION['searched'];
              
            ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Search Results: <small><strong><?php echo $searched; ?><strong></small>
                        </h1>
                    </div>
                </div>
                </div>

                

            <?php
            $start=0;
            $start1=0;
            $start2=0;
            $limit=5;
            $page_pro=1;
            $page_ex=1;
            if(isset($_GET['page_pro'])){
              $page_pro=$_GET['page_pro'];
              $start1=($page_pro-1)*$limit;
            }
            if(isset($_GET['page_ex'])){
              $page_ex=$_GET['page_ex'];
              $start2=($page_ex-1)*$limit;
            }
              $check_proname=mysqli_query($conn,"SELECT * FROM `tbl_product` WHERE product_name = '$searched' OR product_name LIKE '%$searched%' LIMIT $start1,$limit");
              $check_stock=mysqli_query($conn,"SELECT * FROM `tbl_stocks` WHERE stock_name = '$searched' OR stock_name LIKE '%$searched%' LIMIT $start,$limit");
              $check_ex=mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_name = '$searched' OR ex_name LIKE '%$searched%' LIMIT $start2,$limit"); 
              $x=0;
            ?>
  <div class="panel panel-info">
              <div class="panel-heading">
              <span class="fa fa-industry"></span>  <strong>Stocks</strong>
              </div>  
            <div class="table-responsive">
              <table class="table table-condensed" align="center">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <?php  if($_SESSION['privelage']==2){ ?>
                  <th>Option</th>
                  <?php } ?>
                </thead>
                <?php
                  while($query1=mysqli_fetch_array($check_stock))
                      { 
                        $x++;
                        echo '<tr>';
                        echo '<td>'.$query1[0].'</td>';
                        echo '<td>'.$query1[1].'</td>';
                        echo '<td>'.$query1[3].'</td>';
                        echo '<td>'.$query1[2].'</td>';
                        echo '</td>';
                        echo '<td>
                        <form method=post><input type= hidden name = get_id value='.$query1['0'].'>';

                          if($_SESSION['privelage']==2){
                        echo ' <a target="_blank" href=print_item.php?name='.$query1['1'].' class="btn-sm btn-success btn btn-flat"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</a>'; 
                          }
                        echo '</form>
                        </td>';
                        echo '</tr>';
                        
                   } ?>
              </table>
            </div>
          </div>


<div class="panel panel-success">
              <div class="panel-heading">
             <span class="glyphicon glyphicon-export"></span>  <strong>Exported</strong>
              </div>  
            <div class="table-responsive">
              <table class="table table-condensed" align="center">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                </thead>
                <?php
                  while($query=mysqli_fetch_array($check_ex))
                      { 
                        echo '<tr>';
                        echo '<td>'.$query[0].'</td>';
                        echo '<td>'.$query[1].'</td>';
                        echo '<td>'.$query[2].'</td>';
                        echo '<td>'.$query[3].'</td>';
                        echo '</td>';
                        echo '</tr>';
                        $x++;
                   } ?> 
              </table>
            </div>
          </div>

  <div class="panel panel-warning">
              <div class="panel-heading">
              <span class="glyphicon glyphicon-import"></span>  <strong>Imported</strong>
              </div>  
            <div class="table-responsive">
              <table class="table table-condensed" align="center">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Date Recieved</th>
                  <th>
              
                  </th>
                </thead>
                
                <?php
                  while($query2=mysqli_fetch_array($check_proname))
                  { 
                    echo '<tr>';
                    echo '<td>'.$query2['product_id'].'</td>';
                    echo '<td>'.$query2['product_name'].'</td>';
                    echo '<td>'.$query2['product_quantity'].'</td>';
                    echo '<td>'.$query2['product_received'].'</td>';
                    echo '<td>
                    <form method=post>
                    <input type=hidden name=get_id value='.$query2['product_id'].'>             
                      ';

                  
                    echo '</form>
                    </td>';
                    echo '</tr>';
                    $x++;
                  } ?>  
              </table>
            </div>
          </div>
          <div class="col-md-offset-5">
          <?php  
            $rows1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `tbl_product` WHERE product_name = '$searched' OR product_name LIKE '%$searched'"));
            $total1=ceil($rows1/$limit);
            echo "<ul class='pagination'>";
              for($i=1;$i<=$total1;$i++){
                if($i==$page_pro) { echo "<li class='active'><a>".$i."</a></li>"; }
                else { echo "<li><a href='?page_pro=".$i."'>".$i."</a></li>"; }
              }
            echo "</ul>";
          ?>
          </div>  

          <div class="col-md-offset-5">
          <?php  
            $rows2=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `tbl_export` WHERE ex_name = '$searched' OR ex_name LIKE '%$searched'"));
            $total2=ceil($rows2/$limit);
            echo "<ul class='pagination'>";
              for($i=1;$i<=$total2;$i++){
                if($i==$page_ex) { echo "<li class='active'><a>".$i."</a></li>"; }
                else { echo "<li><a href='?page_ex=".$i."'>".$i."</a></li>"; }
              }
            echo "</ul>";
          ?>
          </div>  
          <div class="box-footer">
          <?php
            echo '<br>Found <b>'.$x.'</b> results of '.$searched;
              ?>

    </div>
         
         </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

  
 


    
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src=" plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src=" bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src=" plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src=" plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src=" dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src=" dist/js/demo.js"></script>
  </body>
</html>
