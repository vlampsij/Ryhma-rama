<?php
session_start();
require "conn.php";

if(isset($_POST['talleta'])){
        $vika = $_POST['vika'];
        $osoite = $_POST['osoite'];
        $tekija = $_POST['tekija'];

        $komento = "INSERT INTO vikailmoitukset(vika, osoite, tekija, tyontekijaid) VALUES (:vika, :osoite, :tekija, 1)";
        $lisaa = $conn->prepare($komento);
        $lisaa->bindValue(':vika', $vika, PDO::PARAM_STR);
        $lisaa->bindValue(':osoite', $osoite, PDO::PARAM_STR);
        $lisaa->bindValue(':tekija', $tekija, PDO::PARAM_STR);
        $lisaa->execute();
    
}

echo "Vika lisätty";
sleep(2);
header("location: http://localhost/vlampsij.github.io/backend/uusiVika.php");

?>