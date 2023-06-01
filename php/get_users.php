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
                $data = [];
                $data['response'] = 1;
                $data['users'] = [];
                while($user = $state->fetch_array(MYSQLI_ASSOC)){
                    $tmp = [];
                    $tmp['id'] = $user['id'];
                    $tmp['mail'] = $user['mail'];
                    $tmp['username'] = $user['username'];
                    $tmp['image'] = $user['image'];
                    $tmp['status'] = $user['status'];
                    array_push($data['users'],$tmp);

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