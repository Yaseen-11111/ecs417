<html>
<body>
<?php
include "config.php";
try {
	$pdo = getConnection();
} catch (PDOException $ex) {
	return;
}
$stmt = $pdo->prepare("SELECT * FROM blogs");
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
