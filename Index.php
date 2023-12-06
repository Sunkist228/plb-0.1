<?php
include('db_connection.php');

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<ul>";
	while ($row = $result->fetch_assoc()) {
		echo "<li>" . $row["name"] . " - " . $row["email"] . "</li>";
	}
	echo "</ul>";
} else {
	echo "0 results";
}

$conn->close();
?>
