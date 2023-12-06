<?php
session_start();

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Имя пользователя и пароль (замените на ваши реальные данные)
	$validUsername = "admin";
	$validPassword = "admin123";

	$enteredUsername = $_POST["username"];
	$enteredPassword = $_POST["password"];

	// Проверяем введенные данные
	if ($enteredUsername == $validUsername && $enteredPassword == $validPassword) {
		// Успешная авторизация
		$_SESSION["authenticated"] = true;
		header("Location: admin.php");
		exit();
	} else {
		// Неверные данные
		header("Location: login.php?error=true");
		exit();
	}
}
?>