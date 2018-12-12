<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "userbase");
if (!$conn){
    die(mysqli_connect_error());
}
$q = "DELETE FROM active WHERE Id=".$_SESSION["login"];
mysqli_query($conn, $q);
mysqli_close($conn);

$_SESSION["login"] = "";
setcookie("username");
session_destroy();
header("Location: index.php");
?>
