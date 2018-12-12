<?php
session_start();
if (!isset($_SESSION["login"]) || !isset($_COOKIE["username"])){
    header("Location:index.php");
}

$conn = mysqli_connect("localhost", "root", "", "userbase");
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
<head>
    <title>Clouder| The Cloud Network</title>
    <meta charset="UTF-8">
    <meta name="author" content="Shubham Mishra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap and Jquery
    ==================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light text-primary navbar-fixed-top">
    <div class="navbar-nav mr-3 ml-auto">
      <span class="nav-item my-2 mr-5 ml-auto">Hello, <?php echo $name;?></span>
      <a class="nav-item nav-link btn btn-outline-danger mr-3" href="logout.php">Log Out</a>
    </div>
    </nav>
    
</body>
</html>
