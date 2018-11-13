<!DOCTYPE html>
<html>

	<head>
		<title> JOB HUB </title>
		 <link rel="stylesheet" href="../css/style_home.css">
		 <link rel="stylesheet" href="../css/style_search.css">
	</head>

	<body>
		<div id="outline">

			<!-- Header Section -->
			<?php include '../structure/header.php'; ?>

			<div class="buttons">
				<form>
				<button type="submit" formaction="../pages/login.php" class="btn"> <span>Log In</span> </button>
				<button type="submit" formaction="../pages/signupjs.php"  class="btn" > <span>Sign Up AS A JOB SEEKER</span>
				</button>
				<button type="submit" formaction="../pages/signupjp.php"  class="btn"><span>Sign Up AS A JOB PROVIDER</span>
				</button>
				</form>
			</div>


			<!-- Content Section -->

			<br/>
			<br/>
			
				<form class="search"  style="margin:auto;max-width:500px">
  					<input type="text" name="search" placeholder="Search Jobs Here..!"/>
 					<br/>
 					<br/>
 					<br/>
 					<button type="submit" formaction="../pages/login.php" class="button"> <span>Search</span> </button>
				</form>
				<br/>
				<br/>
				<br/>
				<br/>


				<!-- Announce -->
				<div class="Announce">
					We’ve over <strong>15 0000</strong> Post offers for you!
				</div>

			




		</div>

		<!-- Footer Section -->
		<?php include '../structure/footer.php'; ?>

	</body>

<html>
