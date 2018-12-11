<?php
session_start();
if (!isset($_SESSION["login"]) || !isset($_COOKIE["username")){
    header("Location:index.php");
}

$conn = mysqli_connect("localhost", "root", "", "userbase")
if (!$conn){
    die(mysqli_connect_error());
}
$usr = $_COOKIE["username"];
$q = "SELECT name FROM profile WHERE username='".$usr."';";
$rs = mysqli_query($conn, $q);
while ($row = mysqli_fetch_assoc($rs)){
    $name = $row["name"];
}
?>

<!DOCTYPE html>
<html lang="en">