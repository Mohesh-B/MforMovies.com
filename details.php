
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:mainpage.php');
}
else{ 
    if ($_SESSION['status'] == "admin") {
        header('location:mainpage.php');
    }
}

include('connectdb.php');

$id=$_REQUEST['id'];
$query = "SELECT * from movies where movie_id='$id'"; 
$query2="SELECT * FROM collections where movie_id='$id'";
$query3="SELECT * FROM expenses where movie_id='$id'";
$query4="SELECT * FROM music_director where music_dir_id=(select music_dir_id from movies where movie_id='$id')";
$query5="SELECT * FROM director where director_id=(select director_id from movies where movie_id='$id')";
$query6="SELECT * FROM actor where actor_id=(select actor_id from movies where movie_id='$id')";
$query7="SELECT * FROM production_house where prod_id=(select prod_id from movies where movie_id='$id')";
$query8="SELECT * FROM ratings where rating_id='$id'";
$r = mysqli_query($conn,$query);
$r2 = mysqli_query($conn,$query2);
$r3 = mysqli_query($conn,$query3);
$r4 = mysqli_query($conn,$query4);
$r5 = mysqli_query($conn,$query5);
$r6 = mysqli_query($conn,$query6);
$r7 = mysqli_query($conn,$query7);
$r8 = mysqli_query($conn,$query8);
$row = mysqli_fetch_array($r);
$row2=mysqli_fetch_array($r2);
$row3=mysqli_fetch_array($r3);
$row4=mysqli_fetch_array($r4);
$row5=mysqli_fetch_array($r5);
$row6=mysqli_fetch_array($r6);
$row7=mysqli_fetch_array($r7);
$row8=mysqli_fetch_array($r8);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <link rel=" stylesheet " href="bootstrap.min.css ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="update.css">

</head>
<body>
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
    nav
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
    
      color:goldenrod;

    }
</style>
<nav>
            <ul>
                <li><img id="logo" src="logo (2).png"></li>
                <LI><H3>MforMovies.com</H3></LI>
                <li><a href="adminindex.php">Home</a></li>
                <li><a href="#">Browse</a></li>
            </ul>
        </nav>

    <header>
        <div class="container req-box" >
        <center><h3 style="margin-bottom:50px;"><span style="font-weight:bold; color: #6AC045">Movie Data</span></h3></center>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 box1">
                        
                        <label for="title">Movie ID:</label><br>
                        <input type="text" name="id" class="input" value="<?php echo $row['movie_id'];?>" required disabled  ><br>
                        <label for="title">Movie name:</label><br>
                        <input type="text" name="name" class="input" value="<?php echo $row['movie_name'];?>" required disabled><br>
                    
                    </div>
                    <div class="col-md-6 box1">
                        <label for="title">Genre:</label><br>
                        <input type="text" name="genre" class="input" value="<?php echo $row['genre'];?>" required disabled><br>
                        <label for="title">Industry:</label><br>
                        <input type="text" name="industry" class="input" value="<?php echo $row['industry'];?>" required disabled><br>
                      
                    </div>
                </div>   

                <div class="row">
                    <div class="col-md-6 box1">
                        
                        <label for="title">Production House ID:</label><br>
                        <input type="text" name="prod_id" class="input" value="<?php echo $row7['prod_name'];?>" required disabled><br>
                        <label for="title">Director ID:</label><br>
                        <input type="text" name="dir_id" class="input" value="<?php echo $row5['director_name'];?>" required disabled><br>
                    
                    </div>
                    <div class="col-md-6 box1">
                        <label for="title">Actor ID:</label><br>
                        <input type="text" name="acid" class="input" value="<?php echo $row6['actor_name'];?>" required disabled><br>
                        <label for="title">Music Director ID:</label><br>
                        <input type="text" name="mdid" class="input" value="<?php echo $row4['md_name'];?>" required disabled><br>
                     
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6 box1">
                        
                        <label for="title">Date Of Release:</label><br>
                        <input type="text" name="dor" class="input" value="<?php echo $row['date_of_release'];?>" required disabled><br>
                        <label for="title">Total Collection:</label><br>
                        <input type="text" name="tc" class="input" value="<?php echo $row2['total_collection'];?>" required disabled><br>
                       
                    </div>
                    <div class="col-md-6 box1">
                        <label for="title">Total Expense:</label><br>
                        <input type="text" name="te" class="input" value="<?php echo $row3['total_expense'];?>" required disabled><br>
                        <label for="title">Rating:</label><br>
                        <input type="text" name="rating" class="input" value="<?php echo $row8['movie_rating'];?>" required disabled><br>
                     
                    </div>
                </div>   
                <?php   $rid=$row["movie_id"]; echo"<a href='favorites.php?id=$rid'";echo" class='btn'";echo" style='float:none;'> Add to Favorites</a>";
echo"<a href='watchedlist.php?id=$rid'";echo" class='btn'";echo" style='float:none;'>";echo"    "  ;echo"  Add to watched list</a>";
              echo"<a href='watchlist.php?id=$rid'";echo" class='btn'";echo" style='float:none;'>";echo" Add to watch list</a>";
              ?>
                        <a href="userbrowse.php" class="btn btn-danger"  style="float:right;">Go Back</a><br>
            </form>
           
        </div>  
    </header>
    <!-- jQuery library="details.php?id='.$row["movie_id"].' -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>