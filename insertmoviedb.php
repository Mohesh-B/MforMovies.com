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

$movid=$_POST['mid'];
$name=$_POST['mname'];
$genre=$_POST['gnre'];
$indus=$_POST['ind'];
$pid=$_POST['pid'];
$did=$_POST['did'];
$aid=$_POST['aid'];
$dater=$_POST['dater'];
$mdid=$_POST['mdid'];
$aid=$_POST['aid'];
$ott=$_POST['ott'];
$tc=$_POST['tc'];
$otc=$_POST['otc'];
$oc=$_POST['oc'];
$pc=$_POST['pc'];
$te=$_POST['te'];
$midcheck="Select * from movie where movie_id='$movid'";
$pdcheck="Select * from production_house where prod_id='$pid'";
$resck1=mysqli_query($conn,$midcheck);
$resck2=mysqli_query($conn,$pdcheck);
$query="Insert into movies(movie_id,movie_name,genre,industry,prod_id,director_id,actor_id,music_dir_id,date_of_release) VALUES('$movid','$name','$genre','$indus','$pid','$did','$aid','$mdid','$dater')";
$query2="Insert into collections (movie_id,prod_id,ott,theatre,overseas,total_collection) values ('$movid','$pid','$ott','$tc','$oc','$otc')";
$query3="Insert into expenses (movie_id,prod_id,promo_cost,total_expense) values ('$movid','$pid','$pc','$te')";
if(mysqli_query($conn,$query))
{
    if(mysqli_query($conn,$query2))
    {
        if(mysqli_query($conn,$query3))
        {
            echo "<script>";
            echo "alert('Posted');";
            echo "location.href='adminindex.php';";
            echo "</script>";
        }
        else
        {
            echo "error in query 3";
        }
    }
    else
    {
        echo "error in query 2";
    }

}
else{
    echo "query1 error";
}

