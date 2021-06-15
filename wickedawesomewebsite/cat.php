<?php
session_start();
require_once 'connect.php';

if(!isset($_SESSION['user'])){
 header("Location: index.php");
 exit;
}
$query = "SELECT * FROM people WHERE userid=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['user']]);
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
	<script>
		function goBack() {
		  window.history.back();
		}
	</script>
	<head>
		<title>Cats</title>
		<link rel="stylesheet" href="styleboy.css">
		<link rel="icon" href="leeloo_icon_128x128.png" type="image/gif" sizes="16x16">
	</head>
	<body>
		<h1>Check out these friggin cats</h1>
		
		<div class="gallery">
		  <a target="_blank" href="korben3.jpg">
			<img src="korben3.jpg" alt="Korben3" width="600" height="400">
		  </a>
		  <div class="desc">Click on this wicked awesome cat!</div>
		</div>

		<div class="gallery">
		  <a target="_blank" href="korben2.jpg">
			<img src="korben2.jpg" alt="Korben2" width="600" height="400">
		  </a>
		  <div class="desc">Click on this wicked awesome cat!</div>
		</div>

		<div class="gallery">
		  <a target="_blank" href="korben4.jpg">
			<img src="korben4.jpg" alt="Korben4" width="600" height="400">
		  </a>
		  <div class="desc">Click on this wicked awesome cat!</div>
		</div>

		<div class="gallery">
		  <a target="_blank" href="leeloo2.jpg">
			<img src="leeloo2.jpg" alt="Leeloo2" width="600" height="400">
		  </a>
		  <div class="desc">Click on this wicked awesome cat!</div>
		</div>
		
		<div class="gallery">
		  <a target="_blank" href="leeloo3.jpg">
			<img src="leeloo3.jpg" alt="Leeloo3" width="600" height="400">
		  </a>
		  <div class="desc">Click on this wicked awesome cat!</div>
		</div>

		<div class="gallery">
		  <a target="_blank" href="bothcats.jpg">
			<img src="bothcats.jpg" alt="Both Cats" width="600" height="400">
		  </a>
		  <div class="desc">Click on these wicked awesome cats!</div>
		</div>
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		
		
		<div class="center-button">
		<p><button class="button button5" type="button" onclick="goBack()">Go Back</button></p>
		</div>
		
	</body>
</html>