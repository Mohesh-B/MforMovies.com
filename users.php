<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:mainpage.php');
}
else{ 
    if ($_SESSION['status'] != "admin") {
        header('mainpage.php');
    }
}

// $list = $_SESSION['list'];
// $total = $_SESSION['total'];
include('connectdb.php');
//Validation
$sql = "SELECT * FROM users order by name"; 
$result = $conn->query($sql);
$list = '';
$total = $result->num_rows;

if($result->num_rows > 0) {
    // output data of each row
     while($row = $result->fetch_assoc()) {
        $list = $list.'
        <div class="row box">
        <div class="col-md-2 box4">
         <img src="default-user.png" alt="user" class="user-profile">
        </div>
        <div class="col-md-6 box5">
            <p> <span style="color: #9a9a9a;">Name: </span> '.$row["name"].'<br>
             <span style="color: #9a9a9a;">Username: </span>'.$row["username"].'<br>
           <span style="color: #9a9a9a;">Email Address: </span>'.$row["email"].'<br>
           <p> <span style="color: #9a9a9a;">Password: </span> '.$row["password"].'
            </p>
        </div>
        <div class="col-md-4 box5">
            <a href="deleteuser.php?id='.$row["userid"].'" class="btn btn-danger"> Delete</a>
            <a href="updateuser.php?id='.$row["userid"].'" class="btn"> Update</a>
        </div>
    </div>            
        ';
    }
    
} else {
    $list = "There is no account created yet";
}

// $_SESSION['list']= $list;
// $_SESSION['total']= $total;


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
                <LI><H3>MforMovies.com</H3></LI>
                <li><a href="userindex.php">Home</a></li>
                <li><a href="browse.php">Browse</a></li>
            </ul>
        </header>
    <div class="container req-box" >
        <form action="" method="post">
            <div class="row">
                <div class="col-md-10 box1" style="margin-left:100px;">
                    <h3 style="margin-bottom:50px;"><span style="font-weight:bold; color: #6AC045">Users List </span>(<?php echo $total ?>)</h3>
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
               <p style="color:black">User Data successfuly Updated :)</p> 
            </div>
        </div>
    </div>
</body>
</html>