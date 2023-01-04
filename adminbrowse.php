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
include('connectdb.php');
if (isset($_POST["submit"]))
{
    $cat=$_POST["cat"];
    if($cat=="Title")
    {
        $str = $_POST["search"];
        $sql = "SELECT * FROM movies WHERE movie_name like '%$str%'";
        $result = $conn->query($sql);
        $list = '';
        $total = $result->num_rows;
        
        if($result->num_rows > 0) {
            // output data of each row
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
                    <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
                    <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
                </div>
            </div>            ';
             }
            }
    }
    else if($cat=="Topmovies")
    {
        $str = $_POST["search"];
        $sql = " SELECT movies.movie_id,movies.movie_name,movies.genre,movies.industry,movies.prod_id,movies.director_id,movies.actor_id,movies.music_dir_id,movies.date_of_release,movies.poster from movies inner join ratings on movies.movie_id=ratings.rating_id order by ratings.movie_rating desc limit 10;";
        $result = $conn->query($sql);
        $list = '';
        $total = $result->num_rows;
        
        if($result->num_rows > 0) {
            // output data of each row
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
                <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
                <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
                </div>
            </div>            ';
             }
            }
    }
    else if($cat=="Genre")
    {
        $str = $_POST["search"];
        $sql = "SELECT * FROM movies WHERE genre like '%$str%'";
        $result = $conn->query($sql);
        $list = '';
        $total = $result->num_rows;
        
        if($result->num_rows > 0) {
            // output data of each row
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
                    <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
                    <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
                </div>
            </div>            ';
             }
            }
    }
    else if($cat=="Industry")
    {
        $str = $_POST["search"];
        $sql = "SELECT * FROM movies WHERE industry like '%$str%'";
        $result = $conn->query($sql);
        $list = '';
        $total = $result->num_rows;
        
        if($result->num_rows > 0) {
            // output data of each row
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
                    <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
                    <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
                </div>
            </div>            ';
             }
            }
    }
    else if($cat=="Actors")
    {
        $str = $_POST["search"];
        $sql = " SELECT * FROM movies WHERE actor_id in (SELECT actor_id FROM actor WHERE actor_name like '%$str%')";
        $result = $conn->query($sql);
        $list = '';
        $total = $result->num_rows;
        
        if($result->num_rows > 0) {
            // output data of each row
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
                    <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
                    <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
                </div>
            </div>            ';
             }
            }
    }
    else if($cat=="Directors")
    {
        $str = $_POST["search"];
        $sql = " SELECT * FROM movies WHERE director_id in (SELECT director_id FROM director WHERE director_name like '%$str%')";
        $result = $conn->query($sql);
        $list = '';
        $total = $result->num_rows;
        
        if($result->num_rows > 0) {
            // output data of each row
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
                    <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
                    <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
                </div>
            </div>            ';
             }
            }
    }
    else if($cat=="Blockbuster")
    {
        $str = $_POST["search"];
        $sql="SELECT * from movies where movie_id in (select collections.movie_id from collections inner join expenses on collections.movie_id=expenses.movie_id where collections.total_collection-expenses.total_expense >1000000000) and movie_name like '%$str%'";
        $result = $conn->query($sql);
        $list = '';
        $total = $result->num_rows;
        
        if($result->num_rows > 0) {
            // output data of each row
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
                    <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
                    <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
                </div>
            </div>            ';
             }
            }
    }

    else if($cat=="Music Directors")
    {
        $str = $_POST["search"];
        $sql = " SELECT * FROM movies WHERE music_dir_id in (SELECT music_dir_id FROM music_director WHERE md_name like '%$str%')";
        $result = $conn->query($sql);
        $list = '';
        $total = $result->num_rows;
        
        if($result->num_rows > 0) {
            // output data of each row
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
                    <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
                    <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
                </div>
            </div>            ';
             }
            }
    }
    }



else
{
$sql = "SELECT * FROM movies order by movie_name"; 
$result = $conn->query($sql);
$list = '';
$total = $result->num_rows;

if($result->num_rows > 0) {
    // output data of each row
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
            <a href="deletemovie2.php?id='.$row["movie_id"].'" class="btn btn-danger"> Delete</a>
            <a href="updatemovies1.php?id='.$row["movie_id"].'" class="btn"> Update</a>
        </div>
    </div>            
        ';
    }
    
} else {
    $list = "There is no account created yet";
}
}

$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Browse</title>

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="search.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <link rel=" stylesheet " href="bootstrap.min.css ">

    <link rel="stylesheet" href="mr.css">

    <link rel="stylesheet" href="popup.css">
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
                <li><a href="adminindex.php">Home</a></li>
                <li><a href="browse.php">Browse</a></li>
            </ul>
        </header>
    <div class="container req-box" >
        <form action="" method="post">
            <div class="row">
                <div class="col-md-10 box1" style="margin-left:100px;">
                
                <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <div class="search_box">
        <div class="dropdown">
        <select name="cat" id="cars">
    <option value="Title">Title</option>
    <option value="Genre">Genre</option>
    <option value="Industry">Industry</option>
    <option value="Actors">Actors</option>
    <option value="Directors">Directors</option>
    <option value="Music Directors">Music Directors</option>
    <option value="Blockbuster">BlockBusters</option>
    <option value="Topmovies">Top-Rated Movies</option>
  </select>
        </div>
        <div class="search_field">
          <input type="text" class="input" name="search" placeholder="Search">
          
      </div>
      <input type="submit" value="Search" name="submit" class="submitbtnsea">
    </div>
</div>
                    <h3 style="margin-bottom:50px;"><span style="font-weight:bold; color: #6AC045">Movies </span>(<?php echo $total ?>)</h3>
                    <?php 
                    echo $list;
                    ?>
                </div>
            </div>   
        </form>
    </div>
   
</body>
</html>


