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
        <?php
        if($_SESSION['rooli'] == "isännöitsijä"){ ?>
        <a href="logout.php">Kirjaudu ulos</a><br>
        <h3>Valitse isännöitsijän toiminto</h3>
        <div>
            <a href="uusiVika.php">Jätä virheilmoitus</a>
        </div>
        <br>
        <div>
            <a href="register.php">Lisää tunnus</a>
        </div>
        
        <?php }else{ ?>
            <p>Tunnuksella ei oikeuksia nähdä sivua</p>
        <?php } ?>
     </div>
    </body>
</html>