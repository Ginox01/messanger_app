<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        session_start();
        $token = $_POST['token'];
        if($token == $_SESSION['crsf']){
            require_once("data.php");
            $username = $conn->real_escape_string($_POST['username']);
            $psw = $conn->real_escape_string($_POST['psw']);

            $req = "SELECT * FROM users WHERE username='$username'";

            if($state = $conn->query($req)){
                if($state->num_rows == 1){
                    $user = $state->fetch_array(MYSQLI_ASSOC);
                    if(password_verify($psw,$user['psw'])){
                        $req = "UPDATE users SET status='online' WHERE username='$username'";
                        if(!$conn->query($req)){
                            header("location: login_page.php");
                            die();
                        }
                        $_SESSION['logged'] = true;
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['img'] = $user['image'];

                        $data = ["response"=>1];
                        echo json_encode($data);
                    }else{
                        $data = [
                            "response"=>0,
                            "message"=>"Password doesn't match"
                        ];
                        echo json_encode($data);
                    }
                }else{
                    $data = [
                        "response"=>0,
                        "message"=>"No user match"
                    ];
                    echo json_encode($data);
                }
            }else{
                $data = [
                    "response"=>0,
                    "message"=>"Sorry we have problem in our server, please try later"
                ];

                echo json_encode($data);
            }


        }else{
            $data = [
                "response"=>0,
                "message"=>"Access denied"
            ];
            echo json_encode($data);
        }
    }else{
        header("location: login_page.php");
    }
?>