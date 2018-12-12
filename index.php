<?php 
session_start();

if (isset($_COOKIE["username"])){
    $conn = mysqli_connect("localhost", "root", "", "userbase");
    if (!$conn){
        die(mysqli_connect_error());
    }
    $query = "SELECT * FROM active WHERE username='". $_COOKIE["username"]. "';";
    $rs = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($rs)){
        if (isset($row) && $row["ip"] == $_SERVER["REMOTE_ADDR"]){
            $_SESSION["login"] = $row["Id"];
            header("Location: feed.php");
        }
    }
    mysqli_close($conn);
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
    <div class="row tab-full jumbotron" style="background-color: orange;">
        <div class="col-12 col-md-4 display-2" style="color: white;">Clouder</div>
        <p class="col-11 offset-1" style="color: white;">The cloud network for students</p>
    </div>
    <form class="form-group row" action="" method="POST">
        <fieldset class="col-4 offset-1 bg-light">
            <legend id="login" class="btn btn-warning">Log In</legend>
            <div id="logindiv"><input class="form-control" type="text" name="username" placeholder="Username"><br>
            <input class="form-control" type="password" name="pwd" placeholder="Password"><br>
            <div id="loginbtn" class="btn btn-success">Log In</div><br><br>
            <div id="loginmsg"></div>
            </div>
        </fieldset>
        <fieldset class="col-4 offset-2 bg-light">
            <legend id="signup" class="btn btn-warning">Sign Up</legend>
            <div id="signupdiv" style="display: none;">
                <input class="form-control" type="text" name="Name" placeholder="Full Name"><br>
                <input class="form-control" type="text" name="username" placeholder="Pick a Username"><br>
                <input class="form-control" type="password" name="pwd" placeholder="Give a strong password"><br>
                <div id="signupbtn" class="btn btn-primary">Sign Up</div><br><br>
                <div id="signupmsg"></div>
            </div>
        </fieldset>
        <script>
            $('document').ready(function(){
                $('#login').click(function(){
                    $('#logindiv').show();
                    $('#signupdiv').hide();
                });
                $('#signup').click(function(){
                    $('#logindiv').hide();
                    $('#signupdiv').show();
                });
                $('#loginbtn').click(function(){
                    var inps = $('#logindiv input');
                    if (inps[0].value == "" || inps[1].value == ""){
                        $('#loginmsg').removeClass('alert alert-danger alert-success');
                        $('#loginmsg').addClass('alert');
                        $('#loginmsg').addClass('alert-danger');
                        $('#loginmsg').html("All fields are mandatory.");
                    }
                    else{
                        var postdict = {method: 'login', username: inps[0].value, password: inps[1].value};
                        $.post("formhandler.php", postdict, function(response, status){
                            if (response == "Ok"){
                                $('#loginmsg').removeClass('alert alert-danger alert-success');
                                $('#loginmsg').addClass('alert');
                                $('#loginmsg').addClass('alert-success');
                                $('#loginmsg').html("Login Successful! Redirecting to Main Page");
                                window.location.href = "feed.php";
                            }else{
                                $('#loginmsg').removeClass('alert alert-danger alert-success');
                                $('#loginmsg').addClass('alert');
                                $('#loginmsg').addClass('alert-danger');
                                $('#loginmsg').html("Something went wrong! Please try again.");
                            }
                        });
                    }
                });
                $('#signupbtn').click(function(){
                    var inps = $('#signupdiv input');
                    if (inps[0].value == "" || inps[1].value == "" || inps[2].value == ""){
                        $('#signupmsg').removeClass('alert alert-danger alert-success');
                        $('#signupmsg').addClass('alert');
                        $('#signupmsg').addClass('alert-danger');
                        $('#signupmsg').html("All fields are mandatory.");
                    }
                    else{
                        var postdict = {method: 'signup', username: inps[1].value, password: inps[2].value, name: inps[0].value};
                        $.post("formhandler.php", postdict, function(response, status){
                            if (response == "Ok"){
                                $('#signupmsg').removeClass('alert alert-danger alert-success');
                                $('#signupmsg').addClass('alert');
                                $('#signupmsg').addClass('alert-success');
                                $('#signupmsg').html("SignUp Successful! Login please");
                            }else{
                                $('#signupmsg').removeClass('alert alert-danger alert-success');
                                $('#signupmsg').addClass('alert');
                                $('#signupmsg').addClass('alert-danger');
                                $('#signupmsg').html("Something went wrong! Please try again.");
                            }
                        });
                    }
                });


            });

        </script>
    </form>
</body>
</html>
