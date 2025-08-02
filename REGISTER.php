<?php

    session_start();

    if (isset($_SESSION['uid'])==true) {
        header('Location: LOGIN.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTER | SmartApply Hub </title>
    <!-- Bootstrap and custom CSS links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="imgs/LOGO.ico" type="image/x-icon">
    <!-- jQuery and Bootstrap JS links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- PHP logic -->
    <?php
        // Variables and error variables initialization
        $email = $password = $contact = $name = "";
        $erroremail = $errorpassword = $errorcontact = $errorname = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["txtname"])) {
                $errorname = "* name is required";
            } else {
                $name = test_input($_POST["txtname"]);
                // Additional validation can be added here
            }

            if (empty($_POST["txtemail"])) {
                $erroremail = "* Email is required";
            } else {
                $email = test_input($_POST["txtemail"]);
                // Validate email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erroremail = "* Invalid email format";
                }
            }

            if (empty($_POST["txtpassword"])) {
                $errorpassword = "* Password is required";
            } else {
                $password = test_input($_POST["txtpassword"]);
                // Check if password length is at least 8 characters
                if (strlen($password) < 8) {
                    $errorpassword = "* Password must be at least 8 characters";
                }
            }

            if (empty($_POST["txtcontact"])) {
                $errorcontact = "* Contact number is required";
            } else {
                $contact = test_input($_POST["txtcontact"]);
                // Additional validation can be added here (like checking if it's a number)
            }

        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = ""; // Change this to your database password
        $dbname = ""; // Change this to your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn-signup"])) {
            if ($errorname == "" && $erroremail == "" && $errorpassword == "" && $errorcontact == "") {
                // Prepare and bind
                $password = test_input($_POST["txtpassword"]);
                $password1 = md5($password);
                $stmt = $conn->prepare("INSERT INTO users (name, email, password, contact) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss",  $name, $email, $password1, $contact);

                // Execute the query
                if ($stmt->execute()) {
                    echo "New record created successfully";
                    header('location:LOGIN.php');

                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            }
        }

        // Close the connection
        $conn->close();
    ?>

    <!-- Registration form structure matching the image design -->
<body>
    <div class="container">
        <div class="form-container">
            <h2>SMARTAPPLYHUB </h2>
            <p style="font-size: 18px; text-align: center;"><u>REGISTER</u></p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="txtname" placeholder="Full Name">
                    <span class="error"><?php echo $errorname; ?></span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="txtemail" placeholder="Email">
                    <span class="error"><?php echo $erroremail; ?></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="txtpassword" placeholder="Password">
                    <span class="error"><?php echo $errorpassword; ?></span>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" id="contact" name="txtcontact" placeholder="Contact Number">
                    <span class="error"><?php echo $errorcontact; ?></span>
                </div>                
                <button type="submit" class="btn btn-primary" name="btn-signup">Sign Up</button>
            </form>
            <br>
            <p style="font-size: 15px;">Already have an account? <a href="LOGIN.php">Sign In</a></p>
        </div>
    </div>
</body>
</html>