<?php

session_start();
if($_SESSION['privelage']==3){
  header("location:Windex.php");
}
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
 include 'add.php';
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
            
            <li >
              <a href="logo.php">
                <i class="fa fa-picture-o"></i> <span>logo</span>
              </a>
            </li>
           <?php if($_SESSION['privelage']==2){ echo "<li><a href='view_users.php'><i class='fa fa-users'></i> <span>Users</span></a></li>"; }?>
              <li >
              <a href="memo.php">
                <i class="fa fa-envelope"></i> <span>Memo</span>
                <small class="label pull-right bg-yellow"><?php echo $notif; ?></small>
              </a>
            </li>
             <li class="active treeview">
              <a href="javascript:;" data-toggle="collapse" data-target="#product" >
                <span class='fa fa-shopping-cart'></span> Products <span class="caret"></span>
              </a>
              <ul id="product" class="collapse" >
                 <li><a href="products.php"><span class="fa fa-caret-square-o-down"></span> Imported</a></li>
                   <li><a href="products-export.php"><span class="fa fa-caret-square-o-up"></span> Product Exported</a></li>
              </ul>
          </li>
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
           <?php if($_SESSION['privelage']==2){ ?>
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

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Products
            <small>Imported</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="#"><i class="fa  fa-shopping-cart"></i> Products</a></li>
     
          </ol>
        </section>


        <section class="content">
          <div class="row">
            <div class="col-md-3"> <?php add_pro(); ?>
            <?php   if($_SESSION['privelage']==2){ ?>
              
                <button type="button" class="btn btn-warning btn-block margin-bottom" data-toggle="modal" data-target="#AddPModal">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add Product
              </button>
              <?php } ?>
             
           
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Products</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-import"></span> Import <span class="label label-primary pull-right"><?php echo $importnum; ?></span></a></li>
                   <li  ><a href="products-export.php"><span class="glyphicon glyphicon-export"></span> Export <span class="label label-primary pull-right"></span></a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
          

            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Products</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                         <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                   
                    <!-- Check all button -->

                  
        
              <div class="panel-heading">
                <div class="box-body no-padding">
                 
                   </span> <strong>Imported</strong>
              <!-- Button trigger modal for add products-->
               
              </div> 
               </div> 
                 <div id="product_list">
                 </div>
              </div><!-- /. box -->
    
            </div><!-- /.col -->

          </div><!-- /.row -->
        </section><!-- /.content -->

        <!-- Main content -->
       
      </div><!-- /.content-wrapper -->


      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="closer"> &times;</button>
          <h4 class="modal-title">Edit Product</h4>
        </div>
    
  <style> 
  
  .modal-dialog{
    overflow-y: initial !important
  
}


  </style>
    
    
      
        <div class="modal-body" style="height: 400px; overflow-y: auto;">
      <div class="Content" id="tablec">
          
        
      </div>

    
    
    
        </div>
    

    <!-- <button type="button" class="btn btn-primary" style="float:left;" data-toggle="modal" data-target="#myModals" id="add_modals">Add</button> -->
  

                    
<!--   <button id="hide" class="btn btn-default"  name="btn_delete" type="button"   style="display:none;">
<img src="dlete.png" alt="Submit" style="width:30px; height:20px;" >
</button>
<button type="button" class="btn btn-info" id="select_all" style="display:none;" >Select All</button> -->
                    <!--   <button type="button"  class="btn btn-info" id="showmap">Confirm</button>

                   <button type="button" class="btn btn-danger" data-dismiss="modal" id="closer">Close</button> -->
       
    
    
  
        
      </div>
      
    </div>
  </div>
<div class="modal fade" id="myModalz" role="dialog">
    <div class="modal-dialog">
 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="closer"> &times;</button>
          <h4 class="modal-title">Choose store to import</h4>
        </div>
    
  <style> 
  
  .modal-dialog{
    overflow-y: initial !important
  
}


  </style>
    
    
      
        <div class="modal-body" style="height: 400px; overflow-y: auto;">
      <div class="Content" id="stores">
          
        
      </div>

    
    
    
        </div>
    

    <!-- <button type="button" class="btn btn-primary" style="float:left;" data-toggle="modal" data-target="#myModals" id="add_modals">Add</button> -->
  

                    
<!--   <button id="hide" class="btn btn-default"  name="btn_delete" type="button"   style="display:none;">
<img src="dlete.png" alt="Submit" style="width:30px; height:20px;" >
</button>
<button type="button" class="btn btn-info" id="select_all" style="display:none;" >Select All</button> -->
  <div class="modal-footer">
                        <button type="button"  class="btn btn-info" id="import">Confirm</button>

                   <button type="button" class="btn btn-danger" data-dismiss="modal" id="closer">Close</button>  
       </div>
    
    
  
        
      </div>
      
    </div>
  </div>

<!-- <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>BSIT </b> 3A
          </div>
          <strong>Battery delivery system</a>.</strong> All rights reserved.
        </footer>
 -->

     
       
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

        <script>

  function fetchz_data()  
      {    
      
    $.ajax({  
                url:"product_list.php",  
                method:"POST",  
  
                success:function(data)  
                {   
          
             $('#product_list').html(data); 
            
                }  
           })        
  }fetchz_data();





    $(document).on('click', '#editprod', function(){   
      var id = $(this).data("id3");  
       
  function fetch_data()  
      {    
      
    $.ajax({  
                url:"product_edit.php",  
                method:"POST",  
                data:{ id:id },  
                dataType:"text",  
                success:function(data)  
                {   
             $('#tablec').html(data); 
            
                }  
           })        
  }
    fetch_data();
 
 }); 



$(document).on('click', '#imports', function(){   
      var id = $(this).data("id");  
       
  function import_data()  
      {    
      
    $.ajax({  
                url:"import_list.php",  
                method:"POST",  
                data:{ id:id },  
                dataType:"text",  
                success:function(data)  
                {   
             $('#stores').html(data); 
            
                }  
           })        
  }
    import_data();
 
 });

    </script>



    <script>
 
    $(document).on('click', '#deleteprod', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"del.php",  
                     method:"POST",  
                     data:{id:id},  
                       
                     success:function(data){  
                         alert(data);
            
                        $('tr#'+id+'').css('background-color', '#ccc');  
                        $('tr#'+id+'').fadeOut('slow');  
                    fetchz_data();
                     } 
                });  
           }  
      })

    </script>

<script>
 
    $(document).on('click', '#import', function(){  
           var id=$('#imports').data("id");
           var store = $('#store').val();
           if(confirm("Do you wanna import this product to stocks?"))  
           {  
                $.ajax({  
                     url:"import_to_stock.php",  
                     method:"POST",  
                     data:{id:id , store:store},  
                       
                     success:function(data){  
                         alert(data);
                      $('#myModalz').modal('hide');
                        $('tr#'+id+'').css('background-color', '#ccc');  
                        $('tr#'+id+'').fadeOut('slow');  
                    
                     } 
                });  
           }
           fetchz_data();  
      })

    </script>

  </body>
</html>
