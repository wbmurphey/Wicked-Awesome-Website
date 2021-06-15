<!DOCTYPE html>
<html>
	<head>
		<title>Wicked Awesome Website</title>
		<link rel="stylesheet" href="styleboy.css">
		<link rel="icon" href="leeloo_icon_128x128.png" type="image/gif" sizes="16x16">
	</head>
	<body>
	<p><h1>
<?php
session_start();
if (isset($_SESSION['message'])){	
 echo $_SESSION['message'];
}
?>
</h1></p>

		<h1>Welcome to the best friggin page you've ever seen, pal.</h1>
		
		<div class="center-button">
		<p><button class="button button1" type="button" onclick="document.location='login.php'">What are you waiting for, chowdahead, login!</button></p>
		</div>
		
		<div class="center-button">
		<p><button class="button button2" type="button" onclick="document.location='createaccount.php'">No account? What's wrong with you, buddy?</button></p>
		</div>
		
		<div class="center-button">
		<p><button class="button button3" type="button" onclick="document.location='logout.php'">Logout, broh</button></p>
		</div>
		
	</body>
</html>