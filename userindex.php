<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:mainpage.php');
}
else{ 
    if ($_SESSION['status'] == "admin") {
        header('location:adminindex.php');
    }
}


?>

<html>
    <head>
        <style>
            header{
              font-family: "Audiowide", sans-serif;
            }
        </style>
        <meta charset="utf-8">
        <Title>UserPage</Title>
        <link rel="stylesheet" href="mainpage.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
        <link rel="stylesheet" href="popup.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
        <header>
            <ul>
                <li><img id="logo" src="logo (2).png"></li>
                <LI><h3>MforMovies.com</h3></LI>
                <li><a href="userindex.php">Home</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href=logout.php>logout</a></li>
            </ul>
        </header>

        <div class="sec2">
        <img src="background.jpg">
        </div>
        <div class="content">
                <h1>
                    Millions Of Movies,<br>Find Your Favorites
                </h1>
                <h2>Welcome <span style="color:red; text-transform:lowercase;"><?php echo $_SESSION['username'] ?></span></h2>
                <button type="button" class="glow-on-hover" onclick="location.href='favoritesdisplay.php';">Favorites</button>
                <button type="button" class="glow-on-hover" onclick="location.href='watchdisplay.php';">To watch</button>
                <button type="button" class="glow-on-hover" onclick="location.href='watcheddisplay.php';">Watched</button>
        </div>

    
        </body>
        </html>