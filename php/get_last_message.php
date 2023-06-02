<?php 
    if($_SERVER['REQUEST_METHOD']=="POST"){
        require_once("data.php");
        $mittente = $_POST['mittente'];
        $destinatario = $_POST['destinatario'];

        $req = "SELECT * FROM messages 
        WHERE (mittente='$mittente' AND destinatario='$destinatario') OR (mittente='$destinatario' AND destinatario='$mittente') 
        ORDER BY id DESC LIMIT 1";

        if($state = $conn->query($req)){
            $mex = $state->fetch_array(MYSQLI_ASSOC);
            $data = [
                "response"=>1,
                "message"=>$mex['message'] ?? ""
            ];
            echo json_encode($data);
        }
    }else{
        header("location: index.php");
    }
?>