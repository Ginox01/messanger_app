<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
        require_once("data.php");
        $mittente = $_POST['mittente'];
        $destinatario = $_POST['destinatario'];

        $req = "SELECT * FROM messages WHERE (mittente='$mittente' AND destinatario='$destinatario')
        OR (mittente='$destinatario' AND destinatario='$mittente')";

        if($state = $conn->query($req)){
            if($state->num_rows == 0){
                $data = [
                    "response"=>2,
                    "message"=>"There are no messages with this user"
                ];
                echo json_encode($data);
            }else{
                $data = [];
                $data['response']= 1;
                $data['messages'] = [];
                while($mex = $state->fetch_array(MYSQLI_ASSOC)){
                    $tmp = [];
                    $tmp['id'] = $mex['id'];
                    $tmp['message'] = $mex['message'];
                    $tmp['mittente'] = $mex['mittente'];
                    $tmp['destinatario'] = $mex['destinatario'];
                    array_push($data['messages'],$tmp);
                }
                echo json_encode($data);
            }
            
        }else{
            $data = ["response"=>0];
            echo json_encode($data);
        }

    }else{
        header("location: index.php");
    }

?>