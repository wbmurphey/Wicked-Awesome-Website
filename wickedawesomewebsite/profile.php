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

<html>
<head><title>You did it!</title></head>
<link rel="stylesheet" href="styleboy.css">
<link rel="icon" href="leeloo_icon_128x128.png" type="image/gif" sizes="16x16">
<body>
<h1>Welcome to the friggin best profile evah <?php echo $userRow['fname']; ?></h1>

<div class="center-button">
<p><button class="button button1" type="button" onclick="document.location='cat.php'">Check out these wicked awesome cats!</button></p>
</div>

<p><?php
if($userRow['role'] == "administrator") {
echo "<div class=\"center-button\"><p><button class=\"button button2\" type=\"button\" onclick=\"document.location='edit.php'\">Edit Users Broh (don't mess it up)</button></p></div>";
}
?>
</p>

<div class="center-button">
<p><button class="button button3" type="button" onclick="document.location='logout.php'">What, can't handle it? Logout, ya dummy!</button></p>
</div>

</body>
</html>
