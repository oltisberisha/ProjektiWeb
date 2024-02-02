<?php

session_start();
require("database.php");
$query = "SELECT * FROM users";
$result0 = mysqli_query($conn, $query);

$query2 = "SELECT * FROM comentet";
$result1 = mysqli_query($conn, $query2);



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="icon" type="image/x-icon" href="res/android-chrome-192x192.png">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <div id="topnav">
            <header class="title"><h2>Dashboard</h2></header>
            <div id="profile">
                <div id="pfp-container"></div>
                <h3 class="username">Admin</h3>
                <button id="edit-profile">edit</button>
            </div>
            <div id="navigation">
                <ul class="nav-list">
                    <li id="nav-1" class="nav-item"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#86A789" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>Home</a></li>
                    <li id="nav-2" class="nav-item"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#86A789" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>Tasks</a></li>
                    <li id="nav-3" class="nav-item"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#86A789" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>History</a></li>
                    <li id="nav-4" class="nav-item"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#86A789" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>Settings</a></li>
                </ul>
            </div>
        </div>
        <div id="theme">PlaceHolder</div>
    </nav>
    <main>
        <header id="mainHeader">
            <h1>Home</h1>
            <div id="searchbar"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="search" id="search">
            </div>
            <div id="upload">
                <button id="upload-btn" class="primaryBtn">Upload</button>
                <button id="New" class="secondaryBtn"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#393E46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></button>
                <button id="share" class="secondaryBtn"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#393E46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg></button>
            </div>
        </header>
        <div class="userstable">
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
        <div id="announcements" class="card">
            <div class="cardHeader">
                <h3>Announcements</h3>
            </div>
            <ul class="cardList">
                <li id="announcement-1" class="cardItem typeTwo">New Restaurant Page Project</li>
                <li id="announcement-2" class="cardItem typeTwo">JavaScript course 25% done</li>
                <li id="announcement-3" class="cardItem typeTwo">Good news On the way</li>
                <li id="announcement-4" class="cardItem typeTwo">Trust the Process</li>
            </ul>
        </div>
        <div class="comments">
                <table class="ut">
                    <tr>
                        <th colspan="5"><h2>Users</h2></th>
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
    </main>
</body>
</html>
