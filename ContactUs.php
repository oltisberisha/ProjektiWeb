<?php
session_start();
require("Database.php");

class CommentSubmission {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function submitComment($name, $email, $message) {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $sql = "INSERT INTO comentet(emri, email, comment) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);
            $stmt->execute();

            echo "Comment submitted successfully!";
            $stmt->close();
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
}

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $commentSubmission = new CommentSubmission($conn);
    $commentSubmission->submitComment($name, $email, $message);
}

$db->closeConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CSstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <section>
        <form action="#" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </section>

    <footer>
    <div class="footer-container">
      <div class="socialIcons">
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-twitter"></i></a>
        <a href=""><i class="fa-brands fa-google-plus"></i></a>
        <a href=""><i class="fa-brands fa-youtube"></i></a>
      </div>
      <div class="footerNav">
        <ul>
          <li ><a href="Home.html">Home</a></li>
          <li><a href="aboutUs.html">About Us</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Our Team</a></li>

        </ul>
      </div>
      <div class="footerBottom">
        <p>Copyright &copy;2023; Designed by Oltis B. & Lend Sh.</p>
      </div>
    </div>
  </footer>



      
</body>
</html>
