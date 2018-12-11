<?php
session_start();

function login(){
    $conn = mysqli_connect("localhost", "root", "", "userbase");
    if (!$conn){
        die(mysqli_connect_error());
    }

    $q = "SELECT * FROM profile WHERE username='".$_POST["username"]."';";
    $rs = mysqli_query($conn, $q);
    if (mysqli_num_rows($rs) != 1){
        echo "Error";
    }else{
        $row = mysqli_fetch_assoc($rs);
        if ($_POST["password"] == $row["pwd"]){
            $_SESSION["login"] = "y";
            setcookie("username", $_POST["username"], time() + 3600 * 24);
            $q = "INSERT INTO active(username, ip, intime) VALUES ('".$_POST["username"]."','".$_SERVER["REMOTE_ADDR"]."','".time()."');";
            mysqli_query($conn, $q); 
            echo "Ok";
        }else{
            echo "Error";
        }
    }
    mysqli_close($conn);
}
    
function signup(){
    echo "Not now";
}

if ($_POST['method'] == 'login'){
    login();
}else if ($_POST['method'] == 'signup'){
    signup();
}
?>