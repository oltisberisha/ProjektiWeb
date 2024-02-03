<?php

$servername="localhost";
$dbUser="root";
$dbPassword="";
$dbname="register";

$conn=mysqli_connect($servername, $dbUser, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getUserByEmail($email) {
    global $conn;

    $email = $conn->real_escape_string($email);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}
?>
