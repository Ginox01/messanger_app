<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $username = $_SESSION['username'];
        $file = $_FILES['image'];
        $originName = $file['name'];
        $tmp = $file['tmp_name'];
        var_dump($file);

        $extention = explode(".",$originName);
        $extention = end($extention);
        

        $valid_extentions = ['png','jpg','jpeg'];

        if(!in_array($extention,$valid_extentions)){
            $_SESSION['err-img'] = true;
            $_SESSION['err-img-message'] = "Invalid file extention";
            header("location: ../index.php");
        }
        $path_root =  $_SERVER['DOCUMENT_ROOT']."/";
        $name_project = "PROZZA/";
        $time = time();
        $name = $originName.$time;
        $path = $path_root.$name_project."src/images/".$name;    
        move_uploaded_file($tmp,$path);

        require_once("data.php");
        $req = "UPDATE users SET image='$name' WHERE username='$username'";
        $conn->query($req);
        $_SESSION['img'] = $name;
        header("location: ../index.php");
        
        
        

    }else{
        header("location: ../index.php");
    }
?>