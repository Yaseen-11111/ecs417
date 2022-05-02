<?php
include "config.php";

try {
	$pdo = getConnection();
} catch (PDOException $ex) {
	return;
}

if (isset($_POST['add_entry'])) {
	if (!empty($_POST["Title"] || !empty($_POST["Description"]))) {
		$title = $_POST["Title"];
		$description = $_POST["Description"];
		$uname = $_COOKIE["USERNAME"];
		$date = date("d/m/Y");
	} else {
		header('location: index.php');
		return;
	}

	try {
		$stmt = $pdo->prepare("INSERT INTO blogs (Username, Title, Description, Date) VALUES (?, ?, ?, ?)");
		$stmt->execute([$uname, $title, $description, $date]);
		$pdo = null;
		header('location: index.php');
	} catch (PDOException $ex) {
		$pdo = null;
		header('location: index.php');
		return;
	}
}
