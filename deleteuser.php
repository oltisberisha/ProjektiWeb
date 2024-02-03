<?php
require('database.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM users WHERE id = ?");
    $delete->bind_param("i", $id);

    if ($delete->execute()) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . $delete->error;
    }

    $delete->close();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM news WHERE id = ?");
    $delete->bind_param("i", $id);

    if ($delete->execute()) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . $delete->error;
    }

    $delete->close();
}
header("Location: dashboard.php");
exit();
?>