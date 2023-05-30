<?php 
    if($_SERVER['REQUEST_METHOD']=="POST"){
        session_start();
        $token = $_POST['token'];
        if($token == $_SESSION['crsf']){
            require_once("data.php");
            $mail = $conn->real_escape_string($_POST['mail']);
            $username = $conn->real_escape_string($_POST['username']);
            $psw = $conn->real_escape_string($_POST['psw']);

            if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
                $data = [
                    "response"=> 0,
                    "message"=> "invalid mail"
                ];
                echo json_encode($data);
                die();
            }

            //Check if the username already exist
            $req = "SELECT * FROM users WHERE username='$username'";
            if($state = $conn->query($req)){
                
                if($state->num_rows > 0){
                    $data = [
                        "response"=>0,
                        "message"=> "This user is alredy taken"
                    ];
                    echo json_encode($data);
                }else{
                    //Check if the mail alredy exist
                    $req = "SELECT * FROM users WHERE mail='$mail'";
                    if($state = $conn->query($req)){
                        if($state->num_rows > 0){
                            $data = [
                                "response"=>0,
                                "message"=> "This mail is alredy taken"
                            ];
                            echo json_encode($data);
                        }else{
                            $has_psw = password_hash($psw,PASSWORD_DEFAULT);
                            $req = "INSERT INTO users(mail,username,image,psw)
                            VALUES('$mail','$username','default','$has_psw')";
                            if($conn->query($req)){
                                $_SESSION['logged'] = true;
                                $_SESSION['username'] = $username;
                                $_SESSION['img'] = 'default';
                                $data = ["response"=>1];
                                echo json_encode($data);
                            }else{
                                $data = [
                                    "response"=>0,
                                    "message"=>"There is a problem in our server, please try later"
                                ];
                                echo json_encode($data);
                            }
                        }
                    }
                }
            }else{
                $data = [
                    "response"=>0,
                    "message"=>"There is a problem in our server, please try later.."
                ];
                echo json_encode($data);
            }

        }else {
            $data = [
                "response"=>0,
                "message"=>"Access denied"
            ];
            echo json_encode($data);
        }
    }else{
        header("location: ../login_page.php");
    }
?>