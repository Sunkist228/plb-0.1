<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Просмотр новости</title>
</head>

<body>
	<!-- Просмотр новости -->
	<div class="admin-panel">
		<h2>Просмотр новости</h2>

		<?php
		include('db_connection.php');

		if (isset($_GET['id'])) {
			$newsId = $_GET['id'];
			$sql = "SELECT * FROM news WHERE id = $newsId";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<h3>" . $row['title'] . "</h3>";
				echo "<p class='date'>Дата публикации: " . $row['publish_date'] . "</p>";
				echo "<p>" . $row['content'] . "</p>";
			} else {
				echo "Новость не найдена.";
			}
		} else {
			echo "Неверный запрос.";
		}

		$conn->close();
		?>

		<a href="admin.php">Назад к списку новостей</a>
	</div>
</body>

</html>