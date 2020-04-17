		<?php  


include 'lib/connect.php';
include 'lib/controller.php';
include 'best_sell.php';

session_start();
if(isset($_SESSION['username'])){
 if($_SESSION['privelage']==1 || $_SESSION['privelage']==2 || $_SESSION['privelage']==4){
  header("location:index.php");
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Grahamballs Delivery</title>
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

							<h3><?php include 'logo_head.php'; ?><i class="fa fa-battery-full"></i> Grahamballs Delivery</h3>

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
								<li><a href="Windex.php" class="active">Home</a></li>
								<li class="dropdown"><a href="view_product.php">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="view_product.php">Products</a></li>
										 
										<li><a href="checkout.php">Checkout</a></li> 
										<?php if(isset($_SESSION['username'])){ ?>

									<!-- 	<li><a href="cart.php">Cart</a></li>  -->
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
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Grahamballs</span>-Delivery</h1>
									 <!-- <h2>24/7 delivery</h2>   -->
									<!-- <p>Our delivery never sleeps!  24 hours a day, 7 days a week. no holidays! day and night! just call our 24/7 delivery hotline 3478989, Accepts all major credit cards. </p> -->
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
								  <!-- <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" /> -->
								 
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Grahamballs</span>-Delivery</h1>
									<!-- <h2>Jump Start</h2> -->
									<!-- <p>With a minimum amount, we can jump start your car, so you’ll be on the move in no time. </p> -->
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
									  <!-- <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" /> -->
									<!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->  
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Grahamballs</span>-Delivery</h1>
									<!-- <h2>Products </h2>  -->
									<!-- <p>All Batteries got the batteries for you, from small button cell batteries to large industrial forklift batteries. -->
<!-- DETAILS</p> -->
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
							 	<!-- <img src="images/home/girl3.png" class="girl img-responsive" alt="" /> -->
									<!-- <img src="images/home/pricing.png" class="pricing" alt="" /> -->  
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							 
							  <?php $get=mysqli_query($conn,"SELECT  Distinct stock_category FROM tbl_stocks where stock_quantity>0");
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
								  <?php $get=mysqli_query($conn,"SELECT  Distinct stock_brand FROM tbl_stocks  where stock_quantity>0");
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
						<h2 class="title text-center">Features Items</h2>
						 <?php 
 						if(isset($_SESSION['username'])){ 
						 $userx = $_SESSION['username'];
						$idget=mysqli_query($conn,"SELECT cus_id FROM tbl_customer Where cus_uname='$userx' ");
		 			 	$row = mysqli_fetch_array($idget);
		 			 	$userid = $row['cus_id'];
		 			 	 }

		 			 	 	
							date_default_timezone_set('Asia/Singapore');
			 					$date = date("Y-m-d");

		 			 							$get=mysqli_query($conn,"SELECT * FROM tbl_stocks  where stock_quantity >0 limit 6");
								                 while($query=mysqli_fetch_array($get))
								                      { 
								                      
								                      	?>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										
								 
								<img src="getImage_stocks.php?id=<?php echo   ''.$query['stock_id'].'' ;?>"  height="150" style="width:300;">


											<h2><?php echo ' P'.$query['stock_price'].' ';?></h2>

											<p><?php echo ' '.$query['stock_name'].' ';?></p>

									<?php if(isset($_SESSION['username'])){ echo '<a href=addcart.php?id='.$query['stock_id'].'&uid='.$userid.' class="btn  btn-default add-to-cart"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a> '; 
										}else {
											
									echo "<a href=\"login.php\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a>";
										}?>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo ' P'.$query['stock_price'].' ';?></h2>
												<?php if($query['stock_sale']>0){
														$dec = $query[9]/100;
							                             $total = $query[2]*$dec;
							                             $stotal = $query[2] - $total;		

												 ?>

												<h2><?php echo 'Sale: P'.number_format($stotal,2, "." , "," ).' ';?></h2>

												<?php } ?>

												<p><?php echo ' '.$query['stock_name'].' ';?></p>

											<?php if(isset($_SESSION['username'])){ echo '<a href=addcart.php?id='.$query['stock_id'].'&uid='.$userid.' class="btn  btn-default add-to-cart"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a> '; 
										}else {
											
									echo "<a href=\"login.php\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a>";
										}?>

											</div>
										</div>
							
									<?php


									if($bestrow>0){

										 foreach($bestseller as $best) {
										 	 if($query['stock_name']==$best){ 
						            echo '<img src="images/home/best.png" class="new" alt="" />';
						        }else if($query['stock_sale']>0){

						        	echo '<img src="images/home/sale.png" class="new" alt="" />	';

						        }else if($query['stock_date']==$date){ 
						        	echo '<img src="images/home/new.png" class="new" alt="" />';
						         }
									}
								}
												  
										
										 
									
										 

										
								 	

									
							 

								 	 if($query['stock_sale']>0){
										?>

										<img src="images/home/sale.png" class="new" alt="" />	
								<?php 	}else if($query['stock_date']==$date){ ?>

									<img src="images/home/new.png" class="new" alt="" />
									<?php } ?>
										 
								</div>
						 
							</div>
						</div>
						<?php  } ?>
						 
					</div><!--features_items-->
					
		
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								
								<div class="item active">

									 <?php $get=mysqli_query($conn,"SELECT * FROM tbl_stocks where stock_quantity >0 limit 3  ");
								                 while($query=mysqli_fetch_array($get))
								                      {

								                       ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="getImage_stocks.php?id=<?php echo   ''.$query['stock_id'].'' ;?>"  height="200">
													<h2><?php echo ' P'.$query['stock_price'].' ';?></h2>
													<p><?php echo ' '.$query['stock_name'].' ';?></p>
													<?php if(isset($_SESSION['username'])){ echo '<a href=addcart.php?id='.$query['stock_id'].'&uid='.$userid.' class="btn  btn-default add-to-cart"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a> '; 
										}else {
											
									echo "<a href=\"login.php\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a>";
										}?>
												</div>
												<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo ' P'.$query['stock_price'].' ';?></h2>
												<?php if($query['stock_sale']>0){
														$dec = $query[9]/100;
							                             $total = $query[2]*$dec;
							                             $stotal = $query[2] - $total;		

												 ?>

												<h2><?php echo 'Sale: P'.number_format($stotal,2, "." , "," ).' ';?></h2>

												<?php } ?>

												<p><?php echo ' '.$query['stock_name'].' ';?></p>

											<?php if(isset($_SESSION['username'])){ echo '<a href=addcart.php?id='.$query['stock_id'].'&uid='.$userid.' class="btn  btn-default add-to-cart"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a> '; 
										}else {
											
									echo "<a href=\"login.php\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a>";
										}?>

											</div>
										</div>
							
									<?php


									if($bestrow>0){

										 foreach($bestseller as $best) {
										 	 if($query['stock_name']==$best){ 
						            echo '<img src="images/home/best.png" class="new" alt="" />';
						        }else if($query['stock_sale']>0){

						        	echo '<img src="images/home/sale.png" class="new" alt="" />	';

						        }else if($query['stock_date']==$date){ 
						        	echo '<img src="images/home/new.png" class="new" alt="" />';
						         }
									}
								}
												  
										
										 
									
										 

										
								 	

									
							 

								 	 if($query['stock_sale']>0){
										?>

										<img src="images/home/sale.png" class="new" alt="" />	
								<?php 	}else if($query['stock_date']==$date){ ?>

									<img src="images/home/new.png" class="new" alt="" />
									<?php } ?>
										 
											</div>
										</div>
									</div>
									
								<?php } ?>
			
								</div>
								
				                  <div class="item">
				                  <?php $get=mysqli_query($conn,"SELECT * FROM tbl_stocks  where stock_quantity >0 limit 3,3 ");
								                 while($query=mysqli_fetch_array($get))
								                      { ?>	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="getImage_stocks.php?id=<?php echo   ''.$query['stock_id'].'' ;?>" >
										<h2><?php echo ' P'.$query['stock_price'].' ';?></h2>
											<p><?php echo ' '.$query['stock_name'].' ';?></p>
									<?php if(isset($_SESSION['username'])){ echo '<a href=addcart.php?id='.$query['stock_id'].'&uid='.$userid.' class="btn  btn-default add-to-cart"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a> '; 
										}else {
											
									echo "<a href=\"login.php\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a>";
										}?>
												</div>
												
											</div>
										</div>
									</div>
									
									
									<?php } ?>
									</div>
								
							

							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>



					</div><!--/recommended_items-->

					
			</div>
		</div>
	</section>
	
 

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>