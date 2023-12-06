<?php
include('db_connection.php');

if (isset($_GET['id'])) {
	$newsId = $_GET['id'];

	// Подтверждение удаления новости
	echo "<h2>Вы уверены, что хотите удалить новость?</h2>";
	echo "<p><a href='admin_process.php?action=delete&id=$newsId'>Да, удалить</a></p>";
	echo "<p><a href='admin.php'>Нет, вернуться к списку новостей</a></p>";
} else {
	echo "Неверный запрос.";
}

$conn->close();
?>