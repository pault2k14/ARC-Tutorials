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

        if(!preg_match("/^[a-zA-z ]+$/", $name)) {
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
        $to = "pbt@pdx.edu";
        $subject = "Form submission";
        $message = $feedback;
        $header = "Reply-To:" . $email;

        $retval = mail ($to, $subject, $message, $header);
            if($retval == true)
            {
                header('Location: http://10.0.0.10/project1/thanks.php');
            }

            else
            {
                echo "message could not be sent.";
            }
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
    Name: <input type="text" name="name" value="<?php echo $name;?>"><br>
    <span class="error"> <?php echo  $nameErr;?> </span>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>"><br>
    <span class="error"> <?php echo $emailErr;?></span>
    Feedback: <textarea rows="4" cols="50" name="feedback"><?php echo $feedback;?></textarea><br>
    <span class="error"> <?php echo $feedbackErr;?> </span>
    <input type="submit">
</form>

</body>
</html>
