<html>
<body>
<?php
function sortList($sort) {
	include "config.php";
	try {
		$pdo = getConnection();
	} catch (PDOException) {
		return;
	}
	switch ($sort) {
		case "a_date ": $sort = "Date asc";
		break;
		case "d_date": $sort = "Date desc";
		break;
		case "a_a": $sort = "Title asc";
		break;
		case "d_a": $sort = "Title desc";
		break;
	}
	$stmt = $pdo->prepare("SELECT *  FROM blogs ORDER BY $sort");
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
}
?>
</body>
</html>


