<?php
include "config.php";
try {
	$pdo = getConnection();
} catch (PDOException $ex) {
	echo "Error connecting to server";
	header('location: index.php');
	return;
}

$uname = $_COOKIE['USERNAME'];

$stmt = $pdo->prepare("UPDATE users SET SessionKey = 0 WHERE Username = ?");
$stmt->execute([$uname]);
setcookie('SESSION_KEY', null);
setcookie('USERNAME', null);
echo "<script>alert('Logged out!')</script>";
header('location: index.php');


