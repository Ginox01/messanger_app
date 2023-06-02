            
<?php
    session_start();
    if(!isset($_SESSION['logged'])){
        header("location: login_page.php");
    }

    $user = $_SESSION['username'];
    $destinatario = $_GET['user'];
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/chat_page_style.css">
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
        

        <section id="app-form-area">
            <div class="s-area-guest">
                 <!-- <p>Nome Utente</p>
                 <p class="s-small">status</p>
                 <span class="s-icon-return">←</span>
                 <div class="s-wrap-img-guest">
                    <img >

                </div> -->
            </div>
            <section class="s-area-chat">
            <!--<div class="chat-guess">
                    <div class="chat-container-guess">
                        <p>Questo è un messaggio dal guess</p>
                    </div>
               </div> 

               <div class="chat-user">
                    <div class="chat-container-user">
                        <p>Questo è un messaggio dall'usehhhhhhh ceghbn fhfjhj iubhfrtg gyhr</p>
                    </div>
               </div>  -->
            <section id="wrap-no-messages"><div></div></section>
            </section>
            
            <div class="s-edit-chat">
             <input type="hidden" id="mittente" value="<?=$user?>">
             <input type="hidden" id="destinatario" value="<?=$destinatario?>">

            <input type="text" id="mex" >
            <button type="button" class="btn" id="btn-mex">INVIA</button>
            </div>

        </section>


        <footer></footer>
    </section>

    <script src="./scripts/chat.js"></script>
</body>
</html>