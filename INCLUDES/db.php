<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id = $_SESSION['uid'];
$getUser = mysqli_query($conn,"SELECT * FROM `users` WHERE `id` = '$user_id'");
$thisuser = mysqli_fetch_assoc($getUser);
$msg = "";
?>