<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:mainpage.php');
}
else{ 
    if ($_SESSION['status'] == "admin") {
        header('mainpage.php');
    }
}
include('connectdb.php');
$username=$_SESSION['username'];
$sql = "SELECT * FROM movies where movie_id in(select movie_id from favorites where username='$username')"; 
$result = $conn->query($sql);
$list = '';
$total = $result->num_rows;

if($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $sql2="SELECT * from director where director_id='$row[director_id]'";
        $dirname=mysqli_query($conn,$sql2,);
        $row2=mysqli_fetch_assoc($dirname);
        $pos=$row["poster"];
        $list = $list.'
        <div class="row box">
        <div class="col-md-2 box4">
         <img src="'.$row["poster"].'" alt="user" class="user-profile" style="border-radius:0%;height:9.5rem;">
        </div>
        <div class="col-md-6 box5">
            <p> <span style="color: #9a9a9a;">Movie Id: </span> '.$row["movie_id"].'<br>
             <span style="color: #9a9a9a;">Movie Name: </span>'.$row["movie_name"].'<br>
           <span style="color: #9a9a9a;"> Genre: </span>'.$row["genre"].'<br>
            <span style="color: #9a9a9a;">Industry: </span> '.$row["industry"].'<br>
            <span style="color: #9a9a9a;">Director: </span> '.@$row2["director_name"].'
            </p>
        </div>
        <div class="col-md-4 box5">
            <a href="deletefavorites.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
        </div>
    </div>            
        ';
    }
    
} else {
    $list = "There is no movies added  yet";
}


$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="index.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <link rel=" stylesheet " href="bootstrap.min.css ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="mr.css">

    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
  li img,li h3
    {
      color:#FADCD9;
      font-size:32px;
      white-space: nowrap;
      float:left;
      border-radius:50%;
      width:100px;
    }
    header
  {
      position: sticky;
      height:100px;
  }
    li a {
      float:right;
      font-weight: bold;
      font-size :20px;
      display: block;
      color:goldenrod;
      text-align: center;
      padding: 16px;
      text-decoration: none;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: rgba(7, 58, 145, 0.0);
     
  }
  li a:hover {
      height:100px;;
      background-color:rgba(3, 3, 74, 0.822);
    }
</style>
<header>
            <ul>
                <li><img id="logo" src="logo (2).png"></li>
                <LI><h3>MforMovies.com</h3></LI>
                <li><a href="userindex.php">Home</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </header>
    <div class="container req-box" >
        <form action="" method="post">
            <div class="row">
                <div class="col-md-10 box1" style="margin-left:100px;">
                    <h3 style="margin-bottom:50px;"><span style="font-weight:bold; color: #6AC045">Favorites List </span>(<?php echo $total ?>)</h3>
                    <?php 
                    echo $list;
                    ?>
                </div>
            </div>   
        </form>
    </div>
    <div id="updatesuccess" class="popup-overlay">
        <div class="log-popup">
            <h2>Success</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
               <p style="color:black">Movie Data successfuly Updated :)</p> 
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>