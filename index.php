<?php 
session_start();

if ($_SESSION["login"] == "y" && $_COOKIE["username"] != NULL){
    mysql_connect("localhost", "root", "") or die(mysql_error());
    mysql_select_db("userbase");
    $query = "SELECT * FROM active WHERE username='".$_COOKIE["username"]."';";
    $rs = mysql_query($query);
    if ($rs["ip"] == $_SERVER["REMOTE_ADDR"]){
        header("feed.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clouder| The Cloud Network</title>
    <meta charset="UTF-8">
    <meta name="author" content="Shubham Mishra">
    <meta name="viewport" content="max-width=device-width; initial-scale=1.0;">
    
    <!-- Bootstrap and Jquery
    ==================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>