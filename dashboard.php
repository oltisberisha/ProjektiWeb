<?php

session_start();
require("database.php");
require("database1.php");

class DataFetcher {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function fetchUsers() {
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function fetchComments() {
        $query = "SELECT * FROM comentet";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function fetchNews() {
        $query = "SELECT * FROM news";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }
}

$dataFetcher = new DataFetcher($conn);

$result0 = $dataFetcher->fetchUsers();
$result1 = $dataFetcher->fetchComments();
$result2 = $dataFetcher->fetchNews();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dashboardi.css">

    <title>Document</title>
    <style>
        
        main{
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
<header>
        <a href="Home.php"><h2 class="logo">Dashboard</h2></a>
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
          
         
        </nav>
      </header>
      <main>
    
    <div class="users">
    <table class="ut">
                    <tr>
                        <th colspan="5"><h2>Users</h2></th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                    <?php while ($rows = mysqli_fetch_assoc($result0)) { ?>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['username']; ?></td>
                            <td><?php echo $rows['email']; ?></td>
                            <td><a href='deleteuser.php?id=<?php echo $rows['id']; ?>'>Delete</a></td>
                        </tr>
                    <?php } ?>
                </table> 
            </div>
    <div class="coments">
                <table class="ut">
                    <tr>
                        <th colspan="5"><h2>Komentet</h2></th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Emri</th>
                        <th>Email</th>
                        <th>Komenti</th>
                    </tr>
                    <?php while ($rows2 = mysqli_fetch_assoc($result1)) { ?>
                        <tr>
                            <td><?php echo $rows2['id']; ?></td>
                            <td><?php echo $rows2['emri']; ?></td>
                            <td><?php echo $rows2['email']; ?></td>
                            <td><?php echo $rows2['comment']; ?></td>
                        </tr>
                    <?php } ?>
                </table> 
            </div>
    <div class="users">
                <table class="ut">
                    <tr>
                        <th colspan="3"><h2>lajmet</h2></th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Loja</th>
                        <th>Edit</th>

                        
                        
                    </tr>
                    <?php while ($rows3 = mysqli_fetch_assoc($result2)) { ?>
    <tr>
        <td><?php echo $rows3['id']; ?></td>
        <td><?php echo $rows3['loja']; ?></td>
        <td><a href='edit_news.php?id=<?php echo $rows3['id']; ?>'>Edit</a></td>
    </tr>
<?php } ?>
                </table> 
            </div>
            <div style="clear: both;"></div>
        

   
</body>
</html>