<?php
session_start();

require_once "server.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty(trim($_POST["username"]))) {
		$username_err = "Please enter username";
	} else {
		$username = trim($_POST["username"]);
	}

	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter password";
	} else {
		$password = trim($_POST["password"]);
	}

	if (empty($username_err) && empty($password_err)) {
		$sql = "SELECT Username, Password FROM users WHERE Username = ?";

		if ($stmt = mysqli_prepare($link, $sql)) {
			mysqli_stmt_bind_param($stmt, "s", $param_username);

			$param_username = $username;

			if (mysqli_stmt_execute($stmt)) {
				mysqli_stmt_store_result($stmt);


			}

		}
	}
}
