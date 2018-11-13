<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php
 session_start();



 if(isset($_SESSION["userType"])&& $_SESSION["userType"] === 2){
 //              need to load company welcome page
 echo "com";

 }

?>
 </body>
</html>
