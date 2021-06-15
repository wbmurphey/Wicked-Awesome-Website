<?php
session_start(); 
if( isset($_SESSION['user'])!="" ){
 header("Location: index.php");
}
include_once 'connect.php';
  
if ( isset($_POST['sca']) ) {
 $username = trim($_POST['username']);
 $pass = trim($_POST['pass']);
 $password = hash('sha256', $pass);

 $query = "select userid, username, pass from people where username=?";
 $stmt = $pdo->prepare($query);
 $stmt->execute([$username]);
 $count = $stmt->rowCount();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);

 if( $count == 1 && $row['pass']==$password ) {
  $_SESSION['user'] = $row['userid'];
  header("Location: profile.php"); 
  }
 else {
  $message = "Invalid Login";
 }
 $_SESSION['message'] = $message;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>DO IT DO IT DO IT</title>
		<link rel="stylesheet" href="styleboy.css">
		<link rel="icon" href="leeloo_icon_128x128.png" type="image/gif" sizes="16x16">
		<script>
			function goBack() {
				window.history.back();
			}
		</script>
	</head>
	<body>
	<p><h1>
<?php
if ( isset($message) ) {
echo $message;
}
?>
</h1></p>
		<p><h1>Friggin login dude</h1></p>
		
		<form class="form-style1" action="login.php" method="post">
		Whats yah username, skeezah?<input class="form-inputstyle1" type="text" name="username" /><br /><br />
		Don't just sit theh, put in yah passwad: <input class="form-inputstyle1" type="password" name="pass" /><br /><br />
		<div class="center-button">
		<input class="button button7" type="submit" name="sca" value="Login" />
		</div>
		</form>
		<div class="center-button">
		<p><button class="button button3" type="button" onclick="document.location='logout.php'">Logout</button></p>
		</div>
		<div class="center-button">
		<p><button class="button button5" type="button" onclick="goBack()">Back</button></p>
		</div>
	</body>
</html>
