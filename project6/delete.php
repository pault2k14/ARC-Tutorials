<html>
<body>

<?php 
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

$id_num = $_POST["id"];

// sql to delete a record
$sql = "DELETE FROM feedback WHERE id=$id_num";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>



</body>
</html>