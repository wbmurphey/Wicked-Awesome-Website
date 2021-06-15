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

// Check to see if this user has admin role, send to index if not
if($userRow['role'] != 'administrator') {
	header("Location: index.php");
	exit;
}

// Process submission to make administrator
if ( isset($_POST['adminsubmit']) ) {
	$userID= trim($_POST['userid']);
	
	$query = "update people set role='administrator' where userid=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$userID]);
}

// Process submission to make User
if ( isset($_POST['usersubmit']) ) {
	$userID= trim($_POST['userid']);
	
	$query = "update people set role='user' where userid=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$userID]);
}

// Get list of all users into array to allow editing
$query = "SELECT userid, username, fname, lname, role FROM people";
$stmt = $pdo->prepare($query);
$stmt->execute();
$userArray = $stmt->fetchAll();

?>
<html>
<header>
<title>Break it, I dare you!</title>
<link rel="stylesheet" href="styleboy.css">
<link rel="icon" href="leeloo_icon_128x128.png" type="image/gif" sizes="16x16">
</header>
<h1>All current users</h1>
<?php if (count($userArray) > 0): ?>
	<table>
	  <thead>
		<tr>
		  <th><?php echo implode('</th><th>', array_keys(current($userArray))); ?></th>
		</tr>
	  </thead>
	  <tbody>
		<?php foreach ($userArray as $row): array_map('htmlentities', $row); ?>
			<tr>
				<td><?php echo implode('</td><td style="word-wrap: break-word">', $row); ?></td>
				<td>
					<form name="mkadmin" action="edit.php" method="post" >
						<input type="hidden" name="userid" value="<?php echo $row["userid"] ?>" />
						<input class="form-button1" type="submit" name="adminsubmit" value="Make Admin" />
					</form>
				</td>
				<td>
					<form name="mkuser" action="edit.php" method="post" >
						<input type="hidden" name="userid" value="<?php echo $row["userid"] ?>" />
						<input class="form-button2" type="submit" name="usersubmit" value="Make User" />
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
<?php endif; ?>

<div class="center-button">
<p><button class="button button2" type="button" onclick="document.location='profile.php'">Profile</button></p>
<p><button class="button button3" type="button" onclick="document.location='logout.php'">Logout</button></p>
</div>

</html>


