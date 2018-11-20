<?php

	session_start();
	include "../dbConnection.php";
	//$user = $_SESSION['username'];
	$sect = $_SESSION['userType'];

	$sql = "SELECT password FROM users WHERE username=?";
    $result = mysqli_query($conn,$sql);	
    $row = mysqli_fetch_assoc($result);
	$password = $row['password'];

	$ppw = $_POST['password'];
	$pw1 = $_POST['password1'];
	$pw2 = $_POST['password2'];
	$ppw = md5($ppw);
	$pw1 = md5($pw1);
	$sect = $_POST['sect'];

	if($password==$ppw){
		$sql1 = "UPDATE users SET password='$pw1' where (password='$pw' AND name='$user')";
		$qry = mysqli_query($conn,$sql1);
		if($qry){
			if($sect==0){
				header("location: adminHome.php");
			}
			else if($sect==1){
				header("location: welcome_jp.php");
			}
			else if($sect==2){
				header('location:pages/welcome_JS.php?changedPassWord=true');
			}
			
		}	
		else{
			echo "error";
		}
	}

	else{
		if($sect==0){
				header("location: adminHome.php");
			}
			else if($sect==1){
				header("location: welcome_jp.php");
			}
			else if($sect==2){
				header('location:pages/welcome_JS.php?err=true');
			}
	}

?>
