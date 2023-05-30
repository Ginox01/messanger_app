<?php 

    session_start();
    require_once("data.php");
    $username = $_SESSION['username'];
    $req = "UPDATE users SET status='offline' WHERE username='$username'";
    
    if(!$conn->query($req)){
        header("location: index.php");
    }



    $_SESSION = array();
    session_destroy();
    header("location: ../login_page.php");

?>