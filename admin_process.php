<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Добавление новости
	if (isset($_POST["title"]) && isset($_POST["content"])) {
		$title = $_POST["title"];
		$content = $_POST["content"];

		$sql = "INSERT INTO news (title, content, publish_date) VALUES ('$title', '$content', NOW())";

		if ($conn->query($sql) === TRUE) {
			header("Location: admin.php");
			exit();
		} else {
			echo "Ошибка: " . $sql . "<br>" . $conn->error;
		}
	}
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action'])) {
	// Удаление новости
	if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
		$newsId = $_GET['id'];
		$sql = "DELETE FROM news WHERE id = $newsId";

		if ($conn->query($sql) === TRUE) {
			header("Location: admin.php");
			exit();
		} else {
			echo "Ошибка при удалении новости: " . $conn->error;
		}
	}
}

$conn->close();
?>