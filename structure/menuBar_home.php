<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style_topnav_home.css">
	<style type="text/css">
		* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Calibri','Verdana', 'Arial', Helvetica san-serif;
  background-color: rgb(255,249,230);
  min-width: 1024px;
  overflow: auto;
}

a {
  text-decoration: none;
}

.body{
  margin: 0 auto;
  clear : both;
  align: center;
  min-width: 1024px;
}

.container{
  position: absolute;
  background-color:  #fbf4db ;
  top: 15%;
  width:100%;
  height: auto;
}

.sidebar{
  width:18%;
  background-color: #423E3D;
  float: left;
  position: fixed;
  margin-bottom: 1%;
  height: 100%;
  padding-top:3%;
}

ul#nav{
  margin-top:10%;
}

ul#nav li{
  list-style: none;
}

ul#nav li a{
  color:#ccc;
  display: block;
  padding: 4%;
  font-size: 1.1em;
  border-bottom: 0.05em solid #99908E;
  -webkit-transition:0.2s;
  -moz-transition:0.2s;
  -o-transition:0.2s;
  transition:0.2s;
  font-size:1.3em; 
  padding-left:0; 
  text-align: center;
}

ul#nav li a:hover{
  background-color: #4D494B;
  color: #fff;
  padding-left: 24%;
}

ul#nav li a.selected{
  background-color: #030303;
  color: #fff;
  padding-left: 20%;
}
	</style>
</head>
<body>
		<div class="topnav">
      <a class="active" href="../pages/login.php">Log In</a>
      <a href="../pages/signupjs.php">Sign Up AS A JOB SEEKER</a>
      <a href="../pages/signupjp.php">Sign Up AS A JOB PROVIDER</a>

    </div>

    <div class="container">
		<!-- Side Bar -->
		<div class="sidebar">
			<ul id="nav">
				<li><a style="border-top: 0.05em solid #99908E; " href="../pages/login.php">Log In</a></li>
				<li><a href="../pages/signupjs.php">Sign Up AS A JOB SEEKER</a></li>	
				<li><a href="../pages/signupjp.php">Sign Up AS A JOB PROVIDER</a></li>	
			</ul>
			<br>
		</div>
	</div>
  
</body>
</html>