<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Isännöitsijän sivu</title>
    </head>
    <body>
     <div class="container">
        <h1></h1>
        <a href="../index.html">Takaisin</a>
        <br>
        <?php
        if($_SESSION['rooli'] == "isannoitsija"){ ?>
        <a href="http://localhost/vlampsij.github.io/backend/logout.php">Kirjaudu ulos</a><br>
        <h3>Valitse isännöitsijän toiminto</h3>
        <div>
            <a href="http://localhost/vlampsij.github.io/backend/uusiVika.php">Jätä virheilmoitus</a>
        </div>
        <br>
        <div>
            <a href="http://localhost/vlampsij.github.io/backend/register.php">Lisää tunnus</a>
        </div>
        <br>
        <div>
            <a href="http://localhost/vlampsij.github.io/backend/tyontekijat.php">Työntekijälista</a>
        </div>
        <br>
        <div>
            <a href="http://localhost/vlampsij.github.io/backend/yhteydenottopyynnot.php">Katso yhteydenottopyynnöt</a>
        </div>
        <?php }else{ ?>
            <p>Tunnuksella ei oikeuksia nähdä sivua</p>
        <?php } ?>
     </div>
    </body>
</html>