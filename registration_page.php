<?php
    session_start();
    $token = $_SESSION['crsf'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registration_style.css">
    <link rel="stylesheet" href="./css/style.css">

    
    <title>Document</title>
</head>
<body>

    <section class="app">
        <input type="hidden" value="<?=$token?>" id="token" >
        <header>
            <div class="wrap-logo">
                <img src="./src/logo.png" alt="logo" />
            </div>
            <div class="wrap-title">
                <h2>Prozzappe!</h2>
            </div>
        </header>
        
        <h3 style="text-align: center;color:var(--header--color);margin-top:10px">Iscriviti su prozzappe!</h3>
         <div id="err-server" class="wrap-server-error msg-off">
            ..
         </div>

         <form method="POST">
            <div class="s-wrap-field">
                <div>
                    <div id="err-mail" class="s-wrap-msg-err msg-off"> ..</div>
                    <input type="text" placeholder="Insert your mail.." id="mail" class="">
                </div>
                <div>
                    <div id="err-username"  class="s-wrap-msg-err msg-off">..</div>
                    <input type="text" placeholder="Insert your username.." id="username" class="">
                </div>
            </div>
            <div class="s-wrap-field">
                <div>
                    <div id="err-psw" class="s-wrap-msg-err msg-off">..</div>
                    <input type="password" placeholder="Insert your password.." id="psw" class="">
                </div>
                <div>
                    <div id="err-confirm-psw" class="s-wrap-msg-err msg-off">..</div>
                    <input type="password" placeholder="Insert your password.." id="confirm-psw" class="">
                </div>
            </div>
            <button type="button" id="btn-new-user" class="btn btn-new-user">SIGN UP !</button>
         </form>
        <p style="text-align:center;margin-top:2px">do you have alredy an account?? <a href="login_page.php">login</a>! </p>
        <footer></footer>
    </section>

    <script src="./scripts/reg.js"></script>
</body>
</html>