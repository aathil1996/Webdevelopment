<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
	* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #FFC300;
  top: 0;
  position: fixed;
  width: 100%;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
  display: block;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
  font
}

.header a:hover {
  color: White;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

</style>
</head>


<body>
	<header>
		<div class="header" id="ourHeader">
		  <a href="../index.php" class="logo">Jobs Hub</a>
		  <div class="header-right">
		    <a class="active" href="#home">HOME</a>
		    <a href="#contact">Contact</a>
		    <a href="#about">About</a>
		  </div>
		</div>
	</header>


</body>
</html>
