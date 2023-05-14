<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Työntekijän sivu</title>
    </head>
    <body>
     <div class="container">
        <h1></h1>
        <a href="../index.html">Takaisin</a>
        <?php
        if($_SESSION['rooli'] == "tyontekija"){ ?>
        <a href="http://localhost/vlampsij.github.io/backend/logout.php">Kirjaudu ulos</a><br>
        <h3>Valitse työntekijän toiminto</h3>
        <div>
            <a href="http://localhost/vlampsij.github.io/backend/uusiTyontekija.php">Muokkaa työntekijän tietoja</a>
        </div>
        <br>
        <div>
            <a href="http://localhost/vlampsij.github.io/backend/tyolista.php">Työlista ja tilanhallinta</a>
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