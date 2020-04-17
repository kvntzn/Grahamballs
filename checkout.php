<!DOCTYPE html>
<?php include 'lib/connect.php';
include 'lib/controller.php';
session_start();
if($_SESSION['privelage']==1 || $_SESSION['privelage']==2 || $_SESSION['privelage']==4){
  header("location:index.php");
}
if(!isset($_SESSION['username'])){
  header("location:login.php");
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
							<!-- 	<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li> -->
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
	<?php

 $userx = $_SESSION['username'];

            $idget=mysqli_query($conn,"SELECT cus_id FROM tbl_customer Where cus_uname='$userx' ");
            $row = mysqli_fetch_array($idget);
            $userid = $row['cus_id'];

	 ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->


		
				<div id ="checkout_list"></div>
				

		</div>
		
	</section> <!--/#cart_items-->

	<div></div>

 	
		


	<!-- // <script src='https://www.google.com/recaptcha/api.js'></script> -->
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
 	<script type="text/javascript">
function change_town(){
var xmlhttp= new XMLHttpRequest();
xmlhttp.open("GET","ajax.php?city="+document.getElementById("cityx").value,false);
xmlhttp.send(null);
 
document.getElementById("town").innerHTML = xmlhttp.responseText ; 


 	}

function change_province(){
var xmlhttp= new XMLHttpRequest();

xmlhttp.open("GET","ajax_province.php?province="+document.getElementById("provincedd").value,false);

xmlhttp.send(null);

document.getElementById("city").innerHTML = xmlhttp.responseText ; 
 
// if(document.getElementById("provincedd").text=='Select'){

// document.getElementById("city").innerHTML="<select><option>Select</option></select>";

// }
 //document.getElementById("town").innerHTML="<select required><option>x1</option></select>";
   }
function test(select){
 $("option[value='disable']",select).hide();
}
 


 	</script>

  </script>

<script type="text/javascript">
function fetchz_data(){

	$.ajax({

		url:'checkout_list.php',
		method:'POST',
		success:function(data){

			$('#checkout_list').html(data);


		}
	})
}fetchz_data();




$(document).on('click','#plus',function(){
	var id = $(this).data('id');
	var sid  = $(this).data('id2');
	add_data(id,sid);

function add_data(id,sid){

	$.ajax({


	url:'cplus.php',
	method:'POST',
	data:{id:id,sid:sid},
	dataType:'JSON',
	success:function(data){

	if(data.status== 'error'){
        alert("No more stocks available!");
    }
			fetchz_data();

	} 

	})
}
});



$(document).on('click','#minus',function(){
	var id = $(this).data('id');
	var sid  = $(this).data('id2');
	minus_data(id,sid);

function minus_data(id,sid){

	$.ajax({


	url:'cminus.php',
	method:'POST',
	data:{id:id,sid:sid},
	dataType:'text',
	success:function(data){


		fetchz_data();
	}

	})
}
});


$(document).on('click', '#delete_cart', function(){  
           var id=$(this).data("id");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"cart_delete.php",  
                     method:"POST",  
                     data:{id:id},  
                       
                     success:function(data){  
                         alert(data);
            
              // $('tr#'+id+'').css('background-color', '#ccc');  
              //                       $('tr#'+id+'').fadeOut('slow');  
	fetchz_data();                     
                     } 
               });  
           } 
      })



 // $(document).on('blur', '#cquantity', function(){  
 //           var id = $(this).data("id1");  
 //           var quantity = $(this).text();  
 //           edit_data(id, quantity, "quantity");  
 //      });  


</script>
</body>
</html>


