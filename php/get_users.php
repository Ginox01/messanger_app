<?php 
    if($_SERVER['REQUEST_METHOD']=="POST"){
        require_once("data.php");
        $req = "SELECT * FROM users";
        if($state = $conn->query($req)){
            if($state->num_rows == 1){
                $data = [
                    "response"=>0,
                    "message"=>"No users available"
                ];
                echo json_encode($data);
            }else{
                while($user = $state->fetch_array(MYSQLI_ASSOC)){
                    //DAQUIIIIIIIIIIIIIIIIII
                }
                echo json_encode($data);
            }
        }else{
            $data = [
                "response"=>0,
                "message"=>"Sorry, there is an error in our server, please try later"
            ];
            echo json_encode($data);
        }
    }else{
        header("location: ../index.php");
    }

?>