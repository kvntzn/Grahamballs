<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
				<li class="v-sep"><a href="user_setting.php" class="round button dark menu-user"><span class="glyphicon glyphicon-eye-open"></span> Logged in as <strong style="color: pink;"><?php 
				echo $_SESSION['username']; ?></strong></a>
				</li>
				<li><a href="user_logout.php" class="round button dark menu-logoff"><span class="glyphicon glyphicon-off" style="color: cyan;"></span> Log out</a></li>
				
			</ul> <!-- end nav -->

					


		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	