
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:mainpage.php');
}
else{ 
    if ($_SESSION['status'] != "admin") {
        header('location: mainpage.php');
    }
}

include('connectdb.php');

$id=$_REQUEST['id'];
$query = "SELECT * from users where userid='$id'"; 
$r = mysqli_query($conn,$query);
$row = mysqli_fetch_array($r);

if (isset($_POST['update'])) {
    $name=$_POST['name'];
    $email = $_POST['email'];
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    //Validation
    $q = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

    $res = $conn->query($q);
    $num = mysqli_num_rows($res);  

    if ($num > 1) {
            echo "error";
            header('location: users.php#error');
    } else {
        //$sql = "INSERT INTO userdata (Username,Pass,Fullname,Email) values('$username','$password','$fullname','$email')";

        $sql = "UPDATE users SET name='$name',Username='$username',password = '$password', email='$email' WHERE userid='$id'";

        $result = mysqli_query($conn,$sql);
            if($result){
            header('location: users.php#updatesuccess');  }
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

    <!-- Latest compiled and minified CSS -->
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
        <center><h3 style="margin-bottom:50px;"><span style="font-weight:bold; color: #6AC045">Update User Data</span></h3></center>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 box1">
                        
                        <label for="title">Fullname:</label><br>
                        <input type="text" name="name" class="input" value="<?php echo $row['name'];?>" required  ><br>
                        <label for="title">Email:</label><br>
                        <input type="email" name="email" class="input" value="<?php echo $row['email'];?>" required><br>
                    
                    </div>
                    <div class="col-md-6 box1">
                        <label for="title">Username:</label><br>
                        <input type="text" name="username" class="input" value="<?php echo $row['username'];?>" required><br>
                        <label for="title">Password:</label><br>
                        <input type="text" name="password" class="input" value="<?php echo $row['password'];?>" required><br>
                        <input type="submit"  class="btn" name="update" value="Update User Data">
                    </div>
                </div>   
                
            </form>
        </div>
    </header>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>