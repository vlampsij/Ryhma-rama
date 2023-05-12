<?php
require "conn.php";

if(isset($_POST['submit'])){
    $tunnusid = $_POST['tunnusid'];
    $tilaid = $_POST['tilaid'];
    $nimi = $_POST['nimi'];

    $komento2 = "SELECT * FROM tyontekijat WHERE tunnusid = '$tunnusid'";
    $login = $conn->query($komento2);
    $login->execute();
    $data = $login->fetch(PDO::FETCH_ASSOC);

    if($login->rowCount() == 0){
        $komento = "INSERT INTO tyontekijat(tunnusid, tilaid, nimi) VALUES (:tunnusid, :tilaid, :nimi)";
        $lisaa = $conn->prepare($komento);
        $lisaa->execute([
            ':tunnusid' => $tunnusid,
            'tilaid' => $tilaid,
            'nimi' => $nimi
        ]);
    }else{
        $komento = "UPDATE tyontekijat SET nimi = :nimi, tilaid = :tilaid WHERE tunnusid = :tunnusid";
        $lisaa = $conn->prepare($komento);
        $lisaa->execute([
            'nimi' => $nimi,
            'tilaid' => $tilaid,
            ':tunnusid' => $tunnusid
        ]);
    }
    
}

echo "Tila päivitetty.";
sleep(2);
header("location: http://localhost/vlampsij.github.io/backend/uusiTyontekija.php");

?>