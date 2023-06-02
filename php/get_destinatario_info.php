<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
        require_once("data.php");
        $username = $_POST['username'];
        $req = "SELECT * FROM users WHERE username='$username'";
        if($state = $conn->query($req)){
            $user = $state->fetch_array(MYSQLI_ASSOC);
            $data = [
                "response"=>1,
                "status"=>$user['status'],
                "username"=>$user['username'],
                "image"=>$user['image']
            ];
            echo json_encode($data);
        }else{
            $data = [
                "response"=>0,

            ];
            echo json_encode($data);
        }
    }else{
        header(("location: ../index.php"));
    }

?>