<?php

$servername="localhost";
$dbUser="root";
$dbPassword="";
$dbname="register";

$conn=mysqli_connect($servername, $dbUser, $dbPassword, $dbname);
if (!$conn) {
    die("Somthing went wrong");
}

?>
