<!DOCTYPE html>
<?php
include 'lib/connect.php';
include 'lib/controller.php';
include 'best_sell.php';


date_default_timezone_set('Asia/Singapore');	
			 					$date = date("Y-m-d");
 
session_start();

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Battery Delivery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		 
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<h3><?php include 'logo_head.php'; ?><i class="fa fa-battery-full"></i> Battery Delivery</h3>
						</div>
						<div class="btn-group pull-right">
						 
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
					 
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
			<?php if(isset($_SESSION['username'])){  ?>	<li style="cursor:pointer;"><a href="notif_customer.php"><i class="fa fa-user"></i><?php echo $_SESSION['username'];?></a> </li> <?php } ?>
								
								 						 <?php if(isset($_SESSION['username'])){  ?> <li><a href="customer_logout.php"><i class="fa fa-lock"></i> Logout
            </a></li> <?php  }else { ?> 

 <li><a href="login.php"><i class="fa fa-lock"></i> Login
            </a></li>
        <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="Windex.php" >Home</a></li>
								<li class="dropdown"><a href="view_product.php">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li class="active"><a href="view_product.php">Products</a></li>
										 
										<li><a href="checkout.php">Checkout</a></li> 
										<?php if(isset($_SESSION['username'])){ ?>

										 
										<?php  }else{ ?> 
										<li><a href="login.php">Login</a></li> 
										<?php  } ?>
                                    </ul>
                                </li> 
							 
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
								<form action="search_product.php" method="POST">
							<input type="text" name="search" placeholder="Search"/>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section id="advertisement">
		<div class="container">
		 
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							 
							  <?php $get=mysqli_query($conn,"SELECT  Distinct stock_category FROM tbl_stocks where  stock_quantity >0");
								                 while($query=mysqli_fetch_array($get))
								                      { ?>
							 
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="category.php?cat=<?php echo ''.$query['stock_category'].'';?>"><?php echo '  '.$query['stock_category'].' ';?></a></h4>
								</div>
							</div>

							<?php } ?>
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								  <?php $get=mysqli_query($conn,"SELECT  Distinct stock_brand FROM tbl_stocks where  stock_quantity >0");
								                 while($query=mysqli_fetch_array($get))
								                      { ?>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="brand.php?brand=<?php echo ''.$query['stock_brand'].''; ?>"> <span class="pull-right"></span><?php echo ''.$query['stock_brand'].''; ?></a></li>
									 
								</ul>
									<?php } ?>
							</div>
						</div><!--/brands_products-->
						
						
						 
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->

						<h2 class="title text-center">Messages</h2>
							 <?php 
							 
 						if(isset($_SESSION['username'])){ 
						 $userx = $_SESSION['username'];
						$idget=mysqli_query($conn,"SELECT user_id FROM tbl_user Where user_name='$userx' ");
		 			 	$row = mysqli_fetch_array($idget);
		 			 	$userid = $row['user_id'];
		 			 	 }
?>
						 <div id="messages"></div>
						
					</div><!--features_items-->

					 
		  
				</div>

			</div>
		</div>
	</section>
	
		<!-- 
	<footer id="footer">
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 Battery Delivery System. All rights reserved.</p>
					<p class="pull-right"> <span><a target="_blank" >BSIT-3A</a></span></p>
				</div>
			</div>
		</div>
		
	</footer> -->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">
    function fetchz_data(){

    	$.ajax({

    		url:'customer_memo.php',
    		method:'POST',
    		success:function(data){

    			$('#messages').html(data);
    		}
    	})
    }fetchz_data();

    $(document).on('click', '#deletememo', function(){   
      var id = $(this).data("id");  
       
   

        if(confirm("Are you sure you want to delete this?"))  
           {  
      
    $.ajax({  
                url:"memo_del.php",  
                method:"POST",  
                data:{ id:id },  
                dataType:"text",  
                success:function(data)  
                {   
              // $('tr#'+id+'').css('background-color', '#ccc');  
              // $('tr#'+id+'').fadeOut('slow');  
            fetchz_data(); 
                }  
           })        
  }


    
   

 }); 

    </script>
</body>
</html>