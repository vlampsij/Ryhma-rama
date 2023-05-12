<?php
session_start();
require "conn.php";

if(isset($_POST['talleta'])){
        $vika = $_POST['vika'];
        $osoite = $_POST['osoite'];
        $tekija = $_SESSION['tunnusid'];

        $komento = "INSERT INTO vikailmoitukset(vika, osoite, tekija) VALUES (:vika, :osoite, :tekija)";
        $lisaa = $conn->prepare($komento);
        $lisaa->bindValue(':vika', $vika, PDO::PARAM_STR);
        $lisaa->bindValue(':osoite', $osoite, PDO::PARAM_STR);
        $lisaa->bindValue(':tekija', $tekija, PDO::PARAM_INT);
        $lisaa->execute();
    
}

header("location: http://localhost/vlampsij.github.io/backend/index.php");

?>