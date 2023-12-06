<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Сайт с новостями</title>
</head>
<body>
	<div class="container">
		<h1>Новости</h1>
		<ul>
			<?php
			include('db_connection.php');

			$sql = "SELECT * FROM news ORDER BY publish_date DESC";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<li>";
					echo "<h2>" . $row["title"] . "</h2>";
					echo "<p>" . $row["content"] . "</p>";
					echo "<p class='date'>Дата публикации: " . $row["publish_date"] . "</p>";
					echo "</li>";
				}
			} else {
				echo "<li>Нет новостей</li>";
			}

			$conn->close();
			?>
		</ul>
	</div>
</body>
</html>
