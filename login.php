<?php
session_start();
include('connectdb.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = "SELECT * FROM users WHERE username = '$username' and `password` = '$password'";

    $res = mysqli_query($conn,$q);
  

    if (mysqli_num_rows($res) == 1) {

       // <script>alert("helqlo");</script>
       $_SESSION['username'] = strtolower($username);

       if ($_SESSION['username']=="admin") {
    
            header('location:adminindex.php');
            $_SESSION['status'] = 'admin';
       } else {
            header('location:userindex.php');
            $_SESSION['status'] = 'user';
       }
    } else {
        header('location:mainpage.php#error1');
    }
    $conn->close();
?>
