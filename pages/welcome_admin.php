<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
	<?php

  if(isset($_SESSION["userType"]) && $_SESSION["userType"] === 0){

	   include '../structure/header.php';

	   include '../structure/menuBar_admin.php';

	   include '../structure/footer.php';
  }
  else{
	    header("location: login.php");
  }

  ?>

</body>
</html>
