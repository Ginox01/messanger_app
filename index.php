<?php
    if(!isset($_SESSION['logged'])){
        header("location: login_page.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index_style.css">
    <link rel="stylesheet" href="./css/style.css">

    
    <title>Document</title>
</head>
<body>

    <section class="app">
        <header>
            <div class="wrap-logo">
                <img src="./src/logo.png" alt="logo" />
            </div>
            <div class="wrap-title">
                <h2>Prozzappe!</h2>
            </div>
        </header>
        
        <div class="s-wrap-info-user">
            <div class="s-wrap-img">
                <img alt="img" src="./src/no-img.jpg">
            </div>
            <div><h3>Nome Utente</h3></div>
            <div class="s-wrap-btns">
            
                <button type="button" class="btn" id="btn-change-img">Change img</button>            
                <button type="button" class="btn" id="btn-logout">Logout</button>
            </div>
            <span></span>
        </div>
        <div class="s-wrap-list-users">
            
            <div class="s-utente">
                <div class="s-utente-img">
                    <img src="./src/no-img.jpg">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">Nome Utente</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity offline"></span>
                </div>
                <span></span>
            </div>

            <div class="s-utente">
                <div class="s-utente-img">
                    <img src="./src/no-img.jpg">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">Nome Utente</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity offline"></span>
                </div>
                <span></span>
            </div>

            <div class="s-utente">
                <div class="s-utente-img">
                    <img src="./src/no-img.jpg">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">Nome Utente</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity offline"></span>
                </div>
                <span></span>
            </div>

            <div class="s-utente">
                <div class="s-utente-img">
                    <img src="./src/no-img.jpg">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">Nome Utente</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity offline"></span>
                </div>
                <span></span>
            </div>

            <div class="s-utente">
                <div class="s-utente-img">
                    <img src="./src/no-img.jpg">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">Nome Utente</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity offline"></span>
                </div>
                <span></span>
            </div>

            <div class="s-utente">
                <div class="s-utente-img">
                    <img src="./src/no-img.jpg">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">Nome Utente</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity offline"></span>
                </div>
                <span></span>
            </div>

            <div class="s-utente">
                <div class="s-utente-img">
                    <img src="./src/no-img.jpg">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">Nome Utente</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity offline"></span>
                </div>
                <span></span>
            </div>

            <div class="s-utente">
                <div class="s-utente-img">
                    <img src="./src/no-img.jpg">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">Nome Utente</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity offline"></span>
                </div>
                <span></span>
            </div>


            
        </div>
        <span class="end-list-users"></span>
        

        <footer></footer>
    </section>

</body>
</html>