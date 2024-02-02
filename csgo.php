<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      
      fieldset {
          border: 2px solid #ccc;
          padding: 20px;
          margin: -30px 0 10px 0;
          margin-left: 50px;
          margin-right: 50px;
          margin-bottom: 40px; 
          border: 3px solid #ddd; 
    }
      legend {
          font-weight: bold;
          font-size: 1.2em;
      }
      .fieldset-image {
    width: 50%; 
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: 50px;
    transform: translate(-50%, -75%);
    display: flex;
    box-shadow: 0 0 30px rgba(0,0, 0, 0.5);
    
}   
.banner {
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center; 
}
.content{

width: 100%;
  position: absolute;
  top: 50%;
  transform: translateY(23%);
  text-align: center;
  color: white;
  font-size: 20px;
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

      
<img src="csgo.jpg" alt="Description" class="fieldset-image">
      <div class="banner">
          <div class="content ">
            
            <fieldset>
              
              <legend>Release Notes for December 8, 2023</legend>
              <p>
                  [ GAMEPLAY ]. 
                   Fixed a bug where explicit weapon switches right after grenade throws were delayed slightly  

                  [ MAPS ] Inferno: Fixed a bug where you could plant C4 in planter
              </p>
          </fieldset>
          <fieldset>
            <legend>Release Notes for 12/6/2023</legend>
            <p>
              [ GAMEPLAY ]
              Fixed an issue where the player's shadow would sometimes show the incorrect animation state
              Weapon switching after releasing the fire button(s) will no longer cancel grenade throws (but round restart will)
              Various animation system optimizations
              Various minor bug fixes to demo playback
              
              [ UI ]
              Fixed a bug where starting pistols weren't showing in the Pistols tab of the Equipment view
              Fixed an issue where silencers would not be shown on weapons when held by characters in the UI
              
              [ MAPS ]
              Mirage:
              Fixed a gap under the door at Middle
            </p>
        </fieldset>
        <fieldset>
          <legend>Release Notes for 12/4/2023</legend>
          <p>
            Fixed a bug where grenade throw strength adjustments were sometimes delayed
            Fixed a bug where attempting to switch to a grenade immediately after throwing it would cancel the throw
            You can now get an intermediate strength grenade throw without a delay by pressing primary and secondary attack simultaneously
            Fixed several cases of players sticking while sliding against geometry
            Player pings will now be displayed in the player's color.
          </p>
         </fieldset>
         <fieldset>
          <legend>DECEMBER 1, 2023</legend>
          <p>
            Sub-tick timing improvements to various systems including grenade throw animations and revolver firing
            Added a missing fire effect to molotovs that are held by players.
          </p>
           </fieldset> <footer>
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
          </div>
          
          </div>
          
         
  
    



</body>
</html>