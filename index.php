<?php
if(empty($_SESSION)) session_start();
if(!isset($_SESSION['userid']))
{ //if not logged in
//here we can load the Guest Welcome page, your main.php

//and showing a Login button to call this page
  header('Location: pages/home.php');// send to login page


  exit;
}
?>


<!DOCTYPE html>
<html lang="en">


//adding the header
<head>
  <?php include 'structure/header.php'; ?>
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <?php include 'structure/topbar.php'; ?>





    //Add content here depending on the type of userid
    // load jobs if it is a job seeker
    //load new job posting like things, if it is a Job Poster, or a company
    //load settings if it is an Admin


    //adding footer
    <?php include 'structure/footer.php'; ?>


  </body>
  </html>
