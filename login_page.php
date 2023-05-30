<?php
    session_start();
    if(!isset($_SESSION['crsf'])){
        $bytes = random_bytes(32);
        $token = bin2hex($bytes);
        $_SESSION['crsf'] = $token;
    }

    $token = $_SESSION['crsf'];

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login_style.css">
    
    <title>Document</title>
</head>
<body>

    <input type="hidden" id="token" value="<?= $token?>">

    <section class="app">
        <header>
            <div class="wrap-logo">
                <img src="./src/logo.png" alt="logo" />
            </div>
            <div class="wrap-title">
                <h2>Prozzappe!</h2>
            </div>
        </header>
        
        <h3>Bentornato! accedi subito!</h3>
         <div id="err-server" class="wrap-server-error msg-off">
            ..
         </div>
        <form>
            <div class="wrap-field">
                <div id="err-username" class="wrap-client-error msg-off">
                    ..
                </div>
                <input class="" type="text" placeholder="Insert your username.." id="username"  />
            </div>
            <div class="wrap-field">
            <div id="err-psw" class="wrap-client-error msg-off">
                    ..
                </div>
                <input class="" type="password" placeholder="Insert your password.." id="psw"  />
            </div>
            <button type="button" id='btn-login' class="btn btn-login">LOGIN</button>
        </form>
        <p style="text-align:center;margin-top:5px">New user?? <a href="registration_page.php">register</a> now!</p>
        <footer></footer>
    </section>

    <script src="./scripts/login.js"></script>
</body>
</html>