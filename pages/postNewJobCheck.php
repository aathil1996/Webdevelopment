<?php
session_start();



?>
<html>
<head>
  <title>PHP Test</title>
</head>
<body>
  <?php

  if(isset($_SESSION["userType"]) && $_SESSION["userType"] === 2){
    //              need to load company welcome page
    header("location: postNewJob.php");

  }
  else{
    echo "<h1> Please Signout and Sign in as a Job Provider or <a href='../pages/signupjp.php'>create an account here</a></h2>";
  }

  ?>
</body>
</html>
