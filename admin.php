<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
	// Если не авторизован, перенаправляем на страницу входа
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Административная панель</title>
</head>

<body>
	<!-- Административная панель -->
	<div class="admin-panel">
		<h2>Панель администратора</h2>

		<!-- Форма добавления новости -->
		<form action="admin_process.php" method="post">
			<label for="title">Заголовок:</label>
			<input type="text" id="title" name="title" required>

			<label for="content">Содержание:</label>
			<textarea id="content" name="content" required></textarea>

			<input type="submit" value="Добавить новость">
		</form>

		<!-- Таблица для просмотра и удаления новостей -->
		<h3>Список новостей</h3>
		<?php
		include('db_connection.php');

		$sql = "SELECT * FROM news ORDER BY publish_date DESC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<table>";
			echo "<tr><th>Заголовок</th><th>Дата публикации</th><th>Действия</th></tr>";

			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td><a href='view_news.php?id=" . $row["id"] . "'>" . $row["title"] . "</a></td>";
				echo "<td>" . $row["publish_date"] . "</td>";
				echo "<td><a href='delete_news.php?id=" . $row["id"] . "'>Удалить</a></td>";
				echo "</tr>";
			}

			echo "</table>";
		} else {
			echo "Нет новостей";
		}

		$conn->close();
		?>
	</div>
</body>

</html>