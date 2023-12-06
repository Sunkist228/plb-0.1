<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Сайт с базой данных</title>
</head>

<body>
	<div class="container">
		<h1>Пользователи</h1>
		<ul>
			<?php
			include('db_connection.php');

			$sql = "SELECT * FROM users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<li>" . $row["name"] . " - " . $row["email"] . "</li>";
				}
			} else {
				echo "<li>Нет пользователей</li>";
			}

			$conn->close();
			?>
		</ul>
	</div>
</body>

</html>