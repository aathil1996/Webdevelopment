<?php
session_start();

?>

<!DOCTYPE html>
<html>

	<head>
		<title> JOB HUB </title>
			<?php

			  if(isset($_SESSION["userType"]) && $_SESSION["userType"] === 0){
			//              need to load admin welcome page
				header("location: welcome_admin.php");
			  }
				elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 1){
			//              need to load seekers welcome page
					header("location: welcome_js.php");
				}		elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 2){
			//              need to load Company welcome page
					header("location: welcome_jp.php");
						}
					
			?>
			<link rel="stylesheet" type="text/css" href="../css/style_hme.css">
	</head>

	<body class="body">

		<!-- Header topbar -->
		<div class="header"> 
			<?php 
				include '../structure/header.php'; ?>			
		</div>
		<!-- End of Header topbar -->

		<div class="container">

			<!-- Side Bar -->
			<div>
				<?php 
					include '../structure/menuBar_home.php'; ?>
			</div>
			<!-- End of Side Bar -->

			<!-- content area of the login page -->
			<div class="content">
				<br>
				<div class="home">
					<div class="homeDetails"> </div>
				</div>
			</div>
			<!-- end of content area -->


		<!-- Footer Section -->
		<?php include '../structure/footer.php'; ?>
		<!-- end of Footer Section -->
	</div>

	</body>

<html>
