<?php


const DB_SERVER = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '*********';
const DB_DATABASE = 'miniproject';

function getConnection(): ?PDO
{
	$host = DB_SERVER; /* Host name */
	$user = DB_USERNAME; /* User */
	$password = DB_PASSWORD; /* Password */
	$dbname = DB_DATABASE; /* Database name */
	try {
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
		$pdo->exec("set names utf8");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	} catch (PDOException $ex) {
		echo "Connection failed" . $ex->getMessage();
		return null;
	}
}
