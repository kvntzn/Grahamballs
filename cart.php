<!DOCTYPE html>
<?php include 'lib/connect.php';
include 'lib/controller.php';
session_start();
if(!isset($_SESSION['username'])){
  header("location:Windex.php");
}
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
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
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

										<li><a href="cart.php">Cart</a></li> 
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Cart</li>
				</ol>
			</div>
			<div id='cart_list'></div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Cost of your items in the cart</h3>
				<p>Total cost of your items</p>
			</div>
			<div class="row">
			 
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
						<?php 
					 $xget=mysqli_query($conn,"SELECT * from tbl_cart where cart_user_id = '$userid' "); 
						  $ptotal = 0;
						while($query=mysqli_fetch_array($xget))
	                      { 

	                      	 $ord_stock = $query[7];
                          $check_num = mysqli_query($conn,"SELECT * from tbl_stocks where stock_id=$ord_stock");
                          $num_rows = mysqli_num_rows($check_num);

                          if($num_rows>0){

					 ?>
						
							<li><?php echo ''.$query['cart_name'].' ';?><span><?php   $total  = $query['cart_price'] * $query['cart_quantity'];    echo 'P'.number_format($total,2, "." , "," ).' '; $ptotal = $ptotal + $total;?></span></li>
						
						
							<?php   } }
								
							 ?> 

							 	<li>Shipping Cost <span>Free</span></li>
							<li>Total <span><?php echo 'P'.number_format($ptotal,2, "." , "," ).' '?></span></li>
						</ul>

							  <a class="btn btn-default check_out" href="checkout.php">Check Out</a>
							
				</div>

			</div>

					</div>
		</div>
		 

	</section><!--/#do_action-->

<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 Battery Delivery System. All rights reserved.</p>
					<p class="pull-right"> <span><a target="_blank"  >BSIT-3A</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
 <?php }else{  ?>

					<div class="shipping text-center"><!--shipping-->
											 <h2 class="title text-center">There are no items in your cart</h2>
											</div><!--/shipping-->
						
							<?php  }
							   ?>


	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>