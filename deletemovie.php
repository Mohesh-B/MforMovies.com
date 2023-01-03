<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header('location: mainpage.php#popup1');
}

include('connectdb.php');
$id=$_REQUEST['id'];

$del = "DELETE  FROM movies WHERE movie_id= '$id'"; 
$result = $conn -> query($del);
header("Location:updatemoviespage.php"); 
$conn->close();
?>