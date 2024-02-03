<?php

class LoginController
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function loginUser($email, $password)
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            if (password_verify($password, $user["password"])) {
                $_SESSION['email'] = $email;
                header("Location: home.php");
                die();
            } else {
                echo "<div>Password does not match!</div>";
            }
        } else {
            echo "<div>Email does not exist!</div>";
        }

        $stmt->close();
    }

    public function closeConnections()
    {
        $this->db->closeConnection();
    }
}

?>
