<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['status'] == "admin") {
        header('location: adminbrowse.php');
    } else {
        header('location: userbrowse.php');
    }
}
else{
    header('location:mainpage.php#popup1');
}
?>