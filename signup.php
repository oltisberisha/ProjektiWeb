<?php

class UserRegistration {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($username, $email, $password) {
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if (empty($username) || empty($email) || empty($password)) {
            array_push($errors, "All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }
        if (strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 characters long");
        }

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            array_push($errors, "Email already exists!");
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            $sql = "INSERT INTO users(username, email, password) VALUES(?, ?, ?)";
            $stmt = mysqli_stmt_init($this->conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordhash);
                mysqli_stmt_execute($stmt);

            } else {
                die("Something went wrong");
            }
        }
    }
}

session_start();
require("database.php");
require("database1.php");

$userRegistration = new UserRegistration($conn);

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $userRegistration->registerUser($username, $email, $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="login.css">
    <style>
        body {
            background: url(k9nLb2.webp) no-repeat;
            background-size: cover;
        }
        .wrapper .form-box.register {
            position: absolute;
            transition: none;
            transform: translateX(0px);
        }
        .wrapper {
            height: 520px;
        }
    </style>
</head>
<body>
    <header>
        <a href="Home.php"><h2 class="logo">Gaming News-ESPORTS</h2></a>
        <nav class="navigacion">
            <a class="a1" href="Home.php">Home</a>
            <div class="dropdown">
                <a href="" class="dropbtn">Games</a>
                <div class="dropdown-content">
                    <a href="csgo.php">CS2</a>
                    <a href="fortnite.php">Fortnite</a>
                    <a href="gta6.php">Gta VI</a>
                    <a href="dota.php">Dota 2</a>
                    <a href="rocketleague.php">Rocket League</a>
                </div>
            </div>
            <a class="a1" href="aboutUs.php">About Us</a>
            <a href="Login.php"><button class="logB">Login</button></a>
        </nav>
    </header>

    <div class="wrapper">
        <div class="form-box register">
            <h2>Register</h2>
            <form action="signup.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="username" id="username" placeholder="Username">
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" />I agree to the terms & conditioning</label>
                </div>
                <button type="submit" class="btn" name="submit">Register</button>
                <div class="login-register">
                    <p>Already have an account?<a href="Login.php" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- <script src="script.js"></script> -->
    <script
        type="module"
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
        nomodule
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
</body>
</html>
