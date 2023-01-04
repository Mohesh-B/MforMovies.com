
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:mainpage.php');
}
else{ 
    if ($_SESSION['status'] != "admin") {
        header('location:mainpage.php');
    }
}

include('connectdb.php');

$id=$_REQUEST['id'];
$query = "SELECT * from movies where movie_id='$id'"; 
$query2="SELECT * FROM collections where movie_id='$id'";
$query3="SELECT * FROM expenses where movie_id='$id'";
$r = mysqli_query($conn,$query);
$r2 = mysqli_query($conn,$query2);
$r3 = mysqli_query($conn,$query3);
$row = mysqli_fetch_array($r);
$row2=mysqli_fetch_array($r2);
$row3=mysqli_fetch_array($r3);
if (isset($_POST['update'])) {
    $movie_id=$_POST['id'];
    $movie_name = $_POST['name'];
    $industry = $_POST['industry'];
    $prod_id = $_POST['prod_id'];
    $dir_id=$_POST['dir_id'];
    $acid=$_POST['acid'];
    $mid=$_POST['mdid'];
    $dor=$_POST['dor'];
    $poster=$_POST['poster'];
    $genre=$_POST['genre'];
    $te=$_POST['te'];
    $tc=$_POST['tc'];


    $q = "SELECT * FROM movies WHERE movie_id='$movie_id'";

    $res = $conn->query($q);
    $num = mysqli_num_rows($res);  

    if ($num > 1) {
            echo "error";
            header('location: updatemoviespage.php#error');
    } else {

        $sql = "UPDATE movies SET movie_name='$movie_name',genre = '$genre', industry='$industry' ,actor_id='$acid' ,music_dir_id='$mid',director_id='$dir_id',poster='$poster',prod_id='$prod_id',date_of_release='$dor' WHERE movie_id='$movie_id'";
        $sql2="UPDATE collections SET total_collection='$tc' where movie_id='$movie_id'"; 
        $sql3="UPDATE  expenses SET total_expense='$te' where movie_id='$movie_id'";
        $result2=mysqli_query($conn,$sql2);
        $result3=mysqli_query($conn,$sql3);
        $result = mysqli_query($conn,$sql);
            if($result){
                if($result2)
                {
                    if($result3)
                    {
                        header('location: adminbrowse.php');  
                    }
                    else{
                        echo "<script>";
                        echo "alert('query 3 error');";
                        echo "</script>";
                    }
    }
    else
    {
        echo "<script>";
        echo "alert('query 2 error');";
        echo "</script>";
    }
                    }
                else
                {
                    echo "<script>";
        echo "alert('query 3 error');";
        echo "</script>";
                }
                }
            
}

    
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
                <li><a href="adminbrowse.php">Browse</a></li>
            </ul>
        </nav>

    <header>
        <div class="container req-box" >
        <center><h3 style="margin-bottom:50px;"><span style="font-weight:bold; color: #6AC045">Update Movie Data</span></h3></center>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 box1">
                        
                        <label for="title">Movie ID:</label><br>
                        <input type="text" name="id" class="input" value="<?php echo $row['movie_id'];?>" required  ><br>
                        <label for="title">Movie name:</label><br>
                        <input type="text" name="name" class="input" value="<?php echo $row['movie_name'];?>" required><br>
                    
                    </div>
                    <div class="col-md-6 box1">
                        <label for="title">Genre:</label><br>
                        <input type="text" name="genre" class="input" value="<?php echo $row['genre'];?>" required><br>
                        <label for="title">Industry:</label><br>
                        <input type="text" name="industry" class="input" value="<?php echo $row['industry'];?>" required><br>
                      
                    </div>
                </div>   

                <div class="row">
                    <div class="col-md-6 box1">
                        
                        <label for="title">Production House ID:</label><br>
                        <input type="text" name="prod_id" class="input" value="<?php echo $row['prod_id'];?>" required  ><br>
                        <label for="title">Director ID:</label><br>
                        <input type="text" name="dir_id" class="input" value="<?php echo $row['director_id'];?>" required><br>
                    
                    </div>
                    <div class="col-md-6 box1">
                        <label for="title">Actor ID:</label><br>
                        <input type="text" name="acid" class="input" value="<?php echo $row['actor_id'];?>" required><br>
                        <label for="title">Music Director ID:</label><br>
                        <input type="text" name="mdid" class="input" value="<?php echo $row['music_dir_id'];?>" required><br>
                    
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6 box1">
                        
                        <label for="title">Date Of Release:</label><br>
                        <input type="text" name="dor" class="input" value="<?php echo $row['date_of_release'];?>" required  ><br>
                        <label for="title">Total Collection:</label><br>
                        <input type="text" name="tc" class="input" value="<?php echo $row2['total_collection'];?>" required><br>
                    
                    </div>
                    <div class="col-md-6 box1">
                        <label for="title">Poster:</label><br>
                        <input type="text" name="poster" class="input" value="<?php echo $row['poster'];?>" required><br>
                        <label for="title">Total Expense:</label><br>
                        <input type="text" name="te" class="input" value="<?php echo $row3['total_expense'];?>" required><br>
                        <input type="submit"  class="btn" name="update" value="Update movie data">
                    </div>
                </div>   
            </form>
        </div>  
    </header>
</body>
</html>