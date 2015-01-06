<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
 <title>Administrator Feedback</title>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <style type="text/css">p {background-color: yellow;}</style>
</head>

<body>

<h2>Administrator feedback</h2>
<h1>STUFF</h1>
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
	echo   '<th>' . "Action" . '</th>';
	echo   '<th>' . "id" . '</th>';
	echo   '<th>' . "Name" . '</th>';
	echo   '<th>' . "Email" . '</th>';
	echo   '<th>' . "Comments" . '</th>';
	echo '</tr>';
    
	while($row = $result->fetch_assoc()) {
		echo "<tr id='row".$row["id"]."'>";
		echo   '<td>' . "<button id='btn".$row["id"]."' value='".$row["id"]."' type='button'>Delete</button>";
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


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="admin.js"></script>

</body>
</html>

