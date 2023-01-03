<?php

   session_start();

   include('connectdb.php');

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    //Validation
    $q = "SELECT * FROM users WHERE Username = '$username' OR Email = '$email'";

    $res = mysqli_query($conn,$q);


    if (mysqli_num_rows($res)>= 1) {
        if ($_SESSION['username']=="admin") {
            header('location:adminindex.php#error');
        } else {
            header('location:mainpage.php#error');
        }
    } else {
        $sql = "INSERT INTO users (username,password,name,email,status) values('$username','$password','$fullname','$email','user')";

        $result = mysqli_query($conn,$sql);

        if ($_SESSION['username']=="admin") {
            header('location: ../mainpage.php#success');
        } else {
            header('location:mainpage.php#success');
        }     
    }
    $conn->close();
?>