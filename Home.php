<?php
session_start();
require("Database.php"); 

class SliderManager
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getSliderData()
    {
        $query = "SELECT * FROM slider";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }
}

class UserManager
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function isAdmin()
    {
        if (isset($_SESSION['email'])) {
            $user_email = $_SESSION['email'];
            return ($user_email == 'admin@ubt.com');
        } else {
            return false;
        }
    }
}


$database = new Database();
$conn = $database->getConnection();

$sliderManager = new SliderManager($conn);
$slider = $sliderManager->getSliderData();

$userManager = new UserManager($conn);
$is_admin = $userManager->isAdmin();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
     @media screen and (max-width: 768px) {
      header {
        padding: 10px;
      }

      .logo {
        font-size: 1.2em;
      }

      .a1 {
        margin-left: 5px;
      }

      .dropdown-content {
        min-width: 150px;
      }}</style>
  </head>
  <body>
  <header>
        <a href="Home.php"><h2 class="logo">Gaming News-ESPORTS</h2></a>
        <nav class="navigacion">
        <?php

        if ($is_admin) {
            echo '<a class="a1" href="dashboard.php">Dashboard</a>';
        }
        ?>
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
    <main>
    <div class="m">
      <div class="paragrafi">
      <p>
        "Stay ahead with the latest gaming news. Your source for updates, reviews, and all things gaming."
      </p>
      
      
    </div>
    <div class="slider">
      <div class="slides">

        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <input type="radio" name="radio-btn" id="radio5">



        <div class="slide first">
              <img src="<?php echo $slider['foto1']; ?>" alt="foto">
        </div>
        <div class="slide">
              <img src="<?php echo $slider['foto2']; ?>" alt="">
        </div>
        <div class="slide">
          <img src="<?php echo $slider['foto3']; ?>" alt="">
        </div>
        <div class="slide">
            <img src="<?php echo $slider['foto4']; ?>" alt="">
        </div>
        <div class="slide">
          <img src="<?php echo $slider['foto5']; ?>" alt="">
      </div>

        <div class="navigation-auto">
            <div class="auto-bt1"></div>
            <div class="auto-bt2"></div>
            <div class="auto-bt3"></div>
            <div class="auto-bt4"></div>
        </div>


      </div> 

    </div>
    
    
    
    
  
  </div>



  <div class="youtube-section">
    <div class="youtube-box">
        <iframe width="100%" height="315"
            src="https://www.youtube.com/embed/Vp0EvTPxvtc" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        <a href="https://www.youtube.com/watch?v=Vp0EvTPxvtc" target="_blank">Watch CS:GO Highlights on YouTube</a>
    </div>

    
    <div class="youtube-box">
        <iframe width="100%" height="315"
            src="https://www.youtube.com/embed/Rc92Gi4FwPY" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        <a href="https://www.youtube.com/watch?v=Rc92Gi4FwPY" target="_blank">Watch Dota 2 Highlights on YouTube</a>
    </div>

    
    <div class="youtube-box">
        <iframe width="100%" height="315"
            src="https://www.youtube.com/embed/QdBZY2fkU-0" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        <a href="https://www.youtube.com/watch?v=QdBZY2fkU-0" target="_blank">Watch GTA VI Highlights on YouTube</a>
    </div>

   
    <div class="youtube-box">
        <iframe width="100%" height="315"
            src="https://www.youtube.com/embed/Uy_hS8TDeMI" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        <a href="https://www.youtube.com/watch?v=Uy_hS8TDeMI" target="_blank">Watch Fortnite Highlights on YouTube</a>
    </div>

    
    <div class="youtube-box">
        <iframe width="100%" height="315"
            src="https://www.youtube.com/embed/jWraTbrf_kY" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        <a href="https://www.youtube.com/watch?v=jWraTbrf_kY" target="_blank">Watch Rocket League Highlights on YouTube</a>
    </div>
</div>



</div>

  </div>  
</main>
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

    <script type="text/javascript">
      var counter = 1;
      setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if(counter > 5){
                  counter = 1;
            }
      }, 3000);
</script>

  </body>
</html>
