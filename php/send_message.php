<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        require_once("data.php");
        $mittente = $_POST['mittente'];
        $destinatario = $_POST['destinatario'];
        $message = $conn->real_escape_string($_POST['message']);

        $req = "INSERT INTO messages(message,mittente,destinatario)
        VALUES('$message','$mittente','$destinatario')";

        if($conn->query($req)){
            $data = [
                "response"=>1,
                "message"=>"message created!"
            ];
            echo json_encode($data);
        }else{
            $data = ["response"=>0];
            echo json_encode($data);
        }

    }else{
        header("location: index.php");
    }

?>