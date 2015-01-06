<html>
<body>



<?php

$nameErr = $emailErr = $feedbackErr = "";
$name = $email = $feedback = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "* Name is required<br>";
    }
    else {
        $name = test_input($_POST["name"]);

        if(!preg_match("/^[a-zA-z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "* Email is required<br>";
    }
    else {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["feedback"])) {
        $feedbackErr = "* Feedback is required<br>";
    }
    else {
        $feedback = test_input($_POST["feedback"]);

        if(!preg_match("/^[a-zA-z ]*$/", $feedback)) {
            $FeedbackErr = "Only letters and white space allowed";
        }
    }

    if ($nameErr == "" && $emailErr == "" && $feedbackErr == "") {
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

		$safe_name = mysqli_real_escape_string($name);
		$sql = "INSERT INTO feedback (name, email, comments) 
		VALUES ('$safe_name', '$email', '$feedback')";

		if ($conn->query($sql) === TRUE) {
			header('Location: http://10.0.0.10/project2/thanks.php');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo ($_POST["name"]);?>"><br>
    <span class="error"> <?php echo  $nameErr;?> </span>
    E-mail: <input type="text" name="email" value="<?php echo ($_POST["email"]);?>"><br>
    <span class="error"> <?php echo $emailErr;?></span>
    Feedback: <textarea rows="4" cols="50" name="feedback"><?php echo ($_POST["feedback"]);?></textarea><br>
    <span class="error"> <?php echo $feedbackErr;?> </span>
    <input type="submit">
</form>

</body>
</html>
