
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
$username=$_SESSION['username'];
$id=$_REQUEST['id'];
$query="INSERT into towatch values('$username',$id)";
if(mysqli_query($conn,$query))
{
    echo"<script>";
    echo"alert('inserted')";
    echo"</script>";
    header('location:userbrowse.php');
}
else
{
    echo "mysqli_connect_error()";
}
