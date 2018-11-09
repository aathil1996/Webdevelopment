<?php


/* Attempt to connect to MySQL database */
  $con=mysqli_connect("localhost","root","","jobs");

  // Check connection
  if($con === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
