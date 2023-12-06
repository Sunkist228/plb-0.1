<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Остальные мета-теги и стили -->
</head>
<body>
    <div class="header">
        <!-- Остальной код заголовка -->
    </div>

    <div class="container">
        <h1>Новости</h1>
        <ul>
            <?php
            include('db_connection.php');

            $sql = "SELECT * FROM news ORDER BY publish_date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>";
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "<p class='date'>Дата публикации: " . date('d.m.Y H:i:s', strtotime($row["publish_date"])) . "</p>"; // Добавлено отображение времени
                    echo "</li>";
                }
            } else {
                echo "<li>Нет новостей</li>";
            }

            $conn->close();
            ?>
        </ul>
    </div>

    <footer>
        <!-- Остальной код футера -->
    </footer>
</body>
</html>
