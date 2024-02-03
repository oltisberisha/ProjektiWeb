<?php

require('database.php');
require('database1.php');
session_start();

class UserDeleter {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deleteUser($id) {
        $delete = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $delete->bind_param("i", $id);

        if ($delete->execute()) {
            return "User deleted successfully!";
        } else {
            return "Error deleting user: " . $delete->error;
        }

        $delete->close();
    }

    public function deleteNews($id) {
        $delete = $this->conn->prepare("DELETE FROM news WHERE id = ?");
        $delete->bind_param("i", $id);

        if ($delete->execute()) {
            return "News deleted successfully!";
        } else {
            return "Error deleting news: " . $delete->error;
        }

        $delete->close();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleter = new UserDeleter($conn);
    $result = $deleter->deleteUser($id);

    echo $result;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleter = new UserDeleter($conn);
    $result = $deleter->deleteNews($id);

    echo $result;
}

header("Location: dashboard.php");
exit();

?>