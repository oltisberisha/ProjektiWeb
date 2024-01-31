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
          <a href="Login.php"><button class="logB">Login</button></a>
        </nav>
      </header>

    <div class="wrapper">
      <div class="form-box login" onsubmit="return validateLoginForm()">
        <h2>Login</h2>
        <?php
        print_r($_POST)
        
        ?>
        <form action="login.php" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
            <input type="email" name="email" placeholder="Email">
            <!-- <label>Email</label> -->
          </div>
          <div class="input-box">
            <span class="icon"
              ><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password" name="password" placeholder="Password">
            <!-- <label>Password</label> -->
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox" />Remember me</label>
            <a href="#">Forgot Password</a>
          </div>
          <button type="submit" class="btn">Login</button>
          <div class="login-register">
            <p>
              Don't have an account?<a href="#" class="register-link"
                >Register</a
              >
            </p>
          </div>
        </form>
      </div>

      <div class="form-box register"  onsubmit="return validateForm()">
        <h2>Register</h2>
        <?php
        print_r($_POST)
        
        ?>
        <form action="#">
          <div class="input-box">
            <span class="icon"
              ><ion-icon name="person-outline"></ion-icon
            ></span>
            <input type="text" name="Username" placeholder="Username">
            
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
            <input type="email" name="Email" placeholder="Email">
            
          </div>
          <div class="input-box">
            <span class="icon"
              ><ion-icon name="lock-closed-outline"></ion-icon
            ></span>
            <input type="password" name="Password" placeholder="Password"/>
            
          </div>
          <div class="remember-forgot">
            <label
              ><input type="checkbox" />I agree to the terms &
              condicioning</label
            >
          </div>
          <button type="submit" class="btn">Register</button>
          <div class="login-register">
            <p>
              Already have an account?<a href="#" class="login-link">Login</a>
            </p>
          </div>
        </form>
      </div>
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