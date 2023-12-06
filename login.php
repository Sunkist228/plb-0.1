<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Вход в административную панель</title>
</head>

<body>
	<div class="login-container">
		<h2>Вход в административную панель</h2>
		<form action="auth.php" method="post">
			<label for="username">Имя пользователя:</label>
			<input type="text" id="username" name="username" required>

			<label for="password">Пароль:</label>
			<input type="password" id="password" name="password" required>

			<input type="submit" value="Войти">
		</form>
	</div>
</body>

</html>