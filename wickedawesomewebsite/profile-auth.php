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
<head><title>You are logged in!</title></head>
<body>
Welcome to the protected profile page…<?php echo $userRow['fname']; ?>

<table><tr>
<td><a href="index.php">Index</a></td>
<?php
if($userRow['role'] == "administrator") {
echo "<td><a href='edit.php'>Edit User Authorization</a></td>";
}
?>
<td><a href="logout.php">Logout</a></td>
</tr>
</table>
</body>
</html>



