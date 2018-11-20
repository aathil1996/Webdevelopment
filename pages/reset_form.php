<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
<div class="page-area-1" id="pw1" style="margin-top: 2%;">
			<form name="changePW" action="../pages/resetpw.php" method="post">
				<div class="pw-change">
					<div class="inputName">Current Password</div>
					<input type="password" name="password" placeholder="Enter current password"/>
					<div class="inputName">New Password<span id="er1"></span></div>
					<input type="password" name="password1" placeholder="Enter new password"/>
					<div class="inputName">Confirm Password<span id="er2"></span></div>
					<input type="password" name="password2" placeholder="Re-Enter new password"/>
					<input type="hidden" name="sect" value="<?php echo $_SESSION['section'];?>"/>
					<button class="update-button" onclick="return matchpass()" type="submit">Change</button> 
				</div>

				<div style="float:left; margin-top: 2%; margin-left: 2%;">
					<div id="error"></div>
				</div>
			</form>
		</div>
</body>
</html>