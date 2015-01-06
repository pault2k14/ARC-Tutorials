<html>
<body>

<h2>Administrator feedback</h2>

<?php
session_start();
print_r("You are logged in as: " . $_SESSION['username']);
echo '<br><br>';

$servername = "localhost";
$username = "root";
$password = "vagrant";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, comments FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo '<table>';
	echo '<tr>';
	echo   '<th>' . "id" . '</th>';
	echo   '<th>' . "Name" . '</th>';
	echo   '<th>' . "Email" . '</th>';
	echo   '<th>' . "Comments" . '</th>';
	echo '</tr>';
    
	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo   '<td>' . $row["id"] . '</td>';
		echo   '<td>' . $row["name"] . '</td>';
		echo   '<td>' . $row["email"] . '</td>';
		echo   '<td>' . $row["comments"] . '</td>';	
		echo '</tr>';
	}
	
	echo '</table>';
} else {
    echo "0 results";
}
$conn->close();
?> 

</body>
</html>

