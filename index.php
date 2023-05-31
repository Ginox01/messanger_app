<?php
    session_start();
    if(!isset($_SESSION['logged'])){
        header("location: login_page.php");
    }

    $username = $_SESSION['username'];
    $image = $_SESSION['img']; 
    $errorImg = false;
    if(isset($_SESSION['err-img'])){
        $errorImg = true;
        $errImgMsg = $_SESSION['err-img-message'];
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
                <img alt="img" src="<?= $image == 'default' ? "./src/no-img.jpg":$image ?>">
            </div>
            <div><h3><?=$username?></h3></div>
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
        
        <!--START FROM IMAGINE AREA -->

        <section id="app-form-area">
            
            <div class="img-form-container">
            <span id="icon-close-form-img">x</span>
                <div class="wrap-img-form-img">
                    <img src="<?= $image == 'default' ? "./src/no-img.jpg":"./src/$image" ?>" >
                    <h3>Your actually photo</h3>
                </div>
                <form action="./php/change_img.php" method="POST" enctype="multipart/form-data">
                    <div class="wrap-upload">
                        <label for="file">SCEGLI IMMAGINE</label>
                        <input type="file" id="file" name="image" placeholder="Scegli immagine">
                    </div>
                    <div class="wrap-server-error" style="display:<?=$errorImg == true ? "block":"none"?>" >
                        <?= $errImgMsg ?>
                    </div>
                    <div class="wrap-btn-img">
                    <button type="submit" id="btn-img" class="btn">CAMBIA</button>
                    </div>
                    
                </form>
            </div>
        </section>

        <!-- END FORM IMAGE AREA -->

        <footer></footer>
    </section>

    <script src="./scripts/index.js"></script>
</body>
</html>