<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        var_dump($_FILES);
        $file = $_FILES['image'];
        $originName = $file['name'];

        $extention = explode(".",$originName);
        $extention = end($extention);
        echo $extention;

        $valid_extentions = ['png','jpg','jpeg'];

        if(!in_array($extention,$valid_extentions)){
            $_SESSION['err-img'] = true;
            $_SESSION['err-img-message'] = "Invalid file extention";
            header("location: ../index.php");
        }

        
        
        

    }else{
        header("location: ../index.php");
    }
?>