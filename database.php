<?php

class Database
{
    private $conn;

    public function __construct()
    {
        $servername="localhost";
        $dbUser="root";
        $dbPassword=""; 
        $dbname="register";


        $this->conn = new mysqli($servername, $dbUser, $dbPassword, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}

?>
