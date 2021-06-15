<?php
session_start();
if( isset($_SESSION['user'])!="" ){
 header("Location: profile.php");
}
include_once 'connect.php';

if ( isset($_POST['sca']) ) {
 $username = trim($_POST['username']);
 $fname = trim($_POST['fname']);
 $lname = trim($_POST['lname']);
 $email = trim($_POST['email']);
 $pass = trim($_POST['pass']);
 $password = hash('sha256', $pass);

 $query = "insert into people(username,fname,lname,email,pass) values(?, ?, ?, ?, ?)";
 $stmt = $pdo->prepare($query);
 $stmt->execute([$username,$fname,$lname,$email,$password]);
 $rowsAdded = $stmt->rowCount();

  if ($rowsAdded == 1) {
   $message = "Success! Proceed to login";
   unset($fname);
   unset($lname);
   unset($email);
   unset($pass);
   header("Location: login.php");
  }
  else
  {
   $message = "Failed! For some reason";
  }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>I don't got all day pal.</title>
		<link rel="stylesheet" href="styleboy.css">
		<link rel="icon" href="leeloo_icon_128x128.png" type="image/gif" sizes="16x16">
		<script>
			function goBack() {
				window.history.back();
			}
			function Validate() {
			
				var usrName = document.forms["accountcreate"]["username"].value;
				var firstName = document.forms["accountcreate"]["fname"].value;
				var lastName = document.forms["accountcreate"]["lname"].value;
				var emailAddr = document.forms["accountcreate"]["email"].value;
				var password = document.forms["accountcreate"]["pass"].value;
				var plength = password.length;
				
				if (usrName == "") {
					alert("I don't think so, pal. Pick a friggin username bud");
					return false;
					}

				if (firstName == "") {
					alert ("What, don't have no first name?");
					return false;
					}
				
				if (lastName == "") {
					alert ("You think you're better than me?! Put in your last name!");
					return false;
					}

				
				if (emailAddr == "") {
					alert ("Email address. Do it, bub.");
					return false;
					}

				if ((emailAddr.includes("@") == false) || (emailAddr.includes(".") == false)) {
					alert ("Dude use a valid email address, dummy");
					return false;
					}

				
				if (password == "") {
					alert ("Friggin everybody's gotta have a password! What's up wit this guy?!");
					return false;
					}

				
				if (plength < 10) {
					alert("NOPE. Too short! Try again pal")
					return false;
					}

				alert (`You did it right, ${usrName}! How'd you like them apples?`);

			}
		</script>
	</head>
	<body>
		<div>
			<h1>OMG Just create your account already!</h1>
			<form class="form-style1" action="" method="post" name="accountcreate" onsubmit="return Validate()">
			Make up a wicked awesome usahname: <input class="form-inputstyle1" type="text" name="username"><br />
			Tell me that first name, bro: <input class="form-inputstyle1" type="text" name="fname"><br />
			And the last name, bucko: <input class="form-inputstyle1" type="text" name="lname"><br />
			Gimme that email dude: <input class="form-inputstyle1" type="text" name="email"><br />
			Friggin do a passwahd, chowdahead: <input class="form-inputstyle1" type="password" name="pass"><br />
			<div class="center-button">
			<input class="button button7" type="submit" name="sca" Value="Create Account" />
			</div>
			</form>
		</div>
		
		<div class="center-button">
		<p><button class="button button5" type="button" onclick="goBack()">Back</button>
		</div>
	</body>
</html>
