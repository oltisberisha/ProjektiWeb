<?php
session_start();
require("database.php");

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
          <a class="a1" href="ContactUs.php">Contact Us</a>
          <a href="Login.php"><button class="logB">Login</button></a>
        </nav>
      </header>

    <div class="wrapper">
      <div class="form-box login">
        <h2>Login</h2>
        <form action="login.php" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
            <input type="email" name="email" placeholder="Email">
          </div>
          <div class="input-box">
            <span class="icon"
              ><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password" name="password" placeholder="Password">
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox" />Remember me</label>
            <a href="#">Forgot Password</a>
          </div>
          <button type="submit" class="btn" value="Login" name="login">Login</button>
          <div class="login-register">
            <p>
              Don't have an account?<a href="signup.php">Register</a
              >
            </p>
          </div>
        </form>
      </div>
      

    <script src="script.js"></script>
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
