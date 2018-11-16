<?php
session_start();

?>

<!DOCTYPE html>
<html>

	<head>
		<title> JOB HUB </title>
		<?php

	  if(isset($_SESSION["userType"]) && $_SESSION["userType"] === 0){
	  //              need to load company welcome page
		header("location: welcome_admin.php");
	  }
		elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 1){
			header("location: welcome_js.php");
		}		elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 2){
			header("location: welcome_jp.php");
				}
				else{
					include '../structure/menuBar_home.php';

				}
?>  	 
		 <link rel="stylesheet" href="../css/style_search.css">
		 <link rel="stylesheet" href="../css/style_home.css">
	</head>

	<body>
		<div id="outline" style="margin:auto; max-width:80%;">
			<div class="search-container">
				<form action="" >
  					<input type="text" name="search" placeholder="Search Jobs Here..!"/>
 					<button type="submit" formaction="../pages/login.php">Search</button>
				</form>
				<br/>
				<br/>
				<br/>
				<br/>


				<!-- Announce -->
				<div class="Announce">
					We’ve over <strong>15 0000</strong> Post offers for you!
				</div>
				<P>
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv 
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv 
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv 
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv 
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv 
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv 
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>
					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>

					sdfgh cbftgh  hsbfsdfgb hfgb fsvf,gb fgvb fvfgvb vfgb dfsvbdcv <br/>
				</P>
					


			</div>


		</div>

		<!-- Footer Section -->
		<?php include '../structure/footer.php' ?>
			
	</body>

<html>
