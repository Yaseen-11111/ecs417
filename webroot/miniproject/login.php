<?php
// Check connection
include "config.php";
try {
	$pdo = getConnection();
} catch (PDOException $ex) {
	echo "Error connecting to server";
	header('location: login.html');
	return;
}

if(isset($_POST['login'])){
	if (!empty($_POST["Username"]) || !empty($_POST["Password"])) {
		$uname = $_POST['Username'];
		$password = $_POST['Password'];
	} else {
		return;
	}
	try {
		$stmt = $pdo->prepare("SELECT Username, Password FROM users WHERE Username = ?");
		$stmt->bindParam("Username", $uname);
		$stmt->bindParam("Password", $password);
		$stmt->execute([$uname]);
	} catch (PDOException $ex) {
		$pdo = null;
		return;
	}
	$count = $stmt->rowCount();

	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($count) {
		$pass = $data['Password'];
		if ($password === $pass) {
			$session_key = uniqid();
			try {
				$stmt = $pdo->prepare("UPDATE users SET SessionKey = ? WHERE Username = ?");
				$stmt->execute([$session_key, $uname]);
				$pdo = null;
			} catch (PDOException $ex) {
				$pdo = null;
				return;
			}

			setcookie('SESSION_KEY',$session_key, time()+3600); //expires in an hour
			setcookie('USERNAME', $data['Username'], time()+3600); //expires in an hour
		} else {
			$pdo = null;
			echo "Username or password incorrect";
			return;
		}
		header('location: index.php');

	} else {
		$pdo = null;
		echo "Username or password incorrect";
	}
	return;
}
