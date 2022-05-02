<html lang="en">
<body>
<?php
include "config.php";
try {
	$pdo = getConnection();
} catch (PDOException) {
	return;
}

$column = "Date";
$order = "asc";

if (isset($_GET['column']) || isset($_GET['order'])) {
	$column = $_GET['column'];
	$order = $_GET['order'];
}

$stmt = $pdo->prepare("SELECT *  FROM blogs ORDER BY $column $order");
$stmt->execute();
$pdo = null;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo "<section class='blog-card'>";
	echo 	"<header>";
	echo 		"<h3>{$row['Title']}</h3>";
	echo 		"<a>{$row['Username']}</a><br><br>";
	echo 		"<a>{$row['Date']}</a>";
	echo 	"</header><hr>";
	echo 	"<section class='content'>";
	echo  		"<p>{$row['Description']}
				</p>";
	echo 	"</section>";
	echo "</section>";
}
?>
</body>
</html>


